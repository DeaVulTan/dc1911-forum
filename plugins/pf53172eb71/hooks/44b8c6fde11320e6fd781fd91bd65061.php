//<?php

class hook119 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'topicRow' => 
  array (
    0 => 
    array (
      'selector' => 'li.ipsDataItem.ipsDataItem_responsivePhoto[itemtype=\'http://schema.org/Article\'] > div.ipsDataItem_main > h4.ipsDataItem_title.ipsType_break',
      'type' => 'add_after',
      'content' => '{{if $row->unread()}}
<a href=\'{$row->url( \'getNewComment\' )}\' title=\'{lang="first_unread_post"}\' data-ipsTooltip><span class="ipsBadge ipsBadge_style4 unread_badge">{lang="unread"}</span></a>
{{endif}}',
    ),
  ),
  'questionRow' => 
  array (
    0 => 
    array (
      'selector' => 'li.ipsDataItem.cForumQuestion[itemtype=\'http://schema.org/Question\'] > div.ipsDataItem_main > h4.ipsDataItem_title.ipsType_break',
      'type' => 'add_after',
      'content' => '{{if $row->unread()}}
<a href=\'{$row->url( \'getNewComment\' )}\' title=\'{lang="first_unread_post"}\' data-ipsTooltip><span class="ipsBadge ipsBadge_style4 unread_badge">{lang="unread"}</span></a>
{{endif}}',
    ),
  ),
  'popularQuestionRow' => 
  array (
    0 => 
    array (
      'selector' => 'li.ipsDataItem.cForumQuestion > div.ipsDataItem_main > h4.ipsDataItem_title.ipsType_break',
      'type' => 'add_after',
      'content' => '{{if $question->unread()}}
<a href=\'{$question->url( \'getNewComment\' )}\' title=\'{lang="first_unread_post"}\' data-ipsTooltip><span class="ipsBadge ipsBadge_style4 unread_badge">{lang="unread"}</span></a>
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */
























}