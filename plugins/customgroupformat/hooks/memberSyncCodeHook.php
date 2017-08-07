//<?php

class hook34 extends _HOOK_CLASS_
{
	/**
	 * Member is merged with another member
	 *
	 * @param	\IPS\Member	$member		Member being kept
	 * @param	\IPS\Member	$member2	Member being removed
	 * @return	void
	 */
	public function onMerge( $member, $member2 )
	{
		try
		{
			call_user_func_array( 'parent::onMerge', func_get_args() );
	        
	        if( \IPS\Settings::i()->custom_group_format_cache and $formats = \IPS\Data\Store::i()->customGroupFormats and isset( $formats[ $member->name ] ) )
	        {
	            $format = $formats[ $member->name ];
	            unset( $formats[ $member->name ] );
	
	            if( !isset( $formats[ $member2->name ] ) )
	            {
	                $formats[ $member2->name ] = $format;
	            }
	
	            \IPS\Data\Store::i()->customGroupFormats = $formats;
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

	/**
	 * Member is deleted
	 *
	 * @param	$member	\IPS\Member	The member
	 * @return	void
	 */
	public function onDelete( $member )
	{
		try
		{
			call_user_func_array( 'parent::onDelete', func_get_args() );
	
	        if( \IPS\Settings::i()->custom_group_format_cache and $formats = \IPS\Data\Store::i()->customGroupFormats and isset( $formats[ $member->name ] ) )
	        {
	            unset( $formats[ $member->name ] );
	            \IPS\Data\Store::i()->customGroupFormats = $formats;
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