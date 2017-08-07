//<?php

class hook84 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'loginForm' => 
  array (
    0 => 
    array (
      'selector' => '.ipsFieldRow_content',
      'type' => 'add_inside_end',
      'content' => '{{if $element->name === "twostep_input"}}

<span>{lang="twostep_input_desc"}</span>
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */




}