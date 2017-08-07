//<?php

class hook72 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'register' => 
  array (
    0 => 
    array (
      'selector' => '[data-role=\'registerForm\']',
      'type' => 'add_before',
      'content' => '{template="signupMessage" group="plugins" location="global" app="core"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */




}