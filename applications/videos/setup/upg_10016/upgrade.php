<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\setup\upg_10016;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * 3.0.0 Upgrade Code
 */
class _Upgrade
{
	public function step1()
	{
		\IPS\core\Setup\Upgrade::runLegacySql( 'videos', 10016 );
		
		return TRUE;		
	}
}