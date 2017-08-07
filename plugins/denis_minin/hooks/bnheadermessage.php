//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class hook23 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'globalTemplate' => 
  array (
    0 => 
    array (
      'selector' => '#ipsLayout_header',
      'type' => 'add_before',
      'content' => '<style>
.bnHeaderMessage_custom {
  background-color: {setting="bnHeaderMessage_background_colour"};
  color: {setting="bnHeaderMessage_text_colour"};
}
</style>
{template="bnHeaderMessage" group="plugins" location="global" app="core"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


}
