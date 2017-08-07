//<?php

class hook82 extends _HOOK_CLASS_
{
	/**
	 * Compose
	 *
	 * @return	void
	 */
	protected function compose()
	{
		try
		{
			if( \IPS\Member::loggedIn()->inGroup( explode( ',', \IPS\Settings::i()->postSendPm_allowedGroups ) ) AND \IPS\Member::loggedIn()->member_posts < \IPS\Settings::i()->postSendPm_minItemsCount )
			{
				if ( \IPS\Settings::i()->postSendPm_showItemsCount )
				{
					$text = \IPS\Member::loggedIn()->language()->addToStack('cant_send_new_pms_show_nr', FALSE, array( 'sprintf' => \IPS\Settings::i()->postSendPm_minItemsCount ) );
					\IPS\Output::i()->error( $text, '2C137/1', 403, '' );
				}
				else
				{
					\IPS\Output::i()->error( 'cant_send_new_pms', '2C137/1', 403, '' );
				}	
			}
	
			return parent::compose();
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