<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\setup\upg_100008;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * 3.1.5 Upgrade Code
 */
class _Upgrade
{
	/**
	 * Extra Videos serialize to JSON
	 */
	public function step1()
	{
		$perCycle	= 250;
		$did		= 0;
		$limit		= intval( \IPS\Request::i()->extra );
		
		/* Try to prevent timeouts to the extent possible */
		$cutOff	= \IPS\core\Setup\Upgrade::determineCutoff();

		foreach( \IPS\Db::i()->select( '*', 'videos_videos', null, 'tid ASC', array( $limit, $perCycle ) ) as $video )
		{
			if( $cutOff !== null AND time() >= $cutOff )
			{
				return ( $limit + $did );
			}

			$did++;
            
            $updateVideos = array();
            
            /* Has extra videos value to convert */
            if( $video['extra_videos'] )
            {
                $_videos = \unserialize( $video['extra_videos'] );

                /* Modify the way we store extra videos */
                if( is_array( $_videos ) AND count( $_videos ) )
                {
                    foreach( $_videos as $key => $value )
                    {
                        $key = preg_replace( "/([0-9]+)_/", "", $key );
                        $updateVideos[] = array( 'key' => $key, 'value' => $value );  
                    }
                }
                
                \IPS\Db::i()->update( 'videos_videos', array( 'extra_videos' => json_encode( $updateVideos ) ), array( array( 'tid=?', $video['tid'] ) ) );    
            }
		}

		if( $did )
		{
			return ( $limit + $did );
		}
		else
		{
			unset( $_SESSION['_step1Count'] );			
			return TRUE;
		}
	}
	
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step1CustomTitle()
	{
		$limit = isset( \IPS\Request::i()->extra ) ? \IPS\Request::i()->extra : 0;

		if( !isset( $_SESSION['_step1Count'] ) )
		{
			$_SESSION['_step1Count']	= \IPS\Db::i()->select( 'COUNT(*)', 'videos_videos' )->first();
		}

		return "Converting extra videos data (Converted so far: " . ( ( $limit > $_SESSION['_step1Count'] ) ? $_SESSION['_step1Count'] : $limit ) . ' out of ' . $_SESSION['_step1Count'] . ')';
	}    
}