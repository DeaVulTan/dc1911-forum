//<?php

class hook38 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'userBar' => 
  array (
    0 => 
    array (
      'selector' => '#elUserLink_menu > li.ipsMenu_item[data-menuitem=\'profile\']',
      'type' => 'add_after',
      'content' => '{template="myactivityuserbar" group="plugins" location="global" app="core" params=""}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


















}