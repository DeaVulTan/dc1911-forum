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
 * view
 */
class _view extends \IPS\Content\Controller
{
	/**
	 * [Content\Controller]	Class
	 */
	protected static $contentModel = 'IPS\videos\Video';       
    
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		parent::execute();

		/* You must purchase copyright removal before removing */
        if( !\IPS\Settings::i()->devfuse_copy_num && !\IPS\Request::i()->isAjax() )
        {
            \IPS\Output::i()->output .= "<div style='clear:both;text-align:center;position:absolute;bottom:15px;width:95%;'><a href='http://defcon.uz' class='ipsType_light ipsType_smaller'>Видео Система Defcon Uzbekistan</a></div>";    
        }       
	}

	/**
	 * View Video Page
	 *
	 * @return	void
	 */
	protected function manage()
	{
		/* Init */
		parent::manage();	

	    /* Get video entry */
		try
		{
			$video = \IPS\videos\Video::loadAndCheckPerms( \IPS\Request::i()->id );

            /* Can view video? */
			if ( !$video->canView( \IPS\Member::loggedIn() ) )
			{
				\IPS\Output::i()->error( 'node_error', '', 403, '' );
			}
            
            /* Add thumbnail to meta */
			if( $video->thumbnail )
			{
				\IPS\Output::i()->metaTags['og:image'] = \IPS\File::get( 'videos_Thumbs', $video->thumbnail )->url;
                \IPS\Output::i()->metaTags['meta_imagesrc'] = \IPS\File::get( 'videos_Thumbs', $video->thumbnail )->url;
			} 
            
            if( $video->video_type == 'media_url' )
            {
                \IPS\Output::i()->metaTags['og:type'] = "video";
                \IPS\Output::i()->metaTags['og:video'] = $video->video_data;
                \IPS\Output::i()->metaTags['og:video:type'] = "application/x-shockwave-flash";
                \IPS\Output::i()->metaTags['og:video:width'] = "398";
                \IPS\Output::i()->metaTags['og:video:height'] = "224";
                \IPS\Output::i()->metaTags['medium'] = "video";
            }
		}
		catch ( \OutOfRangeException $e )
		{
			\IPS\Output::i()->error( 'node_error', '', 404, '' );
		}

		/* Online User Location */
		\IPS\Session::i()->setLocation( $video->url(), $video->onlineListPermissions(), 'loc_videos_viewing_video', array( $video->title => FALSE ) );        	   
        
        /* Print video entry */
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'view' )->view( $video );
	}
}