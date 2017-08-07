<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * videosVideos Widget
 */
class _videosVideos extends \IPS\Widget\PermissionCache
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'videosVideos';
	
	/**
	 * @brief	App
	 */
	public $app = 'videos';
		
	/**
	 * @brief	Plugin
	 */
	public $plugin = '';
    
	/**
	 * @brief	Sort Fields
	 */
	protected $sortFields = array( 'date'         => 'date_sort', 
                                   'last_updated' => 'last_updated_sort', 
                                   'video_rating' => 'video_rating_sort' );    
                                          	
	/**
	 * Specify widget configuration
	 *
	 * @param	null|\IPS\Helpers\Form	$form	Form object
	 * @return	null|\IPS\Helpers\Form
	 */
	public function configuration( &$form=null )
	{
 		if ( $form === null )
 		{
	 		$form = new \IPS\Helpers\Form;
 		} 
 		
        $form->add( new \IPS\Helpers\Form\Text( 'widget_title', isset( $this->configuration['widget_title'] ) ? $this->configuration['widget_title'] : '', FALSE ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'videosVideos_category_videos', isset( $this->configuration['videosVideos_category_videos'] ) ? $this->configuration['videosVideos_category_videos'] : FALSE, FALSE, array( 'togglesOff' => array( 'video_cats' ) ) ) );

		$form->add( new \IPS\Helpers\Form\Node( 'video_cats', isset( $this->configuration['video_cats'] ) ? $this->configuration['video_cats'] : 0, FALSE, array( 'class' => 'IPS\videos\Category', 'multiple' => TRUE, 'zeroVal' => 'video_cats_zeroVal', 'permissionCheck'		=> function( $node )
			{ 
			    /* Cat only? */
                if( $node->cat_only )
                {
                    return FALSE;
                }			 
             
                /* Can add? */
				if ( $node->can( 'add' ) )
				{
                    return TRUE;
				}
				
				return NULL;
			} ), NULL, NULL, NULL, 'video_cats' ) );		        
		$form->add( new \IPS\Helpers\Form\Select( 'video_sort', isset( $this->configuration['video_sort'] ) ? $this->configuration['video_sort'] : 'date', FALSE, array( 'options' => $this->sortFields ), NULL, NULL, NULL, 'video_sort' ) );
		$form->add( new \IPS\Helpers\Form\Select( 'video_direction', isset( $this->configuration['video_direction'] ) ? $this->configuration['video_direction'] : 'desc', FALSE, array( 'options' => array( 'desc' => 'video_direction__desc', 'asc' => 'video_direction__asc', ) ), NULL, NULL, NULL, 'video_direction' ) );
		$form->add( new \IPS\Helpers\Form\Number( 'number_videos', isset( $this->configuration['number_videos'] ) ? $this->configuration['number_videos'] : 5, TRUE ) );
		
		return $form;
 	} 
 	
 	 /**
 	 * Ran before saving widget configuration
 	 *
 	 * @param	array	$values	Values from form
 	 * @return	array
 	 */
 	public function preConfig( $values )
 	{
        /* Check video categories */
		if( isset( $values['video_cats'] ) AND $values['video_cats'] )
		{
			$cats = array();
			foreach ( $values['video_cats'] as $cat )
			{
				$cats[] = $cat->_id;
			}
			
			$values['video_cats'] = ( implode( ',', $cats ) );
		}       	  
      
 		return $values;
 	}

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
        /* Setup where array */
        $where[] = array( 'status=?', 1 );	  
        
        /* Show videos from viewing category? */
        if( isset( $this->configuration['videosVideos_category_videos'] ) AND $this->configuration['videosVideos_category_videos'] )
        {
            /* Not in category, so can't display widget */
            if( \IPS\Dispatcher::i()->application->directory != 'videos' AND \IPS\Dispatcher::i()->controller != 'browse' )
            {
                return '';
            } 
            
            /* Get forum settings */
	        try
			{
				$category = \IPS\videos\Category::load( \IPS\Request::i()->id );
			}
			catch ( \OutOfRangeException $e )
			{
				return '';
			}                          
            
            /* Only get videos from this category */
            if( $category->id )
            {
                $where[] = array( 'cid=?', $category->id  );    
            }
            
        }        
        else
        {
            /* Filter by categories? */
            if( isset( $this->configuration['video_cats'] ) AND $this->configuration['video_cats'] )
            {   
                $where[] = array( 'cid IN(' . $this->configuration['video_cats'] . ')' );
            }            
        }

        /* Sort out order */
		$orderField     = ( isset( $this->configuration['video_sort'] ) AND $this->configuration['video_sort'] AND in_array( $this->configuration['video_sort'], array_keys( $this->sortFields ) ) ) ? $this->configuration['video_sort'] : 'date';
        $orderDirection = ( isset( $this->configuration['video_direction'] ) AND $this->configuration['video_direction'] AND in_array( $this->configuration['video_direction'], array( 'desc', 'asc' ) ) ) ? $this->configuration['video_direction'] : 'desc';
        
        /* Get videos and display */
		$videos = \IPS\videos\Video::getItemsWithPermission( $where, ( $orderField == 'video_rating' ) ? $orderField.' '.$orderDirection.', num_votes '.$orderDirection : $orderField.' '.$orderDirection, isset( $this->configuration['number_videos'] ) ? $this->configuration['number_videos'] : 5 );        
        return $this->output( $videos, $orderField, isset( $this->configuration['widget_title'] ) ? $this->configuration['widget_title'] : NULL );
	}
}