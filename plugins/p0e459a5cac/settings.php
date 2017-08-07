//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'uopbShowIgnore', isset( \IPS\Settings::i()->uopbShowIgnore ) ? \IPS\Settings::i()->uopbShowIgnore : TRUE ) );
$form->add( new \IPS\Helpers\Form\YesNo( 'uopbEmbedPost',  isset( \IPS\Settings::i()->uopbEmbedPost ) ? \IPS\Settings::i()->uopbEmbedPost : TRUE ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;