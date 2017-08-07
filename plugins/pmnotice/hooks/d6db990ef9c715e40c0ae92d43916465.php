//<?php

class hook43 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'template' => 
  array (
    0 => 
    array (
      'selector' => 'div[data-controller=\'core.front.messages.main, core.front.messages.responsive\'] > div.ipsColumns.ipsColumns_collapseTablet[data-ipsfilterbar-on=\'phone,tablet\'] > div.ipsColumn.ipsColumn_fluid[data-role=\'filterContent\']',
      'type' => 'add_inside_start',
      'content' => '{{if settings.pmNotice_enable  AND \IPS\Request::i()->module == \'messaging\' AND \IPS\Request::i()->controller == \'messenger\'}}
    {template="pmNotice" group="plugins" location="global" app="core"}
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


























}