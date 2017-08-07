//<?php

class hook36 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'hovercard' => 
  array (
    0 => 
    array (
      'selector' => 'div.cUserHovercard > div > p',
      'type' => 'replace',
      'content' => '<p class="ipsType_reset ipsType_normal">{$member->groupName|raw}</p>',
    ),
  ),
  'profileHeader' => 
  array (
    0 => 
    array (
      'selector' => '#elProfileHeader > .ipsColumns > .ipsColumn.ipsColumn_fluid > div.cProfileHeader_name > span',
      'type' => 'replace',
      'content' => '<span>{$member->groupName|raw}</span>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */










}