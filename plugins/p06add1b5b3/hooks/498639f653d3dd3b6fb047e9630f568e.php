//<?php

class hook85 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'profileHeader' => 
  array (
    1 => 
    array (
      'selector' => '#elProfileHeader',
      'type' => 'add_inside_start',
      'content' => '{{if !$coverPhoto->file}}
	<div class=\'ipsCoverPhoto_container\'>
		<img src=\'{setting="default_cover_photo_image"}\' class=\'ipsCoverPhoto_photo\' alt=\'\'>
	</div>
{{endif}}',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


















}