//<?php

$form->add( new \IPS\Helpers\Form\Number( 'mpl', \IPS\Settings::i()->mpl, FALSE, array( 'min' => 3 ), NULL, NULL, \IPS\Member::loggedIn()->language()->addToStack( 'max_title_length_suffix' ) ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;