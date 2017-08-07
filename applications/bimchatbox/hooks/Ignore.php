//<?php

class bimchatbox_hook_Ignore extends _HOOK_CLASS_
{
	public static function types()
	{
		return array_merge(parent::types(),array('chatbox'));
	}

}