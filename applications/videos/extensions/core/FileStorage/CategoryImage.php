<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\extensions\core\FileStorage;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * File Storage Extension: CategoryImage
 */
class _CategoryImage
{
	/**
	 * Count stored files
	 *
	 * @return	int
	 */
	public function count()
	{
		return \IPS\Db::i()->select( 'COUNT(*)', 'videos_cat', 'cat_image IS NOT NULL' )->first();
	}
	
	/**
	 * Move stored files
	 *
	 * @param	int			$offset					This will be sent starting with 0, increasing to get all files stored by this extension
	 * @param	int			$storageConfiguration	New storage configuration ID
	 * @param	int|NULL	$oldConfiguration		Old storage configuration ID
	 * @throws	\UnderflowException					When file record doesn't exist. Indicating there are no more files to move
	 * @return	void								FALSE when there are no more files to move
	 */
	public function move( $offset, $storageConfiguration, $oldConfiguration=NULL )
	{
		$category = \IPS\videos\Category::constructFromData( \IPS\Db::i()->select( '*', 'videos_cat', 'cat_image IS NOT NULL', 'id', array( $offset, 1 ) )->first() );
		
		try
		{
			$category->cat_image = \IPS\File::get( $oldConfiguration ?: 'videos_CategoryImage', $category->cat_image )->move( $storageConfiguration );
			$category->save();
		}
		catch( \Exception $e )
		{
			/* Any issues are logged */
		}
	}
    
	/**
	 * Fix all URLs
	 *
	 * @param	int			$offset					This will be sent starting with 0, increasing to get all files stored by this extension
	 * @return void
	 */
	public function fixUrls( $offset )
	{       
		$category = \IPS\videos\Category::constructFromData( \IPS\Db::i()->select( '*', 'videos_cat', "cat_image IS NOT NULL", 'id', array( $offset, 1 ) )->first() );

		if ( $new = \IPS\File::repairUrl( $category->cat_image ) )
		{
			$category->cat_image = $new;
			$category->save();
		}
	}    

	/**
	 * Check if a file is valid
	 *
	 * @param	\IPS\Http\Url	$file		The file to check
	 * @return	bool
	 */
	public function isValidFile( $file )
	{
		try
		{
			\IPS\Db::i()->select( 'id', 'videos_cat', array( 'cat_image=?', $file ) )->first();
			return TRUE;
		}
		catch ( \UnderflowException $e )
		{
			return FALSE;
		}	   
	}

	/**
	 * Delete all stored files
	 *
	 * @return	void
	 */
	public function delete()
	{
		foreach( \IPS\Db::i()->select( '*', 'videos_cat', "cat_image IS NOT NULL" ) as $category )
		{
			try
			{
				\IPS\File::get( 'videos_CategoryImage', $category['cat_image'] )->delete();
			}
			catch( \Exception $e ){}
		}	   
	}
}