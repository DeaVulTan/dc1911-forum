//<?php

class hook73 extends _HOOK_CLASS_
{
	/**
	 * Validate
	 *
	 * @throws	\InvalidArgumentException
	 * @return	TRUE
	 */
	public function validate()
	{
		try
		{
			/* Password length */
			if ( mb_strlen( $this->value ) < \IPS\Settings::i()->mpl AND ( $this->required OR $this->value ) )
			{
				$msg = \IPS\Member::loggedIn()->language()->addToStack( 'err_password_length_plugin', FALSE, array( 'sprintf' => array( \IPS\Settings::i()->mpl ) ) );
				throw new \InvalidArgumentException( $msg );
			}
	
			return parent::validate();
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