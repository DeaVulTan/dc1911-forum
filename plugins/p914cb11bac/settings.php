//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'reviewVoters_author', \IPS\Settings::i()->reviewVoters_author, FALSE, array(), NULL, NULL, NULL, 'reviewVoters_author' ) );
$form->add( new \IPS\Helpers\Form\Select( 'reviewVoters_groups', \IPS\Settings::i()->reviewVoters_groups ? \IPS\Settings::i()->reviewVoters_groups : 'all', FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => true, 'unlimited' => 'all', 'unlimitedLang' => 'all_groups' ), NULL, NULL, NULL, 'reviewVoters_groups' ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;