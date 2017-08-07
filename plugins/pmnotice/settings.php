//<?php
/**
 * @package		Pn Notice
 * @author		<a href='http://www.invisionizer.com'>Invisionizer</a>
 * @copyright	(c) 2015 Invisionizer
 */

$form->add( new \IPS\Helpers\Form\YesNo( 'pmNotice_enable', isset( \IPS\Settings::i()->pmNotice_enable ) ? \IPS\Settings::i()->pmNotice_enable : 0 ) );
$form->add( new \IPS\Helpers\Form\TextArea( 'pmNotice_msg', isset( \IPS\Settings::i()->pmNotice_msg ) ? \IPS\Settings::i()->pmNotice_msg : \IPS\Settings::i()->pmNotice_msg, TRUE) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;