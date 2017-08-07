//<?php

class hook46 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'globalTemplate' => 
  array (
    0 => 
    array (
      'selector' => '#ipsLayout_footer > div.ipsLayout_container',
      'type' => 'add_inside_end',
      'content' => '{{if settings.serverloadFront}}
  {{if mb_stristr(PHP_OS, \'win\')}}
    {{$serverLoad = \'Windows not supported\';}}
  {{else}}
    {{$serverLoad = implode(\' \', sys_getloadavg());}}
  {{endif}}
  <p id="elServerload">{lang="serverloadFlawless"}: {$serverLoad}</p>
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */






}