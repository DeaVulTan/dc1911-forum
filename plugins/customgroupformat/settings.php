//<?php

$form->add( new \IPS\Helpers\Form\YesNo( 'custom_group_format_cache', \IPS\Settings::i()->custom_group_format_cache ) );

if ( $values = $form->values() )
{
    if( \IPS\Settings::i()->custom_group_format_cache != $values[ 'custom_group_format_cache' ] )
    {
        if( $values[ 'custom_group_format_cache' ] )
        {
            $formats = array();
            $rows = iterator_to_array( \IPS\Db::i()->select( 'name,name_prefix,name_suffix', 'core_members', array( 'name_prefix!="" AND name_suffix!=""' ) ) );

            foreach( $rows as $row )
            {
                $formats[ $row[ 'name' ] ] = array( $row[ 'name_prefix' ], $row[ 'name_suffix' ] );
            }

            \IPS\Data\Store::i()->customGroupFormats = $formats;
        }
        else
        {
            unset( \IPS\Data\Store::i()->customGroupFormats );
        }
    }

	$form->saveAsSettings();
	return TRUE;
}

return $form;