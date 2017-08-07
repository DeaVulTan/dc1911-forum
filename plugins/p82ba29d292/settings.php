//<?php

$form->add( new \IPS\Helpers\Form\Editor( 'siteMessage_content', \IPS\Settings::i()->siteMessage_content, FALSE, array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'siteMessage_content' ) ) );

$form->add( new \IPS\Helpers\Form\Select( 'siteMessage_style', \IPS\Settings::i()->siteMessage_style, FALSE, array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'siteMessage_style', 'multiple' => FALSE, 'options' => array( 0 => 'Plain', 1 => 'Grey', 2 => 'Green', 3 => 'Orange', 4 => 'Red' ) ) ) );

$form->add( new \IPS\Helpers\Form\Text( 'siteMessage_icon', \IPS\Settings::i()->siteMessage_icon, FALSE, array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'siteMessage_icon' ) ) );

$form->add( new \IPS\Helpers\Form\Select(
	'siteMessage_groups',
	\IPS\Settings::i()->siteMessage_groups == '*' ? '*' : explode( ',', \IPS\Settings::i()->siteMessage_groups ),
	FALSE,
	array( 	'options' => array_combine( array_keys( \IPS\Member\Group::groups() ), array_map( function( $_group ) { return (string) $_group; }, \IPS\Member\Group::groups() ) ),
			'multiple' => true,
			'unlimited' => '*',
			'unlimitedLang' => 'all_groups'
	)
));

$form->add( new \IPS\Helpers\Form\YesNo( 'siteMessage_allowDismiss', \IPS\Settings::i()->siteMessage_allowDismiss ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	\IPS\Db::i()->update( 'core_members', array( 'siteMessage_dismissed' => 0 ) );
	return TRUE;
}

return $form;
