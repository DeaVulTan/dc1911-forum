//<?php

class hook89 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'userBar' => 
  array (
    0 => 
    array (
      'selector' => '#elUserNav > li.cReports.cUserNav_icon',
      'type' => 'add_after',
      'content' => '<li class=\'cApproval cUserNav_icon\'>
	<a href=\'{url="app=core&module=modcp&controller=modcp&tab=approval" seoTemplate="modcp_approval"}\' id=\'elModCPApprovalCount\' data-ipsTooltip title=\'{lang="modcp_approval"}\'>
		{{$approvalQueueCount = \IPS\Content\Search\Query::init()->setHiddenFilter( \IPS\Content\Search\Query::HIDDEN_UNAPPROVED )->count();}}
		<i class=\'fa fa-hourglass-half\'></i> {{if $approvalQueueCount}}<span class=\'ipsNotificationCount\' data-notificationType=\'approvals\'>{$approvalQueueCount}</span>{{endif}}
	</a>
</li>',
    ),
  ),
  'mobileNavigation' => 
  array (
    0 => 
    array (
      'selector' => '#elUserNav_mobile > li.cReports.cUserNav_icon',
      'type' => 'add_after',
      'content' => '<li class=\'cApproval cUserNav_icon\'>
	<a href=\'{url="app=core&module=modcp&controller=modcp&tab=approval" seoTemplate="modcp_approval"}\' id=\'elFullReports\' data-ipsTooltip title=\'{lang="modcp_approval"}\'>
		{{$approvalQueueCount = \IPS\Content\Search\Query::init()->setHiddenFilter( \IPS\Content\Search\Query::HIDDEN_UNAPPROVED )->count();}}
		<i class=\'fa fa-hourglass-half\'></i> {{if $approvalQueueCount}}<span class=\'ipsNotificationCount\' data-notificationType=\'approvals\'>{$approvalQueueCount}</span>{{endif}}
	</a>
</li>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */




























































































}