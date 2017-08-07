<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\extensions\core\Permissions;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Permissions
 */
class _Permissions
{
	/**
	 * Get node classes
	 *
	 * @return	array
	 */
	public function getNodeClasses()
	{		
		return array(
			'IPS\videos\Category' => function( $current, $group )
			{
				$rows = array();
				
				foreach( \IPS\videos\Category::roots( NULL ) AS $root )
				{
					try
					{
						\IPS\videos\Category::populatePermissionMatrix( $rows, $root, $group, $current );
					}
					catch( \BadMethodCallException $e ) {}
				}
				
				return $rows;
			}
		);
	}

}