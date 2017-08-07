<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\setup\upg_100001;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * 3.1.0 Beta 1 (IPB4) Upgrade Code
 */
class _Upgrade
{
	/**
	 * Main changes
	 */
	public function step1()
	{
	    /* Rename main table */
        if( \IPS\Db::i()->checkForTable( 'videos' ) ) 
        {
            \IPS\Db::i()->renameTable( 'videos', 'videos_videos' );    
        }         
       
        /* Remove IPB 3.4 settings */
        \IPS\Db::i()->delete( 'core_sys_conf_settings', "conf_key IN( 'vs_online', 'vs_profile_display', 'vs_results_per_page', 
        'vs_results_per_page_options', 'vs_group_format', 'vs_portal_layout', 'vs_category_portal', 'vs_category_sideblock_allcats', 
        'vs_portal_sidebar_size', 'vs_disabled_portal_blocks', 'vs_latest_comments_limit', 'vs_last_updated_limit', 'vs_last_updated_cats', 
        'vs_top_rated_limit', 'vs_top_rated_cats', 'vs_videos_by_user_limit', 'vs_videos_from_category_limit', 'vs_mark_watched', 
        'vs_name_character_limit', 'vs_show_video_content', 'vs_quick_addform', 'vs_hd_thumbnail', 'vs_category_thumbnail', 
        'vs_disable_share_toggle', 'vs_rss_feed_limit', 'vs_char_max_comment', 'vs_sidebar_enable', 'vs_sidebar_results', 'vs_sidebar_sort_by', 
        'vs_sidebar_sort_order', 'vs_global_box_show', 'vs_global_box_where', 'vs_global_box_limit', 'vs_global_box_sort_by', 
        'vs_global_box_sort_order', 'vs_hide_version', 'vs_embed_thumbnail' )" );      
        
        /* Re-enable app again */
        \IPS\Db::i()->update( 'core_applications', array( 'app_enabled' => 1 ), array( 'app_directory=?', 'videos' ) ); 

        return TRUE;            
	} 
    
