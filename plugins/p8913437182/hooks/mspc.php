//<?php

class hook78 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'hovercard' => 
  array (
    0 => 
    array (
      'selector' => 'div.ipsPad_half.cUserHovercard > div.cUserHovercard_data > ul.ipsDataList.ipsDataList_reducedSpacing',
      'type' => 'add_inside_end',
      'content' => '{{if \IPS\Member::loggedIn()->modPermission(\'mod_see_warn\')}}
{template="memberStatusPersonalCard" group="plugins" location="global" app="core" params="$member"}
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */








}