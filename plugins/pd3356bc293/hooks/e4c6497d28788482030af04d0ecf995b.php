//<?php

class hook93 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'globalTemplate' => 
  array (
    0 => 
    array (
      'selector' => '#elSiteTitle',
      'type' => 'replace',
      'content' => '{{$siteName = \IPS\Settings::i()->board_name;}} 
<a href="" id="elSiteTitle">

    <span id="elLogo">
        <img src="" alt=""> </img>
    </span>
    {$siteName}
</a> ',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */




}