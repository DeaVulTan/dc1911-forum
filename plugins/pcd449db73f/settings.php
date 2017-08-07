//<?php

$form->add( new \IPS\Helpers\Form\Select( 'pm_notice_groups', \IPS\Settings::i()->pm_notice_groups ? explode( ',', \IPS\Settings::i()->pm_notice_groups ) : NULL, TRUE, array(
	'options' => \IPS\Member\Group::groups( TRUE, FALSE ),
	'parse' => 'normal',
	'multiple' => true,
)  ) );


if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;