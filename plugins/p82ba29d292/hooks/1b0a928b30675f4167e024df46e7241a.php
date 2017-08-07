//<?php

class hook75 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'globalTemplate' =>
  array (
    0 =>
    array (
      'selector' => '#ipsLayout_mainArea',
      'type' => 'add_inside_start',
      'content' => '{template="siteMessage" group="plugins" location="global" app="core"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */




}
