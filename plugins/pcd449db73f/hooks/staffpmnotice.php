//<?php

class hook81 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'template' => 
  array (
    0 => 
    array (
      'selector' => '#elMessageViewer',
      'type' => 'add_before',
      'content' => '{{$starter = \IPS\Member::load( $conversation->starter_id );}}
{{if $starter->inGroup( settings.pm_notice_groups )}}
	<div class=\'ipsMessage ipsMessage_info\'>
		{lang="pmnotice_trusted_staff"}
	</div>
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */
















}