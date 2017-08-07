//<?php

class hook45 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'globalTemplate' => 
  array (
    0 => 
    array (
      'selector' => '#ipsLayout_header > header > ul.ipsList_inline.ipsType_light.ipsResponsive_hidePhone',
      'type' => 'add_inside_end',
      'content' => '{{if mb_stristr(PHP_OS, \'win\')}}
  {{$serverLoad = \'Windows not supported\';}}
{{else}}
  {{$serverLoad = implode(\' \', sys_getloadavg());}}
{{endif}}
<li><a href="#">{lang="serverloadFlawless"}: {$serverLoad}</a></li>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */
















}
