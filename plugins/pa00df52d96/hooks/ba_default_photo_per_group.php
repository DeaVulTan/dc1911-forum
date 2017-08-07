//<?php

class hook22 extends _HOOK_CLASS_
{
	/**
	 * Get photo from data
	 *
	 * @param	array	$memberData	Array of member data, must include values for at least the keys returned by columnsForPhoto()
	 * @param	bool	$thumb		Use thumbnail?
	 * @return	string
	 */
	static public function photoUrl( $memberData, $thumb=true )
	{
		try
		{
			$photoUrl = call_user_func_array( 'parent::photoUrl', func_get_args() );
			if(mb_strpos($photoUrl, 'default_photo.png', mb_strlen($photoUrl)-17) !== FALSE)
			{
				$tempPhoto = \IPS\Theme::i()->resource( 'plugins/default_photo_'.$memberData['member_group_id'].'.png', 'core', 'global' );
				$photoUrl = (!empty($tempPhoto) AND \IPS\File::get( 'core_Theme', $tempPhoto )->filesize()) ? $tempPhoto : $photoUrl;
			}
			return $photoUrl;
			/**
			 *	@TODO check isValidFile() on applications\core\extensions\core\FileStorage\Theme.php and diff with \IPS\Theme::i()->resource(...)
			 *	from isValidFile() => \IPS\Db::i()->select( 'COUNT(*)', 'core_theme_resources', array('resource_filename=?',$tempPhoto) )->first()
			 *	\IPS\File::get( 'core_Theme', $tempPhoto )->filesize() make sure the image exits, but could be "resource wasting"
			 *	@support me here thanks: https://invisionpower.com/forums/topic/428099-check-if-resource-exist/
			 */
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