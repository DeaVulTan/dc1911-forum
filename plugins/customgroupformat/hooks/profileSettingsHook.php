//<?php

class hook31 extends _HOOK_CLASS_
{
    /**
	 * Process Form
	 *
	 * @param	\IPS\Helpers\Form		$form	The form
	 * @param	\IPS\Member				$member	Existing Member
	 * @return	void
	 */
	public function process( &$form, $member )
	{
		try
		{
			call_user_func_array( 'parent::process', func_get_args() );
	
			/* Prefix/Suffix */
			$form->add( new \IPS\Helpers\Form\Custom( 'g_prefixsuffix', array( 'prefix' => $member->name_prefix, 'suffix' => $member->name_suffix ), FALSE, array(
				'getHtml'	=> function( $element )
				{
					$color = NULL;
					if ( preg_match( '/^<span style=\'color:#((?:(?:[a-f0-9]{3})|(?:[a-f0-9]{6})));\'>$/i', $element->value['prefix'], $matches ) and $element->value['suffix'] === '</span>' )
					{
						$color = $matches[1];
						$element->value['prefix'] = NULL;
						$element->value['suffix'] = NULL;
					}
									
					return \IPS\Theme::i()->getTemplate( 'members', 'core' )->prefixSuffix( $element->name, $color, $element->value['prefix'], $element->value['suffix'] );
				},
				'formatValue' => function( $element )
				{
					if ( $element->value['prefix'] or $element->value['suffix'] )
					{
						return array( 'prefix' => $element->value['prefix'], 'suffix' => $element->value['suffix'] );
					}
					elseif ( isset( $element->value['color'] ) )
					{
						$color = mb_strtolower( $element->value['color'] );
						if ( mb_substr( $color, 0, 1 ) !== '#' )
						{
							$color = '#' . $color;
						}
					
						if( !in_array( $color, array( '#fff', '#ffffff', '#000', '#000000' ) ) )
						{
							return array( 'prefix' => "<span style='color:{$color}'>", 'suffix' => '</span>' );
						}
					}
					
					return array( 'prefix' => '', 'suffix' => '' );
				}
			) ) );
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}

	/**
	 * Save
	 *
	 * @param	array				$values	Values from form
	 * @param	\IPS\Member			$member	The member
	 * @return	void
	 */
	public function save( $values, &$member )
	{
		try
		{
			call_user_func_array( 'parent::save', func_get_args() );
	        
			/* Prefix/Suffix */
			$member->name_prefix = $values['g_prefixsuffix']['prefix'];
			$member->name_suffix = $values['g_prefixsuffix']['suffix'];
	
	        if( \IPS\Settings::i()->custom_group_format_cache )
	        {
	            $formats = \IPS\Data\Store::i()->customGroupFormats ?: array();
	            if( isset( $formats[ $member->name ] ) and ( !$member->name_prefix or !$member->name_suffix ) )
	            {
	                unset( $formats[ $member->name ] );
	            }
	
	            if( $member->name_prefix and $member->name_suffix )
	            {
	                $formats[ $member->name ] = array( $member->name_prefix, $member->name_suffix );
	            }
	            \IPS\Data\Store::i()->customGroupFormats = $formats;
	        }
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}
}