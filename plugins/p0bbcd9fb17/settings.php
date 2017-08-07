//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'liveB_enable', \IPS\Settings::i()->liveB_enable ) );
$form->add( new \IPS\Helpers\Form\Select( 'liveB_g', \IPS\Settings::i()->liveB_g ? explode( ',', \IPS\Settings::i()->liveB_g ) : array(), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => true ), NULL, NULL, NULL, 'liveB_g' ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;