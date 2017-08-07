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
 * videosStats Widget
 */
class _videosStats extends \IPS\Widget\PermissionCache
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'videosStats';
	
	/**
	 * @brief	App
	 */
	public $app = 'videos';
		
	/**
	 * @brief	Plugin
	 */
	public $plugin = '';
	
	/**
	 * Specify widget configuration
	 *
	 * @param	null|\IPS\Helpers\Form	$form	Form object
	 * @return	null|\IPS\Helpers\Form
	 */
	public function configuration( &$form=null )
	{
	   return NULL;
 	} 

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
		$stats = array();
		$stats['totalVideos']     = \IPS\Db::i()->select( 'COUNT(*)', 'videos_videos' )->first();
		$stats['totalSubmitters'] = \IPS\Db::i()->select( 'COUNT(DISTINCT author_id)', 'videos_videos' )->first();
		$stats['totalViews']      = \IPS\Db::i()->select( 'SUM(views)', 'videos_videos' )->first();       
         
        if( \IPS\Settings::i()->vs_enable_comments )
        {
            $stats['totalComments']   = \IPS\Db::i()->select( 'COUNT(*)', 'videos_comments' )->first();            
        }
		
		$latestVideo = NULL;
		foreach ( \IPS\videos\Video::getItemsWithPermission( array(), NULL, 1 ) as $latestVideo )
		{
			break;
		}
		
		return $this->output( $stats, $latestVideo );
	}
}