//<?php

$form->addTab( 'topicViewed_recording' );

$form->add( new \IPS\Helpers\Form\YesNo( 'topicViewed_uniqueVisit', \IPS\Settings::i()->topicViewed_uniqueVisit, FALSE, array( 'togglesOff' => array( 'topicViewed_floodControl' ) ) ) );

$form->add( new \IPS\Helpers\Form\Number( 'topicViewed_floodControl', \IPS\Settings::i()->topicViewed_floodControl, FALSE, array( 'min' => 1, 'unlimited' => 0, 'unlimitedLang' => 'never' ), NULL, NULL, \IPS\Member::loggedIn()->language()->addToStack('minutes'), 'topicViewed_floodControl' ) );

$form->add( new \IPS\Helpers\Form\Select( 'topicViewed_hideInList', explode( ',', \IPS\Settings::i()->topicViewed_hideInList ), FALSE, array( 'options' => \IPS\Member\Group::groups( TRUE, FALSE ), 'multiple' => TRUE, 'parse' => 'normal' ) ) );

$form->add( new \IPS\Helpers\Form\Node( 'topicViewed_forums', \IPS\Settings::i()->topicViewed_forums ? \IPS\Settings::i()->topicViewed_forums : 0, FALSE, array( 'multiple' => TRUE, 'class' => 'IPS\forums\Forum', 'zeroVal' => 'topicViewed_all_forums' ), NULL, NULL, NULL, 'topicViewed_forums' ) );

$form->addTab( 'topicViewed_recording_displaying' );

$form->add( new \IPS\Helpers\Form\Select( 'topicViewed_canViewList', ( \IPS\Settings::i()->topicViewed_canViewList == '*' or \IPS\Settings::i()->topicViewed_canViewList === NULL ) ? '*' : explode( ',', \IPS\Settings::i()->topicViewed_canViewList ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'multiple' => TRUE, 'parse' => 'normal', 'unlimited' => '*', 'unlimitedLang' => 'all' ) ) );

$form->add( new \IPS\Helpers\Form\Select( 'topicViewed_sortBy', \IPS\Settings::i()->topicViewed_sortBy, FALSE, array( 'options' => array(
	'dateview'	=> \IPS\Member::loggedIn()->language()->addToStack('topicViewed_visitdate'),
	'name'		=> \IPS\Member::loggedIn()->language()->addToStack('topicViewed_username')
) ) ) );

$form->add( new \IPS\Helpers\Form\Select( 'topicViewed_sortOrder', \IPS\Settings::i()->topicViewed_sortOrder, FALSE, array( 'options' => array(
	'desc'	=> \IPS\Member::loggedIn()->language()->addToStack('topicViewed_desc'),
	'asc'	=> \IPS\Member::loggedIn()->language()->addToStack('topicViewed_asc')
) ) ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;