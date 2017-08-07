//<?php

class hook107 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'userBar' => 
  array (
    0 => 
    array (
      'selector' => '#cUserLink',
      'type' => 'add_before',
      'content' => '{template="WaRepAll" group="plugins" location="global" app="core"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */






















































}