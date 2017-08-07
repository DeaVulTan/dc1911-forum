<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */
 
namespace IPS\videos;

/**
 * Videos Application Class
 */
class _Application extends \IPS\Application
{
	/**
	 * Init
	 *
	 * @return	void
	 */
	public function init()
	{
		/* Can view videos app? */
		if ( !\IPS\Member::loggedIn()->group['g_vs_view'] )
		{
			\IPS\Output::i()->error( 'no_view_videos_perms', '', 403, '' );
		}
	}
    
	/**
	 * Install 'other' items.
	 *
	 * @return void
	 */
	public function installOther()
	{
	    /* Give non guests what permissions they need */
		foreach( \IPS\Member\Group::groups( TRUE, FALSE ) as $group )
		{
		    /* P */
			$group->g_vs_add_video     = TRUE;
            $group->g_vs_edit_video    = TRUE;
            $group->g_vs_add_comments  = TRUE;
            $group->g_vs_edit_comments = TRUE;
            $group->g_vs_rate_video    = TRUE;                        
			$group->save();
            
		    /* VIP */
            if( $group->g_access_cp )
            {
    			$group->g_vs_delete_video      = TRUE;
                $group->g_vs_delete_comments   = TRUE;
                $group->g_vs_m_edit_videos     = TRUE;
                $group->g_vs_m_delete_videos   = TRUE;
                $group->g_vs_m_edit_comments   = TRUE;   
                $group->g_vs_m_delete_comments = TRUE;                 
                $group->g_vs_m_manage          = TRUE;                                      
    			$group->save();
            }            
		}
	}    
        
	/**
	 * [Node] Get Icon for tree
	 *
	 * @note	Return the class for the icon (e.g. 'globe')
	 * @return	string|null
	 */
	protected function get__icon()
	{
		return 'video-camera';
	} 
    
	/**
	 * Default front navigation
	 *
	 * @code
	 	
	 	// Each item...
	 	array(
			'key'		=> 'Example',		// The extension key
			'app'		=> 'core',			// [Optional] The extension application. If ommitted, uses this application	
			'config'	=> array(...),		// [Optional] The configuration for the menu item
			'title'		=> 'SomeLangKey',	// [Optional] If provided, the value of this language key will be copied to menu_item_X
			'children'	=> array(...),		// [Optional] Array of child menu items for this item. Each has the same format.
		)
	 	
	 	return array(
		 	'rootTabs' 		=> array(), // These go in the top row
		 	'browseTabs'	=> array(),	// These go under the Browse tab on a new install or when restoring the default configuraiton; or in the top row if installing the app later (when the Browse tab may not exist)
		 	'browseTabsEnd'	=> array(),	// These go under the Browse tab after all other items on a new install or when restoring the default configuraiton; or in the top row if installing the app later (when the Browse tab may not exist)
		 	'activityTabs'	=> array(),	// These go under the Activity tab on a new install or when restoring the default configuraiton; or in the top row if installing the app later (when the Activity tab may not exist)
		)
	 * @endcode
	 * @return array
	 */
	public function defaultFrontNavigation()
	{
		return array(
			'rootTabs'		=> array(),
			'browseTabs'	=> array( array( 'key' => 'Videos' ) ),
			'browseTabsEnd'	=> array(),
			'activityTabs'	=> array()
		);
	}    
}