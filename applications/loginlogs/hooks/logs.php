//<?php

class loginlogs_hook_logs extends _HOOK_CLASS_
{
	public function authenticate()
	{
		try
		{
			$member = call_user_func_array( 'parent::authenticate', func_get_args() );

			if( $member instanceof \IPS\Member AND ( \IPS\Settings::i()->llogs_logtype == 'member' OR \IPS\Settings::i()->llogs_logtype == 'both' ) )
			{
				$this->log( 'OK', $member );
			}
		}
		catch ( \IPS\Login\Exception $e )
		{
			if ( $e->getCode() === \IPS\Login\Exception::BAD_PASSWORD AND ( \IPS\Settings::i()->llogs_logtype == 'member' OR \IPS\Settings::i()->llogs_logtype == 'both' ) )
			{
				$this->log( 'FAIL', $e->member );
			}
			
			if( $e->getCode() === \IPS\Login\Exception::NO_ACCOUNT AND ( \IPS\Settings::i()->llogs_logtype == 'guest' OR \IPS\Settings::i()->llogs_logtype == 'both' ) )
			{
				$member = array();
				$this->log( 'GUEST', $member );
			}

			throw $e;
		}

		return $member;
	}

	public function log( $status, $member )
	{
		if( \IPS\Dispatcher::i()->controllerLocation === 'front' AND \IPS\Settings::i()->llogs_groups == '*' OR $member->inGroup( explode( ',', \IPS\Settings::i()->llogs_groups ) ) )
		{
			if( $status === 'GUEST' )
			{
				$save = array(
					'login_time'	=> time(),
					'mid'			=> 0,
					'ipaddress'		=> \IPS\Request::i()->ipAddress(),
					'is_successful'	=> 2,
					'attempt_num'	=> 1,
					'login'			=> \IPS\Request::i()->auth
				);
			}
			
			if( $status !== 'GUEST' )
			{
				$save = array(
					'login_time'	=> time(),
					'mid'			=> $member->member_id,
					'ipaddress'		=> $member->ip_address,
					'is_successful'	=> ( $status == 'OK' ) ? 1 : 0,
					'attempt_num'	=> $member->failed_login_count +1,
					'login'			=> $member->name
				);
			}

			\IPS\Db::i()->insert( 'loginlogs_logs', $save );
		}
	}
}