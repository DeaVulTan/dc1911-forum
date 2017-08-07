//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'postSendPm_showItemsCount', \IPS\Settings::i()->postSendPm_showItemsCount ) );
$form->add( new \IPS\Helpers\Form\Number( 'postSendPm_minItemsCount', \IPS\Settings::i()->postSendPm_minItemsCount, FALSE, array( 'min' => 1 ) ) );

$groups = array();

foreach ( \IPS\Member\Group::groups() as $k => $v )
{
	if ( $k != \IPS\Settings::i()->guest_group )
	{
		$groups[ $k ] = $v->name;
	}
}

$form->add( new \IPS\Helpers\Form\Select( 'postSendPm_allowedGroups', explode( ',', \IPS\Settings::i()->postSendPm_allowedGroups ), FALSE, array( 'options' => $groups, 'multiple' => TRUE ), NULL, NULL, NULL, 'postSendPm_allowedGroups' ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;