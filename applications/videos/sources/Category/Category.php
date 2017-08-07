<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */
 
namespace IPS\videos;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Category Node
 */
class _Category extends \IPS\Node\Model implements \IPS\Node\Permissions
{
	protected static $multitons;    
    public static $databaseColumnId = 'id';
	public static $databaseTable = 'videos_cat';
	public static $databasePrefix = '';
	public static $databaseColumnOrder = 'position';
	public static $databaseColumnParent = 'parent_id';
	public static $nodeTitle = 'module__videos_categories';
			
	/**
	 * @brief	[Node] ACP Restrictions
	 * @code
	 	array(
	 		'app'		=> 'core',				// The application key which holds the restrictrions
	 		'module'	=> 'foo',				// The module key which holds the restrictions
	 		'map'		=> array(				// [Optional] The key for each restriction - can alternatively use "prefix"
	 			'add'			=> 'foo_add',
	 			'edit'			=> 'foo_edit',
	 			'permissions'	=> 'foo_perms',
	 			'delete'		=> 'foo_delete'
	 		),
	 		'all'		=> 'foo_manage',		// [Optional] The key to use for any restriction not provided in the map (only needed if not providing all 4)
	 		'prefix'	=> 'foo_',				// [Optional] Rather than specifying each  key in the map, you can specify a prefix, and it will automatically look for restrictions with the key "[prefix]_add/edit/permissions/delete"
	 * @encode
	 */
	protected static $restrictions = array(
		'app'		=> 'videos',
		'module'	=> 'categories',
		'prefix' => 'cat_'
	);
	
	/**
	 * @brief	[Node] App for permission index
	 */
	public static $permApp = 'videos';
	
	/**
	 * @brief	[Node] Type for permission index
	 */
	public static $permType = 'Cat';
	
	/**
	 * @brief	The map of permission columns
	 */
	public static $permissionMap = array(
		'view' 	  => 'view',
		'read'	  => 2,
		'add'	  => 3,
		'comment' => 4,  
		'auto'	  => 5              
	);  

	/**
	 * @brief	[Node] Title prefix.  If specified, will look for a language key with "{$key}_title" as the key
	 */
	public static $titleLangPrefix = 'videos_category_';   
    public static $descriptionLangSuffix = '_desc';
	
	/**
	 * @brief	[Node] Moderator Permission
	 */
	public static $modPerm = 'videos_categories';
	
	/**
	 * @brief	Content Item Class
	 */
	public static $contentItemClass = 'IPS\videos\Video';
	
	/**
	 * @brief	[Node] Prefix string that is automatically prepended to permission matrix language strings
	 */
	public static $permissionLangPrefix = 'perm_videocategory_';
    
	/**
	 * [Node] Get category desc
	 *
	 * @return	string
	 */
	protected function get_description()
	{
		if( \IPS\Member::loggedIn()->language()->checkKeyExists( "videos_category_{$this->id}_desc" ) )
		{
			$message = \IPS\Member::loggedIn()->language()->get( "videos_category_{$this->id}_desc" );
			if ( $message and $message != '<p></p>' )
			{
				return trim( $message );
			}		  
		}
		
		return NULL;
	}    
    
	/**
	 * [Node] Get category rules
	 *
	 * @return	string
	 */
	protected function get__rules()
	{
		if( \IPS\Member::loggedIn()->language()->checkKeyExists( "videos_category_{$this->id}_rules" ) )
		{
			$message = \IPS\Member::loggedIn()->language()->get( "videos_category_{$this->id}_rules" );
			if ( $message and $message != '<p></p>' )
			{
				return trim( $message );
			}		  
		}
		
		return NULL;
	} 
    
	/**
	 * [Node] Get category options
	 *
	 * @return	string
	 */
	protected function get__options()
	{
	    /* Decode category options */
		if( $this->options )
		{
			return json_decode( $this->options ); 		  
		}
		
		return NULL;
	}        
     	
