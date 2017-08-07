//<?php

class hook94 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'login' => 
  array (
    0 => 
    array (
      'selector' => '#elLogin_box > div.ipsColumns[data-role=\'loginForms\'] > div.cAcpLoginBox.ipsColumn.ipsColumn_fluid > div.ipsPad > h1.ipsType_pageTitle',
      'type' => 'replace',
      'content' => '{{$siteName = \IPS\Settings::i()->board_name;}}
<h1 class="ipsType_pageTitle">

    <i class="fa fa-lock"> </i>
    {$siteName}

</h1> ',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */




}