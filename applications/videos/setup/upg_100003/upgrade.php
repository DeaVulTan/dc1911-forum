<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\setup\upg_100003;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * 3.1.0 Beta 3 Upgrade Code
 */
class _Upgrade
{
	/**
	 * Re-add tags predefined if removed in betas
	 *
	 * @return	array	If returns TRUE, upgrader will proceed to next step. If it returns any other value, it will set this as the value of the 'extra' GET parameter and rerun this step (useful for loops)
	 */
	public function step1()
	{
		if( !\IPS\Db::i()->checkForColumn( 'videos_cat', 'tags_predefined' ) )
		{	      
    		\IPS\Db::i()->addColumn( 'videos_cat', array (
              'name' => 'tags_predefined',
              'type' => 'TEXT',
              'length' => NULL,
              'decimals' => NULL,
              'values' => 
              array (
              ),
              'allow_null' => true,
              'default' => NULL,
              'comment' => '',
              'unsigned' => false,
              'zerofill' => false,
              'auto_increment' => false,
              'binary' => false,
            ) );
        }

		return TRUE;
	}
}