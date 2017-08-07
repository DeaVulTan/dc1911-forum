//<?php

class hook32 extends _HOOK_CLASS_
{
	/**
	 * Get Group Data
	 *
	 * @return	array
	 */
	public function get_group()
	{
		try
		{
			$group = call_user_func_array( 'parent::get_group', func_get_args() );
	      	
	      	if( $this->name_prefix )
	        {
	          	$group[ 'prefix' ] = $this->name_prefix;
	          	$group[ 'suffix' ] = $this->name_suffix;
	        }
	      
	      	return $group;
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}

	/**
	 * Retrieve the group name
	 *
	 * @return string
	 */
	public function get_groupName()
	{
		try
		{
			call_user_func_array( 'parent::get_groupName', func_get_args() );
	
	        $group = $this->group;
	        $groupName = isset( $group[ 'g_pseudo' ] ) ? $this->g_pseudo : \IPS\Member::loggedIn()->language()->addToStack( "core_group_{$group[ 'g_id' ]}" );
	
	        return $group[ 'prefix' ] . htmlspecialchars( $groupName, \IPS\HTMLENTITIES | ENT_QUOTES, 'UTF-8', FALSE ) . $group[ 'suffix' ];
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}

	/**
	 * Member Sync
	 *
	 * @param	string	$method	Method
	 * @param	array	$params	Additional parameters to pass
	 * @return	void
	 */
	public function memberSync( $method, $params=array() )
	{
		try
		{
			call_user_func_array( 'parent::memberSync', func_get_args() );
	
	        if( $method === 'onProfileUpdate' and \IPS\Settings::i()->custom_group_format_cache and isset( $params[ 'changes' ][ 'name' ] ) )
	        {
	            $previousName = $this->previousName;
	
	            if( $formats = \IPS\Data\Store::i()->customGroupFormats and isset( $formats[ $previousName ] ) and $previousName )
	            {
	                $format = $formats[ $previousName ];
	                unset( $formats[ $previousName ] );
	                $formats[ $this->name ] = $format;
	
	                \IPS\Data\Store::i()->customGroupFormats = $formats;
	            }
	        }
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}
}