//<?php

class hook120 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'forumRow' => 
  array (
    0 => 
    array (
      'selector' => 'li.ipsDataItem.ipsDataItem_responsivePhoto.ipsClearfix > div.ipsDataItem_main > h4.ipsDataItem_title.ipsType_large',
      'type' => 'add_after',
      'content' => '{{if \IPS\forums\Topic::containerUnread( $forum )}}
<span class="ipsBadge ipsBadge_style4 unread_badge">{lang="unread"}</span>
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


















}