	/**
	 * Column modifications
	 */
	public function step2()
	{
	    /* Category table changes */
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'cid' ) )
        {        
    		\IPS\Db::i()->changeColumn( 'videos_cat', 'cid', array(
    			'name'			 => 'id',
    			'type'			 => 'mediumint',
                'auto_increment' => true,
    			'length'		 => 5,
    			'default'		 => 0
    		) ); 
        }
          
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'c_options' ) )
        {               
    		\IPS\Db::i()->changeColumn( 'videos_cat', 'c_options', array(
    			'name'		=> 'options',
    			'type'		=> 'text',
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }
        
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'seo_name' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_cat', 'seo_name', array(
    			'name'		=> 'seo_name',
    			'type'		=> 'varchar',
    			'length'	=> 255,            
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }        
        
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'tags_disabled' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_cat', 'tags_disabled', array(
    			'name'		=> 'tags_enable',
    			'type'		=> 'tinyint',
    			'length'	=> 1,           
    			'default'	=> 1
    		) );
        }        
        
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'tags_noprefixes' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_cat', 'tags_noprefixes', array(
    			'name'		=> 'tags_prefixes',
    			'type'		=> 'tinyint',
    			'length'	=> 1,           
    			'default'	=> 1
    		) ); 
        }               
        
        /* Comments table changes */
        if( \IPS\Db::i()->checkForColumn( 'videos_comments', 'member_id' ) )
        {                
    		\IPS\Db::i()->changeColumn( 'videos_comments', 'member_id', array(
    			'name'		=> 'comment_member_id',
    			'type'		=> 'int',
    			'length'	=> 5,                     
    			'default'	=> 0
    		) );
        } 
                        
        if( \IPS\Db::i()->checkForColumn( 'videos_comments', 'date' ) )
        {                            
    		\IPS\Db::i()->changeColumn( 'videos_comments', 'date', array(
    			'name'		=> 'comment_date',
    			'type'		=> 'int',
    			'length'	=> 10,                     
    			'default'	=> 0
    		) );
        }         
        
        if( \IPS\Db::i()->checkForColumn( 'videos_comments', 'comment' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_comments', 'comment', array(
    			'name'		=> 'comment_text',
    			'type'		=> 'text',
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }         
        
        /* Videos table changes */
        
        if( \IPS\Db::i()->checkForColumn( 'videos_videos', 'description' ) )
        {         
     		\IPS\Db::i()->changeColumn( 'videos_videos', 'description', array(
    			'name'		=> 'description',
    			'type'		=> 'text',
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }         
        
        if( \IPS\Db::i()->checkForColumn( 'videos_videos', 'short_desc' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_videos', 'short_desc', array(
    			'name'		=> 'short_desc',
    			'type'		=> 'varchar',
    			'length'	=> 255,            
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }           
        
        if( \IPS\Db::i()->checkForColumn( 'videos_videos', 'video_type' ) )
        {              
    		\IPS\Db::i()->changeColumn( 'videos_videos', 'video_type', array(
    			'name'		=> 'video_type',
    			'type'		=> 'varchar',
    			'length'	=> 255,            
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }         
        
        if( \IPS\Db::i()->checkForColumn( 'videos_videos', 'seo_title' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_videos', 'seo_title', array(
    			'name'		=> 'seo_title',
    			'type'		=> 'varchar',
    			'length'	=> 255,            
                'null'      => true,            
    			'default'	=> NULL
    		) );
        }         
        
        if( \IPS\Db::i()->checkForColumn( 'videos_videos', 'thumbnail' ) )
        {         
    		\IPS\Db::i()->changeColumn( 'videos_videos', 'thumbnail', array(
    			'name'		=> 'thumbnail',
    			'type'		=> 'varchar',
    			'length'	=> 250,            
                'null'      => true,            
    			'default'	=> NULL
    		) );                
        } 
                               
        /* Drop category fields */    
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'c_info' ) )
        {
            \IPS\Db::i()->dropColumn( 'videos_cat', array( 'c_info' ) );    
        }         
        if( \IPS\Db::i()->checkForColumn( 'videos_cat', 'video_ids_cache' ) )
        {
            \IPS\Db::i()->dropColumn( 'videos_cat', array( 'video_ids_cache' ) );    
        }                     
        
        /* Drop videos fields */
	    $deleteFields = array( 'author_name', 'flagged', 'members_seo_name', 'video_info', 'topic_seo' );
        
        /* Go through and delete */                      
        foreach( $deleteFields as $field )
        {
            if( \IPS\Db::i()->checkForColumn( 'core_groups', $field ) )
            {
                \IPS\Db::i()->dropColumn( 'videos_videos', array( $field ) );    
            }            
        }                 
                      
        return TRUE;                            
	} 
    
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step2CustomTitle()
	{
		return "Main database changes applied";
	} 
    
	/**
	 * Custom lang setup
	 */
	public function step3()
	{
        /* Change app name */
        \IPS\Lang::saveCustom( 'videos', '__app_videos', 'Videos' );	   	   
       
        /* Convert cats */
		foreach( \IPS\Db::i()->select( '*', 'videos_cat' ) as $category )
		{
			\IPS\Lang::saveCustom( 'videos', "videos_category_{$category['id']}", $category['name'] );
			\IPS\Lang::saveCustom( 'videos', "videos_category_{$category['id']}_desc", $category['description'] );
            \IPS\Lang::saveCustom( 'videos', "videos_category_{$category['id']}_rules", $category['cat_rules'] );
		} 
        
	    $deleteFields = array( 'name', 'description', 'cat_rules' );
        
        /* Go through and delete */                      
        foreach( $deleteFields as $field )
        {
            if( \IPS\Db::i()->checkForColumn( 'videos_cat', $field ) )
            {
                \IPS\Db::i()->dropColumn( 'videos_cat', array( $field ) );    
            }            
        }           
        
        return TRUE;                         
	} 
    
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step3CustomTitle()
	{
		return "Building custom langauge";
	} 
    
	/**
	 * Serialize to JSON
	 */
	public function step4()
	{
        /* Convert cats */
		foreach( \IPS\Db::i()->select( '*', 'videos_cat' ) as $category )
		{
            $catSave['options'] = json_encode( \unserialize( $category['options'] ) );

			\IPS\Db::i()->update( 'videos_cat', $catSave, array( 'id=?', $category['id'] ) );
		}   
        
        return TRUE;                        
	}
    
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step4CustomTitle()
	{
		return "Upgrading category options";
	}
    
	/**
	 * Step 5
	 * Move ratings into new table
	 *
	 * @return	array	If returns TRUE, upgrader will proceed to next step. If it returns any other value, it will set this as the value of the 'extra' GET parameter and rerun this step (useful for loops)
	 */
	public function step5()
	{
		$perCycle	= 500;
		$did		= 0;
		$limit		= intval( \IPS\Request::i()->extra );
		
		/* Try to prevent timeouts to the extent possible */
		$cutOff			= \IPS\core\Setup\Upgrade::determineCutoff();

		if ( \IPS\Db::i()->checkForTable( 'videos_rate' ) )
		{
			foreach( \IPS\Db::i()->select( '*', 'videos_rate', null, 'r_id ASC', array( $limit, $perCycle ) ) as $rating )
			{
				if( $cutOff !== null AND time() >= $cutOff )
				{
					return ( $limit + $did );
				}

				$did++;
	
				\IPS\Db::i()->replace( 'core_ratings', array(
					'class'		=> "IPS\\videos\\Video",
					'item_id'	=> $rating['tid'],
					'rating'	=> $rating['ratings'],
					'member'	=> $rating['id'],
					'ip'		=> 0
				) );
			}
		}
		
		if( $did )
		{
			return ( $limit + $did );
		}
		else
		{
			try
			{
				\IPS\Db::i()->dropTable( 'videos_rate' );
			}
			catch( \IPS\Db\Exception $e ) { }

			unset( $_SESSION['_step5Count'] );
			
			return TRUE;
		}
	}
	
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step5CustomTitle()
	{
		$limit = isset( \IPS\Request::i()->extra ) ? \IPS\Request::i()->extra : 0;

		if( \IPS\Db::i()->checkForTable('videos_rate') )
		{
			if( !isset( $_SESSION['_step5Count'] ) )
			{
				$_SESSION['_step5Count'] = \IPS\Db::i()->select( 'COUNT(*)', 'videos_rate' )->first();
			}

			$message = "Upgrading videos ratings (Upgraded so far: " . ( ( $limit > $_SESSION['_step5Count'] ) ? $_SESSION['_step5Count'] : $limit ) . ' out of ' . $_SESSION['_step5Count'] . ')';
		}
		else
		{
			$message = "Upgraded all video ratings";
		}
		
		return $message;
	}  
    
	/**
	 * Save new image locations
	 */
	public function step6()
	{
        /* If setting missing, add the default location */
        if( !\IPS\Settings::i()->vs_thumbnail_path OR !\IPS\Settings::i()->vs_thumbnail_url )
        {
            \IPS\Settings::i()->vs_thumbnail_path = "{root_path}/uploads/videos/thumbnails/";
            \IPS\Settings::i()->vs_thumbnail_url  = "{root_path}/uploads/videos/thumbnails/";
        }
        
        if( !\IPS\Settings::i()->vs_video_upload_path OR !\IPS\Settings::i()->vs_video_upload_url )
        {
            \IPS\Settings::i()->vs_video_upload_path = "{root_path}/uploads/videos/";
            \IPS\Settings::i()->vs_video_upload_url  = "{root_path}/uploads/videos/";
        } 	   
       
        /* Insert new file storage locations */
        $thumbnails = \IPS\Db::i()->insert( 'core_file_storage', array( 'method' => 'FileSystem', 'configuration' => json_encode( array( 'dir' => str_replace( '{root_path}', '{root}', rtrim( \IPS\Settings::i()->vs_thumbnail_path, '/' ) ), 'url' => trim( str_replace( '{root_path}', '', \IPS\Settings::i()->vs_thumbnail_url ), '/' ) ) ) ) );
        $videos     = \IPS\Db::i()->insert( 'core_file_storage', array( 'method' => 'FileSystem', 'configuration' => json_encode( array( 'dir' => str_replace( '{root_path}', '{root}', rtrim( \IPS\Settings::i()->vs_video_upload_path, '/' ) ), 'url' => trim( str_replace( '{root_path}', '', \IPS\Settings::i()->vs_video_upload_url ), '/' ) ) ) ) );
        $catimages  = \IPS\Db::i()->insert( 'core_file_storage', array( 'method' => 'FileSystem', 'configuration' => json_encode( array( 'dir' => "{root}/uploads/videos/cat_images", 'url' => "uploads/videos/cat_images" ) ) ) );
        
		/* Get existing file storage settings */
		$settings = json_decode( \IPS\Settings::i()->upload_settings, TRUE );
        
        /* Override existing settings */
        $settings['filestorage__videos_Thumbs']        = $thumbnails;
        $settings['filestorage__videos_Videos']        = $videos;
        $settings['filestorage__videos_CategoryImage'] = $catimages;
        
        /* Update settings */
        \IPS\Db::i()->update( 'core_sys_conf_settings', array( 'conf_value' => json_encode( $settings ) ), array( array( 'conf_key=?', 'upload_settings' ) ) );
        
        /* Clear cache */
        unset( \IPS\Data\Store::i()->settings, \IPS\Data\Store::i()->storageConfigurations );  
        
        /* Remove old settings */
		try
		{
			\IPS\Db::i()->delete( 'core_sys_conf_settings', "conf_key IN( 'vs_thumbnail_path', 'vs_thumbnail_url', 'vs_video_upload_path', 'vs_video_upload_url' )" ); 
		}
		catch( \IPS\Db\Exception $e ) { } 
        
        return TRUE;                              
	} 
    
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step6CustomTitle()
	{
		return "File storage settings setup";
	}       
    
	/**
	 * Rebuild post content
	 */
	public function step7()
	{ 
        /* Rebuild our category lang */
        \IPS\Task::queue( 'core', 'RebuildNonContentPosts', array( 'extension' => 'videos_Categories' ), 3 ); 	   
       
        /* Rebuild videos and comments posts */
        try
		{
			\IPS\Task::queue( 'core', 'RebuildPosts', array( 'class' => 'IPS\videos\Video' ), 3 );
            \IPS\Task::queue( 'core', 'RebuildPosts', array( 'class' => 'IPS\videos\Video\Comment' ), 3 );
		}
		catch( \OutOfRangeException $ex ) { }
        
        return TRUE;
    }
    
	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step7CustomTitle()
	{
		return "Building content";
	}
    
	/**
	 * Rebuild search index
	 */
	public function step8()
	{
		if( !\IPS\Settings::i()->search_engine )
		{
			\IPS\Settings::i()->search_engine	= 'mysql';
		}

		\IPS\Content\Search\Index::i()->rebuild();

		return TRUE;
	}

	/**
	 * Custom title for this step
	 *
	 * @return string
	 */
	public function step8CustomTitle()
	{
		return "Building Search index";
	}                            
}