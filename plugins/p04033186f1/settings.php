//<?php

$form->add( new \IPS\Helpers\Form\Select( 'avgcontentperday_decimal', \IPS\Settings::i()->avgcontentperday_decimal, TRUE, array( 'options' => array( 0 => 'No Decimal Round up or down', 1 => '1 decimal place', 2=> '2 decimal places' ), 'multiple' => FALSE ) ));

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;