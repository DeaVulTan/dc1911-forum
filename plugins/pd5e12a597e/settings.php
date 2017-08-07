//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'serverloadFront', \IPS\Settings::i()->serverloadFront ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;
