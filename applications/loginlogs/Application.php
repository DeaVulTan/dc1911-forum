<?php
/**
 * @brief		Login Logs Application Class
 * @author		<a href='http://www.sosinvision.com.br'>Adriano Faria</a>
 * @copyright	(c) 2015 Adriano Faria
 * @package		IPS Social Suite
 * @subpackage	Login Logs
 * @since		16 Nov 2015
 * @version		
 */
 
namespace IPS\loginlogs;

/**
 * Login Logs Application Class
 */
class _Application extends \IPS\Application
{
	public function installOther()
	{
	 	if( \IPS\Db::i()->checkForTable('login_logs') )
		{
			foreach( \IPS\Db::i()->select( '*', 'login_logs' ) as $log )
			{
				try
				{
					$toInsert = array(
						'login_time'	=> $log['login_time'],
						'mid'			=> $log['mid'],
						'login'			=> $log['username'],
						'ipaddress'		=> $log['ip_address'],
						'attempt_num'	=> $log['attempt_num'],
						'is_successful'	=> $log['is_successful']
					);
					
					\IPS\Db::i()->insert( 'loginlogs_logs', $toInsert );
				}
				catch ( \IPS\Db\Exception $e ) {}
			}

			\IPS\Db::i()->delete( 'core_applications', array( "app_directory=?", 'login_logs' ) );
			\IPS\Db::i()->dropTable( 'login_logs', TRUE );
		}
	}
}