//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'memberFeatures_su', \IPS\Settings::i()->memberFeatures_su, FALSE ) );
$form->add( new \IPS\Helpers\Form\YesNo( 'memberFeatures_visitors', \IPS\Settings::i()->memberFeatures_visitors, FALSE ) );
$form->add( new \IPS\Helpers\Form\YesNo( 'memberFeatures_pmpopup', \IPS\Settings::i()->memberFeatures_pmpopup, FALSE ) );
$form->add( new \IPS\Helpers\Form\YesNo( 'memberFeatures_vs', \IPS\Settings::i()->memberFeatures_vs, FALSE ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;