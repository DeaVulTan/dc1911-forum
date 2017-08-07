//<?php

class hook74 extends _HOOK_CLASS_
{
  public function dismissSiteMessage()
    {
	try
	{
			\IPS\Session::i()->csrfCheck();
	
	    if ( !\IPS\Settings::i()->siteMessage_allowDismiss ) {
	      return;
	    }
	
			if ( \IPS\Member::loggedIn()->member_id )
			{
				\IPS\Member::loggedIn()->siteMessage_dismissed = TRUE;
				\IPS\Member::loggedIn()->save();
			}
			else
			{
				\IPS\Request::i()->setCookie( 'siteMessage_dismissed', TRUE );
			}
	
	    if ( \IPS\Request::i()->isAjax() )
			{
				\IPS\Output::i()->sendOutput( NULL, 200 );
			}
			else
			{
				\IPS\Output::i()->redirect( isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : \IPS\Http\Url::internal( '' ) );
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
