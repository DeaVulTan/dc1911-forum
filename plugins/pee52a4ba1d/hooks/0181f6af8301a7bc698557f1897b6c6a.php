//<?php

class hook20 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'topic' => 
  array (
    0 => 
    array (
      'selector' => 'div[itemtype=\'http://schema.org/Question\'] > div.ipsClearfix > ul.ipsToolList.ipsToolList_horizontal.ipsClearfix.ipsSpacer_both > li.ipsToolList_primaryAction',
      'type' => 'add_after',
      'content' => '{template="whoReadTheTopic" group="plugins" location="global" app="core" params="$topic"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */











}