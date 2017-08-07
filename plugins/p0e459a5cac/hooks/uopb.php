//<?php

class hook108 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'postContainer' => 
  array (
    0 => 
    array (
      'selector' => 'article[itemtype=\'http://schema.org/Answer\'] > aside.ipsComment_author.cAuthorPane.ipsColumn.ipsColumn_medium > ul.cAuthorPane_info.ipsList_reset',
      'type' => 'add_inside_end',
      'content' => '{{if \IPS\Member::loggedIn()->member_id}}
	{template="uopb" group="plugins" location="global" app="core" params="$comment, $comment->author()"}
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */
































}