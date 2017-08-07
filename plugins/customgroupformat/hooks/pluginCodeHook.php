//<?php

class hook37 extends _HOOK_CLASS_
{
	/**
	 * [Node] Set whether or not this node is enabled
	 *
	 * @param	bool|int	$enabled	Whether to set it enabled or disabled
	 * @return	void
	 */
	protected function set__enabled( $enabled )
	{
		try
		{
			call_user_func_array( 'parent::set__enabled', func_get_args() );
	
	        if( $this->location === "customgroupformat" )
	        {
	            unset( \IPS\Data\Store::i()->customGroupFormats );
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