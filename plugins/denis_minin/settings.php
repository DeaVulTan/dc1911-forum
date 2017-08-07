//<?php
	
/* Settings */
$form->addHeader('bnHeaderMessage_header_settings');

/* Visible */
$form->add( new \IPS\Helpers\Form\YesNo( 'bnHeaderMessage_visible', \IPS\Settings::i()->bnHeaderMessage_visible, FALSE, array(), NULL, NULL, NULL, 'bnHeaderMessage_visible') );

/* Groups */
$form->add( new \IPS\Helpers\Form\Select( 'bnHeaderMessage_groups', \IPS\Settings::i()->bnHeaderMessage_groups, FALSE, array( 'options' => \IPS\Member\Group::groups(TRUE, TRUE), 'parse' => 'normal', 'multiple' => true, 'unlimited' => 'all', 'unlimitedLang' => 'all_groups' ), NULL, NULL, NULL, 'bnHeaderMessage_groups' ) );

/* Content */
$form->add( new \IPS\Helpers\Form\Translatable( 'bnHeaderMessage_content', NULL, TRUE, array( 'app' => 'core', 'key' => 'bnHeaderMessage_content_value', 'textArea' => TRUE), NULL, NULL, NULL, 'bnHeaderMessage_content_id' ));

/* Formatting */
$form->addHeader('bnHeaderMessage_header_format');

/* Format */
$form->add( new \IPS\Helpers\Form\Select( 'bnHeaderMessage_format', \IPS\Settings::i()->bnHeaderMessage_format, FALSE, array(
	'options' => array(
		0 => 'bnHeaderMessage_format0', 
		1 => 'bnHeaderMessage_format1', 
		2 => 'bnHeaderMessage_format2',
		3 => 'bnHeaderMessage_format3',
		4 => 'bnHeaderMessage_format4'
	),
'multiple' => FALSE) ) );

/* fa-icon */
$form->add( new \IPS\Helpers\Form\Text( 'bnHeaderMessage_icon', \IPS\Settings::i()->bnHeaderMessage_icon, FALSE, array(), NULL, NULL, NULL, 'bnHeaderMessage_icon') );

/* Background Colour */
$form->add( new \IPS\Helpers\Form\Color( 'bnHeaderMessage_background_colour', \IPS\Settings::i()->bnHeaderMessage_background_colour, FALSE, array(), NULL, NULL, NULL, 'bnHeaderMessage_text_colour') );

/* Text Colour */
$form->add( new \IPS\Helpers\Form\Color( 'bnHeaderMessage_text_colour', \IPS\Settings::i()->bnHeaderMessage_text_colour, FALSE, array(), NULL, NULL, NULL, 'bnHeaderMessage_text_colour') );

/* Text Align */
$form->add( new \IPS\Helpers\Form\Select( 'bnHeaderText_align', \IPS\Settings::i()->bnHeaderText_align, FALSE, array(
	'options' => array(
		'ipsType_left' => 'bnHeaderText_align0', 
		'ipsType_center' => 'bnHeaderText_align1', 
		'ipsType_right' => 'bnHeaderText_align2'
	),
'multiple' => FALSE) ) );


if ( $values = $form->values() )
{
	\IPS\Lang::saveCustom( 'core', 'bnHeaderMessage_content_value', $values['bnHeaderMessage_content'] ); unset( $values['bnHeaderMessage_content'] );
	$form->saveAsSettings();
	return TRUE;
}

return $form;