	/**
	 * [Node] Add/Edit Form
	 *
	 * @param	\IPS\Helpers\Form	$form	The form
	 * @return	void
	 */
	public function form( &$form )
	{		
        /* Decode json fields */        
        $this->options = json_decode( $this->options );        

        /* Display form */       
        $form->addTab( 'vc_cat_general' );
		$form->addHeader( 'vc_cat_general' );
		$form->add( new \IPS\Helpers\Form\Translatable( 'vc_cat_name', NULL, TRUE, array( 'app' => 'videos', 'key' => ( $this->id ? "videos_category_{$this->id}" : NULL ) ) ) );
		$form->add( new \IPS\Helpers\Form\Text( 'vc_cat_group', ( isset( $this->options->cat_group ) AND $this->options->cat_group ) ? $this->options->cat_group : '', FALSE, array() ) );

		$form->add( new \IPS\Helpers\Form\Node( 'vc_parent_id', $this->parent_id ?: 0, FALSE, array(
			'class'		      => '\IPS\videos\Category',
			'disabled'	      => false,
			'zeroVal'         => 'vc_parent_id_zeroVal',
			'permissionCheck' => function( $node )
			{
				if ( ! isset( \IPS\Request::i()->id ) )
				{
					return true;
				}
				
				return $node->id != \IPS\Request::i()->id;
			}
		) ) );
        $form->add( new \IPS\Helpers\Form\Translatable( 'vc_description', NULL, FALSE, array(
			'app'		=> 'videos',
			'key'		=> ( $this->id ? "videos_category_{$this->id}_desc" : NULL ),
			'textArea'	=> TRUE
		), NULL, NULL, NULL, 'description' ) );
  		$form->add( new \IPS\Helpers\Form\Translatable( 'vc_cat_rules', NULL, FALSE, array(
			'app'		=> 'videos',
			'key'		=> ( $this->id ? "videos_category_{$this->id}_rules" : NULL ),
			'editor'	=> array(
				'app'			=> 'videos',
				'key'			=> 'Categories',
				'autoSaveKey'	=> ( $this->id ? "videos-category-{$this->id}-rules" : "videos-new-category-rules" ),
				'attachIds'		=> $this->id ? array( $this->id, NULL, 'cat_rules' ) : NULL, 'minimize' => 'vc_cat_rules_placeholder'
			)
		), NULL, NULL, NULL, 'cat_rules' ) ); 
		$form->add( new \IPS\Helpers\Form\Upload( 'vc_cat_image', $this->cat_image ? \IPS\File::get( 'videos_CategoryImage', $this->cat_image ) : NULL, FALSE, array( 'image' => array( 'maxWidth' => 250, 'maxHeight' => 250 ), 'allowedFileTypes' => ( \IPS\Settings::i()->vs_image_extensions ) ? explode( ",", \IPS\Settings::i()->vs_image_extensions ) : NULL, 'maxFileSize' => NULL, 'storageExtension' => 'videos_CategoryImage', 'multiple' => FALSE ), NULL, NULL, NULL, 'cat_image' ) );
         
        $form->addTab( 'vc_cat_settings' );
        $form->addHeader( 'vc_cat_settings' );
		$form->add( new \IPS\Helpers\Form\YesNo( 'vc_cat_only', $this->cat_only ? TRUE : FALSE, FALSE, array() ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'vc_view_videos', ( isset( $this->options->view_videos ) AND $this->options->view_videos ) ? $this->options->view_videos : FALSE, FALSE, array() ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'vc_cat_rss', ( isset( $this->options->cat_rss ) AND $this->options->cat_rss ) ? $this->options->cat_rss : TRUE, FALSE, array() ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vc_use_portal', ( isset( $this->options->use_portal ) AND $this->options->use_portal ) ? (bool) $this->options->use_portal : TRUE, FALSE, array() ) );     
        $form->add( new \IPS\Helpers\Form\Select( 'vc_display_type', ( isset( $this->options->display_type ) AND $this->options->display_type ) ? (int) $this->options->display_type : 0, FALSE, array( 'options' => array( 0 => 'vc_display_type_thumbnails', 1 => 'vc_display_type_list' ) ) ) );      
        $form->add( new \IPS\Helpers\Form\Node( 'vc_fid', ( isset( $this->id ) AND $this->id ) ? (int) $this->fid : 0, FALSE, array( 'zeroVal' => 'vc_fid_zeroVal', 'class' => 'IPS\forums\Forum', 'permissionCheck' => function ( $forum ) { return $forum->sub_can_post and !$forum->redirect_url; } ), NULL, NULL, NULL, 'fid' ) );
 
        $form->addHeader( 'vc_cat_sorting' );
        $form->add( new \IPS\Helpers\Form\Select( 'vc_sort_by', ( isset( $this->options->sort_by ) AND $this->options->sort_by ) ? $this->options->sort_by : 'date', FALSE, array( 'options' => array( 'date' => 'vc_sort_date', 'last_updated' => 'vc_sort_last_updated', 'title' => 'vc_sort_title', 'views' => 'vc_sort_views', 'video_rating' => 'vc_sort_video_rating' ) ) ) );     
        $form->add( new \IPS\Helpers\Form\Select( 'vc_sort_order', ( isset( $this->options->sort_order ) AND $this->options->sort_order ) ? $this->options->sort_order : 'date', FALSE, array( 'options' => array( 'desc' => 'vc_sort__desc', 'asc' => 'vc_sort__asc' ) ) ) );     
		$form->add( new \IPS\Helpers\Form\Number( 'vc_per_page', ( isset( $this->options->per_page ) AND $this->options->per_page ) ? (int) $this->options->per_page : 20, FALSE, array() ) );

		if ( \IPS\Settings::i()->tags_enabled )
		{
			$form->addHeader( 'vc_cat_tags' );
			$form->add( new \IPS\Helpers\Form\YesNo( 'vc_tags_enable', $this->tags_enable ? TRUE : FALSE, FALSE, array( 'togglesOn' => array( 'tags_prefixes', 'tags_predefined' ) ), NULL, NULL, NULL, 'tags_enable' ) );
			$form->add( new \IPS\Helpers\Form\YesNo( 'vc_tags_prefixes', $this->tags_prefixes ? TRUE : FALSE, FALSE, array(), NULL, NULL, NULL, 'tags_prefixes' ) );
			
			if ( !\IPS\Settings::i()->tags_open_system )
			{
				$form->add( new \IPS\Helpers\Form\Text( 'vc_tags_predefined', $this->tags_predefined, FALSE, array( 'autocomplete' => array( 'unique' => 'true' ), 'nullLang' => 'vc_tags_predefined_unlimited' ), NULL, NULL, NULL, 'tags_predefined' ) );
			}
		}
	}
    
	/**
	 * [Node] Format form values from add/edit form for save
	 *
	 * @param	array	$values	Values from the form
	 * @return	array
	 */
	public function formatFormValues( $values )
	{  
 		foreach( $values as $k => $v )
		{
			if( mb_substr( $k, 0, 3 ) === 'vc_' )
			{
				unset( $values[ $k ] );
				$values[ mb_substr( $k, 3 ) ] = $v;
			}
		}	   
       
        /* Check topic forum */
		if( isset( $values['fid'] ) )
		{
			$values['fid'] = $values['fid'] ? intval( $values['fid']->id ) : 0;
		}
        
        /* Check parent category */
		if( isset( $values['parent_id'] ) )
		{
			$values['parent_id'] = $values['parent_id'] ? intval( $values['parent_id']->id ) : 0;
		}          
        
        /* Save category image */
        $values['cat_image'] = ( $values['cat_image'] !== NULL ) ? (string) $values['cat_image'] : NULL; 
    
        /* Setup options settings */
		foreach ( array( 'cat_group', 'view_videos', 'cat_rss', 'use_portal', 'display_type', 'sort_by', 'sort_order', 'per_page' ) as $optionField )
        {       
            /* Skip non int fields */
            if( !in_array( $optionField, array( 'cat_group', 'sort_by', 'sort_order' ) ) )
            {
                $values['options'][ $optionField ] = intval( $values[ $optionField ] );    
            }
            else
            {
                $values['options'][ $optionField ] = $values[ $optionField ];    
            }

            unset( $values[ $optionField ] );
        }            
        
        /* Encode json fields */
        $values['options'] = json_encode( $values['options'] );  
        
		if ( !$this->id )
		{
			$this->save();
		} 
        
        /* Save custom lang */        
		foreach ( array( 'cat_name' => "videos_category_{$this->id}", 'description' => "videos_category_{$this->id}_desc", 'cat_rules' => "videos_category_{$this->id}_rules" ) as $fieldKey => $langKey )
		{
			if ( isset( $values[ $fieldKey ] ) )
			{
				\IPS\Lang::saveCustom( 'videos', $langKey, $values[ $fieldKey ] );
				
				if ( $fieldKey === 'cat_name' )
				{
					$this->seo_name = \IPS\Http\Url::seoTitle( $values[ $fieldKey ][ \IPS\Lang::defaultLanguage() ] );
				}
				
				unset( $values[ $fieldKey ] );
			}
		} 
 
		/* Send to parent */
		return $values;
	}
    
	/**
	 * [Node] Perform actions after saving the form
	 *
	 * @param	array	$values	Values from the form
	 * @return	void
	 */
	public function postSaveForm( $values )
	{
		\IPS\File::claimAttachments( 'videos-new-category-rules', $this->id, NULL, 'cat_rules', TRUE );
	}    

	/**
	 * @brief	Cached URL
	 */
	protected $_url	= NULL;
	
	/**
	 * @brief	URL Base
	 */
	public static $urlBase = 'app=videos&module=videos&controller=browse&id=';
	
	/**
	 * @brief	URL Base
	 */
	public static $urlTemplate = 'videos_category';
	
	/**
	 * @brief	SEO Title Column
	 */
	public static $seoTitleColumn = 'seo_name';

	/**
	 * Get latest video information
	 *
	 * @return	\IPS\videos\Video|NULL
	 */
	public function lastVideo()
	{
		if( !$this->last_video_id )
		{
			return NULL;
		}

		try
		{
			$latestVideo = \IPS\videos\Video::load( $this->last_video_id );
		}
		catch ( \OutOfRangeException $e )
		{
			$latestVideo = NULL;
		}

		foreach( $this->children() as $child )
		{
			$childLatest = $child->lastVideo();

			if( $childLatest !== NULL AND ( $latestVideo === NULL OR $childLatest->last_updated > $latestVideo->last_updated ) )
			{
				$latestVideo = $childLatest;
			}
		}

		return $latestVideo;
	}

	/**
	 * Delete Record
	 *
	 * @return	void
	 */
	public function delete()
	{
		\IPS\File::unclaimAttachments( 'videos_Categories', $this->id, NULL, 'cat_rules' );
		parent::delete();
        
        /* Delete custom lang */
		foreach ( array( 'cat_name' => "videos_category_{$this->id}", 'description' => "videos_category_{$this->id}_desc", 'cat_rules' => "videos_category_{$this->id}_rules" ) as $fieldKey => $langKey )
		{        
			\IPS\Lang::deleteCustom( 'videos', $langKey );
		}
	}  
    
	/**
	 * Get last comment time
	 *
	 * @note	This should return the last comment time for this node only, not for children nodes
	 * @return	\IPS\DateTime|NULL
	 */
	public function getLastCommentTime()
	{
		return $this->last_video_date ? \IPS\DateTime::ts( $this->last_video_date ) : NULL;
	}
	
	/**
	 * Set last video data
	 *
	 * @param	\IPS\videos\Video|NULL	$file	The latest video or NULL to work it out
	 * @return	void
	 */
	public function setLastVideo( \IPS\videos\Video $video=NULL )
	{
		if( $video === NULL )
		{
			try
			{
				$video	= \IPS\videos\Video::constructFromData( \IPS\Db::i()->select( '*', 'videos_videos', array( 'cid=? AND status=1', $this->id ), 'date DESC', 1 )->first() );
			}
			catch ( \UnderflowException $e )
			{
				$this->last_video_id	= 0;
				$this->last_video_date	= 0;
				return;
			}
		}
	
		$this->last_video_id	= $video->tid;
		$this->last_video_date	= $video->date;
	}
	
	/**
	 * Set last comment
	 *
	 * @param	\IPS\Content\Comment|NULL	$comment	The latest comment or NULL to work it out
	 * @return	int
	 */
	public function setLastComment( \IPS\Content\Comment $comment=NULL )
	{
		$this->setLastVideo();
	}    
}