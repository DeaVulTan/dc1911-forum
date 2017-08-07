//<?php

class hook121 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'profileHeader' => 
  array (
    0 => 
    array (
      'selector' => '#elProfileStats > ul.ipsList_inline.ipsPos_left > li:first-child',
      'type' => 'add_after',
      'content' => '{{$datediff = date_diff($member->joined, date_create())->format(\'%a\');}}
{{if $datediff > 0 && settings.avgcontentperday_decimal != 0}}
	{{$contentCount = round($member->member_posts / $datediff, settings.avgcontentperday_decimal);}}
{{elseif $datediff > 0 && settings.avgcontentperday_decimal == 0}}
	{{$contentCount = round($member->member_posts / $datediff, 0);}}
{{else}}
	{{$contentCount = $member->member_posts;}}
{{endif}}

{template="avgContentPerDay" params="$member, $contentCount" group="plugins" location="global" app="core"}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


















































































































}