//<?php

class hook44 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'popupTemplate' => 
  array (
    0 => 
    array (
      'selector' => 'form[accept-charset=\'utf-8\'][method=\'post\']',
      'type' => 'add_before',
      'content' => '{{if settings.pmNotice_enable  AND \IPS\Request::i()->module == \'messaging\' AND \IPS\Request::i()->controller == \'messenger\'}}
    <div class=\'ipsPad\'>
        {template="pmNotice" group="plugins" location="global" app="core"}
    </div>
{{endif}}
      ',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */
















}