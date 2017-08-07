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
 * index
 */
class _index extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 */
	public function execute()
	{    
        parent::execute();  

        /* We need at least 1 category */
        if( !count( \IPS\videos\Category::roots() ) )
        {      
            \IPS\Output::i()->error( 'no_video_categories_found', '', 404, '' );
        }
        
		/* Latest videos RSS feed link */
		if( \IPS\Settings::i()->vs_enable_rss  )
		{
			\IPS\Output::i()->rssFeeds[ 'latest_videos_main' ] = \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&do=rss', 'front', 'videos_rss' );
		}       
        
		/* You must purchase copyright removal before removing */
        if( !\IPS\Settings::i()->devfuse_copy_num && !\IPS\Request::i()->isAjax() )
        {
            \IPS\Output::i()->output .= "<div style='clear:both;text-align:center;position:absolute;bottom:15px;width:95%;'><a href='http://Defcon.uz/' class='ipsType_light ipsType_smaller'>Видео Система Defcon Uzbekistan</a></div>";    
        }        
    }

	/**
	 * Videos Portal
	 *
	 * @return	void
	 */
	protected function manage()
	{
        /* Sort out order */
		$orderField     = \IPS\Settings::i()->vs_members_videos_box_sort_by ? \IPS\Settings::i()->vs_members_videos_box_sort_by : 'date';
        $orderDirection = \IPS\Settings::i()->vs_members_videos_box_sort_order ? \IPS\Settings::i()->vs_members_videos_box_sort_order : 'desc';	   
       
	    /* Get list of main videos */
   		$videos = \IPS\videos\Video::getItemsWithPermission( array(), $orderField.' '.$orderDirection, ( \IPS\Settings::i()->vs_members_videos_box_limit ) ? (int) \IPS\Settings::i()->vs_members_videos_box_limit : 10 );  

        /* Get featured videos */
        $featured = NULL;
        if( \IPS\Settings::i()->vs_featured_videos )
        {
    		$featured = iterator_to_array( \IPS\videos\Video::featured( 5, '_rand' ) );              
        }
        
        /* Add sidebar block */
        \IPS\Output::i()->sidebar['contextual'] = \IPS\Theme::i()->getTemplate( 'browse' )->categoriesBlock();  
        
		/* Set Online Location */
		$permissions = \IPS\Dispatcher::i()->module->permissions();
		\IPS\Session::i()->setLocation( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=index', 'front', 'videos' ), explode( ',', $permissions['perm_view'] ), 'loc_videos_index' );             
		
        /* Display page */
		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack( 'module__videos_videos' );
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'browse' )->index( $videos, $featured );
	}
}