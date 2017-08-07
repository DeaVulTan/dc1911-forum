//<?php

class hook35 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'postContainer' => 
  array (
    0 => 
    array (
      'selector' => 'article > aside.ipsComment_author.cAuthorPane > ul.cAuthorPane_info > li.cAuthorPane_photo + li',
      'type' => 'replace',
      'content' => '<li>{$comment->author()->groupName|raw}</li>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */






}