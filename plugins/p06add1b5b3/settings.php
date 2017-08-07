//<?php

$form->add( new \IPS\Helpers\Form\Upload( 'default_cover_photo_image', \IPS\File::get( 'core_Profile', \IPS\Settings::i()->default_cover_photo_image ), FALSE, [ 'storageExtension' => 'core_Profile', 'multiple' => false, 'image' => TRUE ] ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;