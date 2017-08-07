//<?php

class hook122 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'rows' => 
  array (
    0 => 
    array (
      'selector' => 'li.ipsDataItem > div.ipsDataItem_main > p.ipsType_normal > span',
      'type' => 'replace',
      'content' => '    <span>
        <i class="fa fa-arrow-circle-down"> </i>
		{{if $file->canViewDownloaders()}}
			<a href=\'{$file->url(\'log\')}\' title=\'{lang="view_downloader_list"}\' class=\'\' data-ipsDialog data-ipsDialog-size="narrow" data-ipsDialog-title="{lang="downloaders"}">{lang="num_downloads" pluralize="$file->downloads"}</a>
		{{else}}
			{lang="num_downloads" pluralize="$file->downloads"}
		{{endif}}
    </span>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */














}