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
 * File Storage Extension: Thumbs
 */
class _Thumbs
{
	/**
	 * Count stored files
	 *
	 * @return	int
	 */
	public function count()
	{
		return \IPS\Db::i()->select( 'COUNT(*)', 'videos_videos', 'thumbnail IS NOT NULL' )->first();
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
		$video = \IPS\videos\Video::constructFromData( \IPS\Db::i()->select( '*', 'videos_videos', 'thumbnail IS NOT NULL', 'tid', array( $offset, 1 ) )->first() );
		
		try
		{
			$video->thumbnail = \IPS\File::get( $oldConfiguration ?: 'videos_Thumbs', $video->thumbnail )->move( $storageConfiguration );
			$video->save();
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
		$video = \IPS\videos\Video::constructFromData( \IPS\Db::i()->select( '*', 'videos_videos', 'thumbnail IS NOT NULL', 'tid', array( $offset, 1 ) )->first() );

		if ( $new = \IPS\File::repairUrl( $video->thumbnail ) )
		{
			$video->thumbnail = $new;
			$video->save();
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
			\IPS\Db::i()->select( 'tid', 'videos_videos', array( 'thumbnail=?', $file ) )->first();
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
		foreach( \IPS\Db::i()->select( '*', 'videos_videos', "thumbnail IS NOT NULL" ) as $video )
		{
			try
			{
				\IPS\File::get( 'videos_Thumbs', $video['thumbnail'] )->delete();
			}
			catch( \Exception $e ){}
		}	   
	}
}