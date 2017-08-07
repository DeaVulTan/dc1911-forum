<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\modules\front\videos;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Submit Controller
 */
class _submit extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		\IPS\Output::i()->sidebar['enabled'] = FALSE;

		parent::execute();        
        
		/* You must purchase copyright removal before removing */
        if( !\IPS\Settings::i()->devfuse_copy_num && !\IPS\Request::i()->isAjax() )
        {
            \IPS\Output::i()->output .= "<div style='clear:both;text-align:center;position:absolute;bottom:15px;width:95%;'><a href='http://defcon.uz' class='ipsType_light ipsType_smaller'>Видео Система Defcon Uzbekistan</a></div>";    
        }        
	}

	/**
	 * Choose category
	 */
	protected function manage()
	{
	    /* Can add to any category? */
        if( !\IPS\videos\Category::canOnAny('add') )
        {
            \IPS\Output::i()->error( 'video_no_category_add_perms', '', 403, '' );     
        }
       
        /* Select cat form */
		$form = new \IPS\Helpers\Form( 'select_category', 'videos_continue' );
		$form->class = 'ipsForm_vertical ';
		$form->add( new \IPS\Helpers\Form\Node( 'video_category', isset( $data['category'] ) ? $data['category'] : NULL, TRUE, array(
			'url'					=> \IPS\Http\Url::internal( 'app=videos&module=videos&controller=submit', 'front', 'videos_add' ),
			'class'					=> 'IPS\videos\Category',
            'permissionCheck'		=> function( $node )
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
			}
		) ) );
        
        /* Setup video type fields */
		/*$form->add( new \IPS\Helpers\Form\Url( 'media', NULL, FALSE, array( 'placeholder' => 'https://www.youtube.com/watch?v=Oh4i5ECWblo' ), function( $val )
		{
		     Check for duplicate media urls?
            if( \IPS\Settings::i()->vs_duplicate_media_url )
            {
                 Throw error if any found 
                $existingCount = \IPS\Db::i()->select( 'video_data', 'videos_videos', array( array( 'video_data=?', $val ) ) )->count();
                
                if( $existingCount )
                {
                    throw new \DomainException( 'duplicate_media_url' );    
                }
            }
		}, NULL, NULL, 'media' ) );*/     

		if ( $values = $form->values() )
		{
			$url = \IPS\Http\Url::internal( 'app=videos&module=videos&controller=submit&do=submit', 'front', 'videos_add' )->setQueryString( array( 'category' => $values['video_category']->_id ) );		//, 'media' => (string) $values['media']			
			\IPS\Output::i()->redirect( $url );
		}

		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack( 'videos_select_category' );
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'submit' )->categorySelect( $form );
		\IPS\Output::i()->breadcrumb[] = array( NULL, \IPS\Member::loggedIn()->language()->addToStack( 'videos_select_category' ) );
	}

	/**
	 * Submit videos
	 *
	 * @return	void
	 */
	protected function submit()
	{	
        /* Get category */
		try
		{
			$category = \IPS\videos\Category::loadAndCheckPerms( \IPS\Request::i()->category );
            
            /* Is cat only? */
            if( $category->cat_only )
            {
                \IPS\Output::i()->error( 'cat_only_error', '', 403, '' );   
            }
            
		}
		catch ( \OutOfRangeException $e )
		{
			\IPS\Output::i()->redirect( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=submit', 'front', 'videos_add' ) );
		}

        /* Show form */
		\IPS\Output::i()->title = $category->_title;
		\IPS\Output::i()->breadcrumb[] = array( NULL, $category->_title );
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate('submit')->formPage( $category, \IPS\videos\Video::create( $category ) ); 	   
	}
}