//<?php

class hook33 extends _HOOK_CLASS_
{
	/**
	 * Format Name
	 *
	 * @return	string
	 */
	public function formatName( $name )
	{
		try
		{
	        try
	        {
	            $res = array();
	
	            if( \IPS\Settings::i()->custom_group_format_cache )
	            {
	                if( !isset( \IPS\Data\Store::i()->customGroupFormats ) )
	                {
	                    $formats = array();
	                    $rows = iterator_to_array( \IPS\Db::i()->select( 'name,name_prefix,name_suffix', 'core_members', array( 'name_prefix!="" AND name_suffix!=""' ) ) );
	
	                    foreach( $rows as $row )
	                    {
	                        $formats[ $row[ 'name' ] ] = array( $row[ 'name_prefix' ], $row[ 'name_suffix' ] );
	                    }
	
	                    \IPS\Data\Store::i()->customGroupFormats = $formats;
	                }
	
	                $res[ 'name_prefix' ] = \IPS\Data\Store::i()->customGroupFormats[ $name ][ 0 ];
	                $res[ 'name_suffix' ] = \IPS\Data\Store::i()->customGroupFormats[ $name ][ 1 ];
	            }
	            else
	            {
			        $res = iterator_to_array( \IPS\Db::i()->select( 'name_prefix,name_suffix', 'core_members', array( 'name=?', $name ) ) )[ 0 ];
	            }
	      	
	            if( isset( $res[ 'name_prefix' ] ) and $res[ 'name_prefix' ] )
	            {
	                return $res[ 'name_prefix' ] . $name . $res[ 'name_suffix' ];
	            }
	        }
	        catch( \Exception $e )
	        {
	            
	        }
	      	
	        return call_user_func_array( 'parent::formatName', func_get_args() );
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