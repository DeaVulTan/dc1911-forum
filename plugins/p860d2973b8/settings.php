//<?php
$form->add( new \IPS\Helpers\Form\YesNo( 'signupMessage_visible', \IPS\Settings::i()->signupMessage_visible, FALSE, array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'signupMessage_visible' ) ) );
$form->add( new \IPS\Helpers\Form\Select( 'signupMessage_format', \IPS\Settings::i()->signupMessage_format, FALSE, array( 'options' => array( 0 => 'None', 1 => 'Information', 2 => 'Error', 3 => 'Warning', 4 => 'Success' ), 'multiple' => FALSE , 'autoSaveKey' => 'signupMessage_format') ) );
$form->add( new \IPS\Helpers\Form\Editor( 'signupMessage_content', \IPS\Settings::i()->signupMessage_content, FALSE, array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'signupMessage_content' ) ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;