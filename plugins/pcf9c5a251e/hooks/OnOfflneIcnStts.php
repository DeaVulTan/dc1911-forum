//<?php

class hook106 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'postContainer' => 
  array (
    1 => 
    array (
      'selector' => 'article[itemtype=\'http://schema.org/Answer\'] > aside.ipsComment_author.cAuthorPane.ipsColumn.ipsColumn_medium > h3.ipsType_sectionHead.cAuthorPane_author.ipsType_blendLinks.ipsType_break[itemprop=\'creator\'][itemtype=\'http://schema.org/Person\']',
      'type' => 'add_inside_start',
      'content' => '{{if member.member_id}}
	{{if $comment->author()->isOnline()}}
		<i class="fa fa-circle ipsOnlineStatus_online" data-ipsTooltip title="{lang="online_now" sprintf="$comment->author()->name"}"> </i>
	{{else}} 
		<i class="fa fa-circle ipsOnlineStatus_offline" data-ipsTooltip title=""> </i>
	{{endif}}
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */










































}