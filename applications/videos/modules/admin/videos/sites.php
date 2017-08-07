<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\modules\admin\videos;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * sites
 */
class _sites extends \IPS\Node\Controller
{
	/**
	 * Node Class
	 */
	protected $nodeClass = '\IPS\videos\MediaSite';
	
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		\IPS\Dispatcher::i()->checkAcpPermission( 'sites_manage' );
		parent::execute();
	}
    
	/**
	 * Get Root Buttons
	 *
	 * @return	array
	 */    
	public function _getRootButtons()
	{
	    /* Get original buttons */
		$buttons = parent::_getRootButtons();
	    
        /* Swap out title */
		$buttons['add']['title'] = 'add_media_site';
        
        /* Add rebuild button */
		$buttons['rebuild']	= array(
			'icon'	=> 'cog',
			'title'	=> 'rebuild_videos',
			'link'	=> \IPS\Http\Url::internal( "app=videos&module=videos&controller=sites&do=rebuild" ),
			'data'	=> array( 'ipsDialog' => '', 'ipsDialog-title' => \IPS\Member::loggedIn()->language()->addToStack('rebuild_videos') )
		);        
            
		return $buttons;
	}  
    
	/**
	 * Rebuild videos
	 * 
	 */
	public function rebuild()
	{
		\IPS\Output::i()->output = new \IPS\Helpers\MultipleRedirect(
			\IPS\Http\Url::internal( 'app=videos&module=videos&controller=sites&do=rebuild' ),
			function( $data )
			{
				/* First import */
				if ( ! is_array( $data ) )
				{
					/* Start import */
					$data = array(
							'lastId'     => 0,
							'processing' => true,
							'total'	     => \IPS\Db::i()->select( 'COUNT(*)', 'videos_videos', array( array( 'video_type=?', 'media_url' ) ) )->first(),
							'done'       => 0
					);
						
					return array( $data, \IPS\Member::loggedIn()->language()->addToStack('video_rebuild_processing') );
				}
	
				/* Rebuild and then finish */
				if ( $data['processing'] )
				{
					try
					{
						$videoID = \IPS\Db::i()->select( 'tid', 'videos_videos', array( 'tid > ? AND video_type=?', intval( $data['lastId'] ), 'media_url' ), 'tid ASC', array( 0, 1 ) )->first();
						
						if ( ! empty( $videoID ) )
						{
							$video = \IPS\videos\Video::load( $videoID );
							$video->rebuildVideo();
							
							$data['lastId'] = $videoID;
							$data['done']++;
						}
						else
						{
							$data['lastId']     = 0;
							$data['processing'] = false;
						}
						
						return array( $data, \IPS\Member::loggedIn()->language()->addToStack('video_rebuild_processing'), 100 / $data['total'] * $data['done'] );
					}
					catch( \UnderflowException $ex )
					{
						return null;
					}
				}
				else
				{
					/* Done? */
					return null;
				}
			},
			function()
			{
				\IPS\Output::i()->redirect( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=sites' ), 'completed' );
			}
		);
		
		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack('rebuild_videos');
		
		/* Output */
		if ( \IPS\Request::i()->isAjax() )
		{
			\IPS\Output::i()->sendOutput( \IPS\Theme::i()->getTemplate( 'global', 'core' )->blankTemplate( \IPS\Output::i()->output ), 200, 'text/html', \IPS\Output::i()->httpHeaders );
		}
		else
		{
			\IPS\Output::i()->buildMetaTags();
			\IPS\Output::i()->sendOutput( \IPS\Theme::i()->getTemplate( 'global', 'core' )->globalTemplate( \IPS\Output::i()->title, \IPS\Output::i()->output, array( 'app' => \IPS\Dispatcher::i()->application->directory, 'module' => \IPS\Dispatcher::i()->module->key, 'controller' => \IPS\Dispatcher::i()->controller ) ), 200, 'text/html', \IPS\Output::i()->httpHeaders );
		}
		
		return;
	}      
}