//<?php
$form->addHeader('waRepToAll_Header');   
$form->add( new \IPS\Helpers\Form\Select( 'waRepToAllGroups', \IPS\Settings::i()->waRepToAllGroups == '*' ? "*" : explode( ',', \IPS\Settings::i()->waRepToAllGroups ), FALSE, array( 'options' => \IPS\Member\Group::groups( TRUE, FALSE ), 'parse' => 'normal', 'multiple' => TRUE , 'unlimited' => '*', 'unlimitedLang' => 'all_groups' ), NULL, NULL, NULL, 'waRepToAllGroups' ) );

if ( $values = $form->values() )
{
	
}

return $form;