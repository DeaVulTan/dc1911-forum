<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\setup\upg_100007;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * 3.1.4 Upgrade Code
 */
class _Upgrade
{
	/**
	 * Upgrade categories
	 *
	 * @return	array	If returns TRUE, upgrader will proceed to next step. If it returns any other value, it will set this as the value of the 'extra' GET parameter and rerun this step (useful for loops)
	 */
	public function step1()
	{
		foreach( \IPS\Db::i()->select( '*', 'videos_cat' ) as $category )
		{
		    $category = \IPS\videos\Category::constructFromData( $category );
          
			try
			{
				$latestVideo = \IPS\Db::i()->select( '*', 'videos_videos', array( 'status=? and cid=?', 1, $category->id ), 'date DESC', array( 0, 1 ) )->first();

				$category->last_video_id   = $latestVideo['tid'];
				$category->last_video_date = $latestVideo['date'];
			}
			catch( \UnderflowException $e )
			{
				$category->last_video_id   = 0;
				$category->last_video_date = 0;
			}

			$category->save();
		}

		return true;
	}

	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step1CustomTitle()
	{
		return "Upgrading video categories";
	}
}