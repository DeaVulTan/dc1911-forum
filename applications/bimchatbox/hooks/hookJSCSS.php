//<?php

abstract class bimchatbox_hook_hookJSCSS extends _HOOK_CLASS_
{

	protected static function baseJs()
	{
		parent::baseJS();
		if ( ! \IPS\Request::i()->isAjax() && \IPS\Settings::i()->chatbox_conf_on == 1 )
		{
			\IPS\Output::i()->jsFiles = array_merge( \IPS\Output::i()->jsFiles, \IPS\Output::i()->js( 'buzz/buzz.min.js', 'bimchatbox', 'interface' ) );
			\IPS\Output::i()->jsFiles = array_merge( \IPS\Output::i()->jsFiles, \IPS\Output::i()->js( 'chat/chatbox129.js', 'bimchatbox', 'interface' ) );
		}
	}

	public static function baseCss()
	{
		parent::baseCss();
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'chatbox.css', 'bimchatbox', 'front' ) );
	}

}