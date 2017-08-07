<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\extensions\core\Uninstall;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Uninstall callback
 */
class _Videos
{
	/**
	 * Code to execute before the application has been uninstalled
	 *
	 * @param	string	$application	Application directory
	 * @return	array
	 */
	public function preUninstall( $application )
	{
	}

	/**
	 * Code to execute after the application has been uninstalled
	 *
	 * @param	string	$application	Application directory
	 * @return	array
	 */
	public function postUninstall( $application )
	{
	    /* Setup list of our permissions */
	    $ourPermissions = array( 'g_vs_view', 'g_vs_add_video', 'g_vs_edit_video', 'g_vs_delete_video', 'g_vs_rate_video', 'g_vs_rate_video_change',
                                 'g_vs_report_video', 'g_vs_embed_video', 'g_vs_view_comments', 'g_vs_add_comments', 'g_vs_edit_comments',
                                 'g_vs_delete_comments', 'g_vs_comments_per_member', 'g_vs_m_edit_videos', 'g_vs_m_delete_videos', 
                                 'g_vs_m_edit_comments', 'g_vs_m_delete_comments', 'g_vs_m_manage' );
        
        /* Go through and delete */                      
        foreach( $ourPermissions as $perm )
        {
            if( \IPS\Db::i()->checkForColumn( 'core_groups', $perm ) )
            {
                \IPS\Db::i()->dropColumn( 'core_groups', array( $perm ) );    
            }            
        }	   	   
	}
}