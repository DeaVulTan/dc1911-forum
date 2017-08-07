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
 * Videos Model
 */
class _Video extends \IPS\Content\Item implements
\IPS\Content\Permissions,
\IPS\Content\Tags,
\IPS\Content\Reputation,
\IPS\Content\Followable,
\IPS\Content\ReportCenter,
\IPS\Content\Views,
\IPS\Content\ReadMarkers,
\IPS\Content\Hideable, \IPS\Content\Lockable, \IPS\Content\Featurable,
\IPS\Content\Shareable,
\IPS\Content\Ratings,
\IPS\Content\Searchable,
\IPS\Content\Embeddable
{
	/**
	 * @brief	Database Table
	 */
	public static $databaseTable = 'videos_videos';
	
	/**
	 * @brief	Application
	 */
	public static $application = 'videos';
    
	/**
	 * @brief	Module
	 */
	public static $module = 'videos';    
	
	/**
	 * @brief	Database Prefix
	 */
	public static $databasePrefix = '';
	
	/**
	 * @brief	Multiton Store
	 */
	protected static $multitons;
	
	/**
	 * @brief	Database ID Fields
	 */
	protected static $databaseIdFields = array( 'tid' );
	
	/**
	 * @brief	[ActiveRecord] ID Database Column
	 */
	public static $databaseColumnId = 'tid';
    
	/**
	 * @brief	Form Lang Prefix
	 */
	public static $formLangPrefix = 'video_';     
    		
	/**
	 * @brief	Database Column Map
	 */
	public static $databaseColumnMap = array(
			'title'			 => 'title',
			'date'			 => 'date',
            'updated'		 => 'last_updated',
			'author'		 => 'author_id',
			'views'			 => 'views',
			'content'		 => 'description',
            'container'      => 'cid',
            'num_comments'	 => 'num_comments',
            'featured'		 => 'featured',
            'approved'		 => 'status',
            'rating_average' => 'video_rating',
            'rating_hits'    => 'num_votes',
	);
	
	/**
	 * @brief	Title
	 */
	public static $title = 'videos';
    
	/**
	 * @brief	Node Class
	 */
	public static $containerNodeClass = 'IPS\videos\Category';  
    
	/**
	 * @brief	Comment Class
	 */
	public static $commentClass = 'IPS\videos\Video\Comment';   
    
	/**
	 * @brief	Reputation Type
	 */
	public static $reputationType = 'video_id'; 
    
	/**
	 * @brief	[Content]	Key for hide reasons
	 */
	public static $hideLogKey = 'videos-video';          
	
	/**
	 * @brief	Title
	 */
	public static $icon = 'video-camera';

	/**
	 * Set the title
	 *
	 * @param	string	$title	Title
	 * @return	void
	 */
	public function set_title( $title )
	{
		$this->_data['title'] = $title;
		$this->_data['seo_title'] = \IPS\Http\Url::seoTitle( $title );
	}

	/**
	 * Get SEO name
	 *
	 * @return	string
	 */
	public function get_seo_title()
	{
		if( !$this->_data['seo_title'] )
		{
			$this->seo_title	= \IPS\Http\Url::seoTitle( $this->title );
			$this->save();
		}

		return $this->_data['seo_title'] ?: \IPS\Http\Url::seoTitle( $this->title );
	}
    
	/**
	 * Should new items be moderated?
	 *
	 * @param	\IPS\Member		$member		The member posting
	 * @param	\IPS\Node\Model	$container	The container
	 * @return	bool
	 */
	public static function moderateNewItems( \IPS\Member $member, \IPS\Node\Model $container = NULL )
	{
        /* Moderate new videos? */
		if( $container and \IPS\Settings::i()->vs_add_approval and !$container->can( 'auto', $member ) )
		{
			return TRUE;
		}     

		return parent::moderateNewItems( $member, $container );
	}  
    
	/**
	 * Should new comments be moderated?
	 *
	 * @param	\IPS\Member	$member	The member posting
	 * @return	bool
	 */
	public function moderateNewComments( \IPS\Member $member )
	{
		$commentClass = static::$commentClass;
		return ( \IPS\Settings::i()->vs_comment_moderation and !$this->container()->can( 'auto', $member ) ) or parent::moderateNewComments( $member );
	}   
    
	/**
	 * Set comments per page
	 *
	 * @return int
	 */
	public static function getCommentsPerPage()
	{
		return \IPS\Settings::i()->vs_comments_per_page;
	}      
    
	/**
	 * Can view?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for or NULL for the currently logged in member
	 * @return	bool
	 */
	public function canView( $member=NULL )
	{
        $member = $member ?: \IPS\Member::loggedIn();
        
        /* Group can view? */
        if( !$member->group['g_vs_view'] )
        {
            return FALSE;
        }

		return parent::canView( $member );
	}  
       
	/**
	 * Can edit?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for (NULL for currently logged in member)
	 * @return	bool
	 */
	public function canEdit( $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();
        
        /* Can edit own videos? */
        if( ( $this->author()->member_id == $member->member_id ) && $member->group['g_vs_edit_video'] )
        {
            return TRUE;   
        }

        /* Can edit others videos? */
        if( ( $this->author()->member_id != $member->member_id ) && $member->group['g_vs_m_edit_videos'] )
        {
            return TRUE;   
        }
		
		return FALSE;
	}
    
	/**
	 * Can delete?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for (NULL for currently logged in member)
	 * @return	bool
	 */
	public function canDelete( $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();
        
        /* Can delete own videos? */
        if( ( $this->author()->member_id == $member->member_id ) && $member->group['g_vs_delete_video'] )
        {
            return TRUE;   
        }

        /* Can delete others videos? */
        if( ( $this->author()->member_id != $member->member_id ) && $member->group['g_vs_m_delete_videos'] )
        {
            return TRUE;   
        }
		
		return FALSE;
	}    
        
	/**
	 * Can comment?
	 *
	 * @param	\IPS\Member\NULL	$member	The member (NULL for currently logged in member)
	 * @return	bool
	 */ 
	public function canComment( $member=NULL )
	{
        $member = $member ?: \IPS\Member::loggedIn();
        
        /* Can add comments? */
        if( $member->group['g_vs_add_comments'] )
        {
            return TRUE;
        }
        
		return FALSE;
	} 
    
	/**
	 * Can Rate?
	 *
	 * @param	\IPS\Member|NULL		$member		The member to check for (NULL for currently logged in member)
	 * @return	bool
	 * @throws	\BadMethodCallException
	 */
	public function canRate( \IPS\Member $member = NULL )
	{
        $member = $member ?: \IPS\Member::loggedIn();

        /* Can rate and change? */
        if( $member->group['g_vs_rate_video'] AND $member->group['g_vs_rate_video_change'] )
        {
			return TRUE;           
        }        
        
	    /* Check if already has rating? */
        if( !$member->group['g_vs_rate_video_change'] )
        {
			try
			{
				$idColumn = static::$databaseColumnId;
				\IPS\Db::i()->select( '*', 'core_ratings', array( 'class=? AND item_id=? AND member=?', get_called_class(), $this->$idColumn, $member->member_id ) )->first();
				return FALSE;
			}
			catch ( \UnderflowException $e )
			{
				return TRUE;
			}
        }   

        /* Just for good measure */
		return FALSE;
	}    
    
	/**
	 * Can view hidden items?
	 *
	 * @param	\IPS\Member|NULL	    $member	        The member to check for (NULL for currently logged in member)
	 * @param   \IPS\Node\Model|null    $container      Container
	 * @return	bool
	 * @note	If called without passing $container, this method falls back to global "can view hidden content" moderator permission which isn't always what you want - pass $container if in doubt
	 */
	public static function canViewHiddenItems( $member=NULL, \IPS\Node\Model $container = NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();

        /* Can view others hidden videos? */
        if( $member->group['g_vs_m_manage'] )
        {
            return TRUE;   
        }
                
		return FALSE;
	} 
    
	/**
	 * Can feature?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for (NULL for currently logged in member)
	 * @return	bool
	 */
	public function canFeature( $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();

        /* Can view others hidden videos? */
        if( $member->group['g_vs_m_manage'] )
        {
            return TRUE;   
        }
                
		return FALSE;
	}
	
	/**
	 * Can unfeature?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for (NULL for currently logged in member)
	 * @return	bool
	 */
	public function canUnfeature( $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();

        /* Can view others hidden videos? */
        if( $member->group['g_vs_m_manage'] )
        {
            return TRUE;   
        }
                
		return FALSE;
	}           

	/**
	 * Get elements for add/edit form
	 *
	 * @param	\IPS\Content\Item|NULL	$item		The current item if editing or NULL if creating
	 * @param	int						$container	Container (e.g. forum) ID, if appropriate
	 * @return	array
	 */
	public static function formElements( $item=NULL, \IPS\Node\Model $container=NULL )
	{
	    $return = parent::formElements( $item, $container );
        
        /* Give members the option to change category */
		$return['container']	= new \IPS\Helpers\Form\Node( static::$formLangPrefix . 'container', $container ? $container->id : ( isset( \IPS\Request::i()->id ) ? \IPS\Request::i()->id : NULL ), TRUE, array(
			'url'					=> \IPS\Http\Url::internal( 'app=videos&module=videos&controller=submit', 'front', 'videos_add' ),
			'class'					=> 'IPS\videos\Category',
			'permissionCheck'		=> 'add',
		) );            
        
        /* Setup default video type */
        $videoType['media_url'] = 'videotype__media_url';
        
        /* Check has embed perms */
        if( \IPS\Member::loggedIn()->group['g_vs_embed_video'] )
        {
            $videoType['media_embed'] = 'videotype__media_embed';            
        }
        
        /* Can upload video? */
        if( \IPS\Settings::i()->vs_video_upload )
        {
            $videoType['media_upload'] = 'videotype__media_upload';             
        }
        
        /* Can add video url? */                
        if( \IPS\Settings::i()->vs_submit_video_url )
        {       
            $videoType['media_upload_url'] = 'videotype__media_upload_url';
        }
        
        /* Only show options if needed. */
        if( count( $videoType ) > 1 )
        {
            $return['video_type'] = new \IPS\Helpers\Form\Select( 'video_type', $item ? $item->video_type : \IPS\Settings::i()->vs_default_video_type, FALSE, array( 'options' => $videoType, 'toggles' => array( 'media_url' => array( 'media_url', 'extra_videos' ), 'media_embed' => array( 'media_embed' ), 'media_upload' => array( 'media_upload' ), 'media_upload_url' => array( 'media_upload_url' ) )  ), NULL, NULL, NULL, 'video_type' );           
        }

        /* Setup video type fields */
		$return['media_url'] = new \IPS\Helpers\Form\Url( 'media_url', ( $item AND $item->video_type == 'media_url' AND $item->video_data ) ? $item->video_data : \IPS\Request::i()->media, FALSE, array( 'placeholder' => 'https://www.youtube.com/watch?v=Oh4i5ECWblo' ), function( $val ) use ( $item )
		{
		    /* Check for duplicate media urls? */
            if( \IPS\Settings::i()->vs_duplicate_media_url AND !$item )
            {
                /* Default match check */
                $duplicateWhere = array( 'video_data=?', (string) $val );
                
                /* Check url against YouTube regex */
                preg_match( "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $val, $matches );
                
                /* Perform id check for YouTube videos */
                if( isset( $matches[1] ) AND $matches[1] )
                {                  
                    $duplicateWhere = array( "video_data LIKE '%".$matches[1]."%'" );
                }   

                /* Throw error if any matches found */
                $existingCount = \IPS\Db::i()->select( 'video_data', 'videos_videos', $duplicateWhere )->count();

                if( $existingCount )
                {
                    throw new \DomainException( 'duplicate_media_url' );    
                }
            }
		}, NULL, NULL, 'media_url' );    
    
        /* Add media embed field */    
        if( \IPS\Member::loggedIn()->group['g_vs_embed_video'] )
        {  
            $return['media_embed'] = new \IPS\Helpers\Form\TextArea( 'media_embed', ( $item AND $item->video_type == 'media_embed' AND $item->video_data ) ? $item->video_data : ( $item ) ? $item->embed : NULL, TRUE, array(), NULL, NULL, NULL, 'media_embed' );
        }

        /* Add media upload field */
        if( \IPS\Settings::i()->vs_video_upload )
        {        
            $return['media_upload'] = new \IPS\Helpers\Form\Upload( 'media_upload', ( $item AND $item->video_type == 'media_upload' AND $item->video_data ) ? \IPS\File::get( 'videos_Videos', $item->video_data ) : NULL, TRUE, array( 'allowedFileTypes' => ( \IPS\Settings::i()->vs_video_upload_extensions ) ? explode( ",", \IPS\Settings::i()->vs_video_upload_extensions ) : NULL, 'maxFileSize' => ( \IPS\Settings::i()->vs_video_upload_size ) ? \IPS\Settings::i()->vs_video_upload_size / 1024 : NULL, 'storageExtension' => 'videos_Videos' ), NULL, NULL, NULL, 'media_upload' );
        }

        /* Add media upload url field */
        if( \IPS\Settings::i()->vs_submit_video_url )
        {        
    		$return['media_upload_url'] = new \IPS\Helpers\Form\Url( 'media_upload_url', ( $item AND $item->video_type == 'media_upload_url' AND $item->video_data ) ? $item->video_data : NULL, TRUE, array(), NULL, NULL, NULL, 'media_upload_url' );
        }

        /* Add extra videos field */
        if( \IPS\Settings::i()->vs_extra_videos )
        {
            $return['extra_videos_enable'] = new \IPS\Helpers\Form\YesNo( 'extra_videos_enable', ( $item AND $item->extra_videos ) ? TRUE : FALSE, FALSE, array( 'togglesOn' => array( 'extra_videos' ) ), NULL, NULL, NULL, 'extra_videos_enable' );  
            $return['extra_videos']	= new \IPS\Helpers\Form\Stack( 'extra_videos', $item ? json_decode( $item->extra_videos, TRUE ) : array( 0 => array( 'key' => \IPS\Member::loggedIn()->language()->addToStack( 'extra_videos__key' ), 'value' => \IPS\Member::loggedIn()->language()->addToStack( 'extra_videos__value' ) ) ), FALSE, array( 'stackFieldType' => 'KeyValue' ), NULL, NULL, NULL, 'extra_videos' );
        }

        /* Setup default thumbnail type */
        $thumbType[0] = 'thumbtype__0';
        
        /* Check can upload thumbnails */
        if( \IPS\Settings::i()->vs_thumbnail_upload )
        {
            $thumbType[1] = 'thumbtype__1';            
        }
        
        /* Check can enter thumbnail url */
        if( \IPS\Settings::i()->vs_enable_thumbnail_url )
        {
            $thumbType[2] = 'thumbtype__2';            
        }

        /* Only show options if needed. */
        if( count( $thumbType ) > 1 )
        {
            $return['thumbnail_type'] = new \IPS\Helpers\Form\Select( 'thumbnail_type', $item ? $item->thumbnail_type : (int) \IPS\Settings::i()->vs_default_thumbnail_type, FALSE, array( 'options' => $thumbType, 'toggles' => array( 1 => array( 'thumbnail_upload' ), 2 => array( 'thumbnail_upload_url' ) )  ), NULL, NULL, NULL, 'thumbnail_type' );           
        }

        /* Add thumbnail upload field */
        if( \IPS\Settings::i()->vs_thumbnail_upload )
        {        
            $maxImageDims = explode( ',', \IPS\Settings::i()->vs_image_maximum_dimensions );
            $return['thumbnail_upload'] = new \IPS\Helpers\Form\Upload( 'thumbnail_upload', ( $item AND $item->thumbnail_type == 1 AND $item->thumbnail ) ? \IPS\File::get( 'videos_Thumbs', $item->thumbnail ) : NULL, TRUE, array( 'image' => array( 'maxWidth' => $maxImageDims[0], 'maxHeight' => $maxImageDims[1] ), 'allowedFileTypes' => ( \IPS\Settings::i()->vs_image_extensions ) ? explode( ",", \IPS\Settings::i()->vs_image_extensions ) : NULL, 'maxFileSize' => NULL, 'storageExtension' => 'videos_Thumbs' ), NULL, NULL, NULL, 'thumbnail_upload' );
        }

        /* Add thumbnail upload url field */
        if( \IPS\Settings::i()->vs_enable_thumbnail_url )
        {        
    		$return['thumbnail_upload_url'] = new \IPS\Helpers\Form\Url( 'thumbnail_upload_url', ( $item AND $item->thumbnail_type == 2 ) ? $item->thumbnail : NULL, FALSE, array(), NULL, NULL, NULL, 'thumbnail_upload_url' );
        }

		/* Video description */
		$return['description'] = new \IPS\Helpers\Form\Editor( 'video_description', $item ? $item->description : NULL, FALSE, array( 'app' => 'videos', 'key' => 'Videos', 'autoSaveKey' => 'videos-video', 'attachIds' => ( $item === NULL ? NULL : array( $item->tid ) ) ) );

		return $return;
	}
    
	/**
	 * Process create/edit form
	 *
	 * @param	array				$values	Values from form
	 * @return	void
	 */
	public function processForm( $values )
	{
	    /* Our thumbnail dimensions */
        $maxThumbDims      = explode( ',', \IPS\Settings::i()->vs_image_maximum_dimensions );
        $standardThumbDims = explode( ',', \IPS\Settings::i()->vs_standard_thumbnail );
        
        /* Core fields */
        $this->title          = $values['video_title'];    
        $this->description    = ( isset( $values['video_description'] ) AND $values['video_description'] ) ? $values['video_description'] : NULL; 
        $this->video_type     = ( isset( $values['video_type'] ) AND $values['video_type'] ) ? (string) $values['video_type'] : NULL;
        $this->thumbnail_type = ( isset( $values['thumbnail_type'] ) ) ? (int) $values['thumbnail_type'] : 0;        
        $this->cid	          = ( isset( $values['video_container'] ) AND $values[ 'video_container' ] instanceof \IPS\Node\Model ) ? $values[ 'video_container' ]->_id : 0;

        /* New videos only */
		if( $this->_new )
		{
			$this->date = time();
		}
        
        /* Save media url */
        if( $this->video_type == 'media_url' OR !$this->video_type )
        {
            $this->video_data = ( $values[ 'media_url' ] instanceof \IPS\Http\Url ) ? (string) $values[ 'media_url' ] : ''; 
            
            /* Generate embed code */
			try
			{
			    /* Override video width dimensions */
                if( \IPS\Settings::i()->vs_max_video_width )
                {
                    \IPS\Settings::i()->max_video_width = \IPS\Settings::i()->vs_max_video_width;
                }
                else
                {
                    \IPS\Settings::i()->max_video_width = 0;    
                }
             
				$this->embed = \IPS\Text\Parser::embeddableMedia( $this->video_data, TRUE );
			}
			catch( \Exception $e ){} 
            
            /* Save problem generationg embed code */
            if( !$this->embed )
            {
                $this->embed = 'Problem generating embed code.';
            }                         
        }        
        /* Save media embed */
        else if( $this->video_type == 'media_embed' AND \IPS\Member::loggedIn()->group['g_vs_embed_video'] )
        {            
            $this->video_data = '';
            $this->embed      = ( isset( $values[ 'media_embed' ] ) AND $values[ 'media_embed' ] ) ? $values[ 'media_embed' ] : '';    
        }
        /* Save media upload */
        else if( $this->video_type == 'media_upload' AND \IPS\Settings::i()->vs_video_upload )
        {
            $this->video_data = ( $values['media_upload'] !== NULL ) ? (string) $values['media_upload'] : NULL;
        }
        /* Save media upload url */
        else if( $this->video_type == 'media_upload_url' AND \IPS\Settings::i()->vs_submit_video_url )
        {
            $this->video_data = ( isset( $values[ 'media_upload_url' ] ) AND $values[ 'media_upload_url' ] ) ? $values[ 'media_upload_url' ] : ''; 
        }
        /* Problem? */
        else
        {
            $this->embed = 'Problem generating embed code.';    
        }
        
        /* Delete existing thumbnail if auto mode */    	
		try
		{
			if( $this->thumbnail AND !$this->thumbnail_type )
			{
				\IPS\File::get( 'videos_Thumbs', $this->thumbnail )->delete();
			}
		}
		catch ( \Exception $e ) { }
        
        /* Automatic thumbnail */
        if( !$this->thumbnail_type )
        {
            /* Only works with media urls */
            if( $this->video_data AND ( $this->video_type == 'media_url' OR !$this->video_type ) )
            {
                /* Grab thumbnail url */
    			try
    			{
    			    /* Get thumbnail */
    				$this->thumbnail = \IPS\videos\Video\Thumbnail::getThumb( $this->video_data );
                    
                    /* Have thumbnail? */
                    if( $this->thumbnail )
                    {
                        /* Create image from url */
                        $image = \IPS\Image::create( (string) \IPS\Http\Url::external( $this->thumbnail )->request()->get() );
                        $image->resizeToMax( $maxThumbDims[0], $maxThumbDims[1] );
        
                        /* Download image */
                        $download = \IPS\File::create( 'videos_Thumbs', "videothumb_".time().".png", (string) $image );
        
                        /* Create thumbnail */
        				$this->thumbnail = $download->thumbnail( 'videos_Thumbs', $maxThumbDims[0], $maxThumbDims[1] );
                        
                        /* Delete original image */
                        $download->delete();                            
                    }
    			}
    			catch( \Exception $e ){}             
            }                         
        }        
        /* Save thumbnail upload */
        else if( $this->thumbnail_type == 1 AND \IPS\Settings::i()->vs_thumbnail_upload )
        {            
            $this->thumbnail = ( $values['thumbnail_upload'] ) ? (string) $values['thumbnail_upload'] : NULL;    
        }
        /* Save thumbnail upload url */
        else if( $this->thumbnail_type == 2 AND \IPS\Settings::i()->vs_enable_thumbnail_url )
        {
            $this->thumbnail = ( isset( $values[ 'thumbnail_upload_url' ] ) AND $values[ 'thumbnail_upload_url' ] ) ? $values[ 'thumbnail_upload_url' ] : NULL; 
        }     
        
        //print $this->thumbnail;
        
        //exit();
        
        /* Save extra videos */
        $this->extra_videos = NULL; 

        if( isset( $values['extra_videos'] ) AND $values['extra_videos'] AND $values['extra_videos_enable'] )
        {
            /* Check for false positives */
            if( $values['extra_videos'][0]['key'] )
            {
                $this->extra_videos = json_encode( $values['extra_videos'] );                
            }
        }

		/* Get the normal stuff */
		parent::processForm( $values );
	}  
    
	/**
	 * Process created object AFTER the object has been created
	 *
	 * @param	\IPS\Content\Comment|NULL	$comment	The first comment
	 * @param	array						$values		Values from form
	 * @return	void
	 */
	protected function processAfterCreate( $comment, $values )
	{
        parent::processAfterCreate( $comment, $values ); 
        
        /* Sync topic */
		if( \IPS\Application::appIsEnabled('forums') )
		{
			$this->syncTopic();
		}        
        
		/* Update Category */
		$this->container()->setLastVideo();
		$this->container()->save();        
        
		/* And claim attachments */
		\IPS\File::claimAttachments( 'videos-video', $this->tid, NULL, 'description' );         
	}  
    
	/**
	 * Process after the object has been edited on the front-end
	 *
	 * @param	array	$values		Values from form
	 * @return	void
	 */
	public function processAfterEdit( $values )
	{
        /* Sync topic */
		if( \IPS\Application::appIsEnabled('forums') )
		{
			$this->syncTopic();
		}
        
		/* Update Category */
		$this->container()->setLastVideo();
		$this->container()->save();         

		parent::processAfterEdit( $values );
	}   
    
	/**
	 * Rebuild video embed
	 */
	public function rebuildVideo()
	{
        /* Save media url */
        if( $this->video_type == 'media_url' OR !$this->video_type )
        {            
            /* Generate embed code */
			try
			{
			   	/* Override video width dimensions */
                if( \IPS\Settings::i()->vs_max_video_width )
                {
                    \IPS\Settings::i()->max_video_width = \IPS\Settings::i()->vs_max_video_width;
                }
                else
                {
                    \IPS\Settings::i()->max_video_width = 0;    
                }
             
             
				$this->embed = \IPS\Text\Parser::embeddableMedia( $this->video_data, TRUE );
                
                /* Only save if we have something */
                if( $this->embed )
                {
                    $this->save();
                }                
			}
			catch( \Exception $e ){}                         
        }	   
	}        
    
 	/**
	 * @brief	Cached URL
	 */
	protected $_url	= NULL;
	
	/**
	 * @brief	URL Base
	 */
	public static $urlBase = 'app=videos&module=videos&controller=view&id=';
	
	/**
	 * @brief	URL Base
	 */
	public static $urlTemplate = 'videos_view';
	
	/**
	 * @brief	SEO Title Column
	 */
	public static $seoTitleColumn = 'seo_title';    
	
	/**
	 * Comment Multimod Actions
	 *
	 * @param	\IPS\Member|NULL	$member The member to check for (NULL for currently logged in member)
	 * @return	array
	 */
	public function commentMultimodActions( \IPS\Member $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();	   
       
        /* Group can moderate comment? */
        if( !$member->group['g_vs_m_manage'] )
		{
			return array();
		}
		
		return parent::commentMultimodActions( $member );
	}    
    
	/**
	 * Unclaim attachments
	 *
	 * @return	void
	 */
	protected function unclaimAttachments()
	{
		\IPS\File::unclaimAttachments( 'videos_Videos', $this->tid, NULL, 'description' );
	}
    
	/**
	 * Delete Record
	 *
	 * @return	void
	 */
	public function delete()
	{
	    /* Delete discussion topic */
		if ( $topic = $this->topic() )
		{
			$topic->delete();
		}
		
        /* Parent delete */
		parent::delete();

        /* Delete thumbnail */    	
		try
		{
			if( $this->thumbnail )
			{
				\IPS\File::get( 'videos_Thumbs', $this->thumbnail )->delete();
			}
		}
		catch ( \Exception $e ) { }

        /* Delete video */    	
		try
		{
			if( $this->video_data AND $this->video_type == 'media_upload' )
			{
				\IPS\File::get( 'videos_Videos', $this->video_data )->delete();
			}
		}
		catch ( \Exception $e ) { }
        
		/* Update Category */
		$this->container()->setLastVideo();
		$this->container()->save();        
	} 
    
	/* !Tags */
	
	/**
	 * Can tag?
	 *
	 * @param	\IPS\Member|NULL		$member		The member to check for (NULL for currently logged in member)
	 * @param	\IPS\Node\Model|NULL	$container	The container to check if tags can be used in, if applicable
	 * @return	bool
	 */
	public static function canTag( \IPS\Member $member = NULL, \IPS\Node\Model $container = NULL )
	{
		return parent::canTag( $member, $container ) and ( $container === NULL or $container->tags_enable );
	}
	
	/**
	 * Can use prefixes?
	 *
	 * @param	\IPS\Member|NULL		$member		The member to check for (NULL for currently logged in member)
	 * @param	\IPS\Node\Model|NULL	$container	The container to check if tags can be used in, if applicable
	 * @return	bool
	 */
	public static function canPrefix( \IPS\Member $member = NULL, \IPS\Node\Model $container = NULL )
	{
		return parent::canPrefix( $member, $container ) and ( $container === NULL or $container->tags_prefixes );
	}
	
	/**
	 * Defined Tags
	 *
	 * @param	\IPS\Node\Model|NULL	$container	The container to check if tags can be used in, if applicable
	 * @return	array
	 */
	public static function definedTags( \IPS\Node\Model $container = NULL )
	{
		if ( $container and $container->tags_predefined )
		{
			return explode( ',', $container->tags_predefined );
		}
		
		return parent::definedTags( $container );
	}       

	/**
	 * Check Moderator Permission
	 *
	 * @param	string						$type		'edit', 'hide', 'unhide', 'delete', etc.
	 * @param	\IPS\Member|NULL			$member		The member to check for or NULL for the currently logged in member
	 * @param	\IPS\Node\Model|NULL		$container	The container
	 * @return	bool
	 */
	public static function modPermission( $type, \IPS\Member $member = NULL, \IPS\Node\Model $container = NULL )
	{
	    /* Hide lock for item */
		if( in_array( $type, array( 'lock', 'unlock' ) ) )
		{
			return FALSE;
		}

		return parent::modPermission( $type, $member, $container );
	}

	/**
	 * Return the filters that are available for selecting table rows
	 *
	 * @return	array
	 */
	public static function getTableFilters()
	{
		return array(
			'read', 'unread', 'hidden', 'featured'
		);
	} 
    
 	/**
	 * Move
	 *
	 * @param	\IPS\Node\Model	$container	Container to move to
	 * @param	bool			$keepLink	If TRUE, will keep a link in the source
	 * @return	void
	 */
	public function move( \IPS\Node\Model $container, $keepLink=FALSE )
	{
	    /* Old category */
		$oldCategory = $this->container();

		parent::move( $container, $keepLink );
        
		if ( \IPS\Application::appIsEnabled('forums') and $topic = $this->topic() )
		{
			/* Create topic if needed */
			if ( !$oldCategory->fid and $this->container()->fid )
			{
				$this->syncTopic();
			}
			
			/* Move topic if needed */
			elseif ( $oldCategory->fid and $this->container()->fid and $oldCategory->fid != $this->container()->fid and $topic->forum_id == $oldCategory->fid )
			{
				try
				{
					$topic->move( \IPS\forums\Forum::load( $this->container()->fid ), $keepLink );
				}
				catch ( \Exception $e ) { }
			}
		}
	}   
    
	/**
	 * Syncing to run when hiding
	 *
	 * @return	void
	 */
	public function onHide( $member )
	{
		parent::onHide( $member );
        
        /* Hide topic */
		if ( \IPS\Application::appIsEnabled('forums') and $topic = $this->topic() )
		{
			$topic->hide();
		}
	}
	
	/**
	 * Syncing to run when unhiding
	 *
	 * @param	bool	$approving	If true, is being approved for the first time
	 * @return	void
	 */
	public function onUnhide( $approving, $member )
	{
		parent::onUnhide( $approving, $member );
        
        /* Unhide topic */
		if ( \IPS\Application::appIsEnabled('forums') )
		{
			if ( $topic = $this->topic() )
			{
				$topic->unhide();
			}
			elseif ( $approving and $this->container()->fid )
			{
				$this->syncTopic();
			}
		}
	}    
    
	/**
	 * Get Video Topic
	 * @return	\IPS\forums\Topic|NULL
	 */
	public function topic()
	{
		if ( \IPS\Application::appIsEnabled('forums') and $this->topic_id )
		{
			try
			{
				return \IPS\forums\Topic::load( $this->topic_id );
			}
			catch ( \OutOfRangeException $e )
			{
				return NULL;
			}
		}
		
		return NULL;
	}    
    
	/**
	 * Setup Extra Videos
	 */
	public function extraVideos()
	{
	    /* Return if present */
		if( $this->extra_videos )
		{
			return json_decode( $this->extra_videos, TRUE ); 
		}
		
		return array();
	} 
    
	/**
	 * Get Extra Video
	 */
	public function getExtraVideo()
	{
	    /* No extra videos at all! */
	    if( !$this->extra_videos )
        {
            return FALSE;
        }
        
        /* Get videos extra videos */
        $extraVideos = self::extraVideos();

	    /* Return if match found */
		if( isset( \IPS\Request::i()->extra ) && isset( $extraVideos[ \IPS\Request::i()->extra ]['value'] ) AND $extraVideos[ \IPS\Request::i()->extra ]['value'] )
		{
		    /* Attempt to generate embed */
			try
			{
			    /* Override video width dimensions */
                if( \IPS\Settings::i()->vs_max_video_width )
                {
                    \IPS\Settings::i()->max_video_width = \IPS\Settings::i()->vs_max_video_width;
                }
                else
                {
                    \IPS\Settings::i()->max_video_width = 0;    
                }			 
             
				return \IPS\Text\Parser::embeddableMedia( $extraVideos[ \IPS\Request::i()->extra ]['value'], TRUE );
			}
			catch( \Exception $e )
            {
                return FALSE;    
            } 		  
		}
	}       
    
 	/**
	 * Sync Topic
	 *
	 * @return	void
	 */
	protected function syncTopic()
	{
        /* Forums enabled? */
		if ( ! \IPS\Application::appIsEnabled( 'forums' ) )
		{
			return;
		}
        
        /* Discussion topics enabled? */
        if( !\IPS\Settings::i()->vs_create_topic )
        {
            return;   
        }
        
        /* Get category options and decide forum */ 
        $forumID = ( \IPS\Settings::i()->vs_topic_forum ) ? (int) \IPS\Settings::i()->vs_topic_forum : (int) $this->container()->fid;
     
		/* Check the forum */
		try
		{
			$forum = \IPS\forums\Forum::load( $forumID );
		}
		catch( \OutOfRangeException $ex )
		{
            return; 
		} 
                
		/* Check the author */
        $authorID = ( \IPS\Settings::i()->vs_topic_own ) ? (int) $this->author_id : (int) \IPS\Settings::i()->vs_topic_author;
        
		try
		{
			$author = \IPS\Member::load( $authorID );
		}
		catch( \OutOfRangeException $ex )
		{
            return; 
		}               
        
		/* Format post content */
        $topicTitle  = \IPS\Member::loggedIn()->language()->addToStack( 'vs_topic_title_value' );
        $postContent = \IPS\Member::loggedIn()->language()->addToStack( 'vs_topic_template_value' );
        \IPS\Member::loggedIn()->language()->parseOutputForDisplay( $topicTitle );
        \IPS\Member::loggedIn()->language()->parseOutputForDisplay( $postContent );
        
        /* Swap out our tags */
		$tags = self::_returnTagValues( $this, $author );
        
		foreach( $tags as $key => $value )
		{
		    \IPS\Member::loggedIn()->language()->parseOutputForDisplay( $value );
          
            $topicTitle  = str_replace( $key, $value, $topicTitle );		  
			$postContent = str_replace( $key, $value, $postContent );
		} 

		/* Existing topic */
		if ( $this->topic_id )
		{          
			/* Get */
			try
			{
				$topic = \IPS\forums\Topic::load( $this->topic_id );
				if ( !$topic )
				{
					return;
				}
                
				$topic->title = $topicTitle;
				if ( \IPS\Settings::i()->tags_enabled )
				{
					$topic->setTags( $this->prefix() ? array_merge( $this->tags(), array( 'prefix' => $this->prefix() ) ) : $this->tags() );
				}
				$topic->save();
				$firstPost = $topic->comments( 1 );
				$firstPost->post = $postContent;
				$firstPost->save();
			}
			catch ( \OutOfRangeException $e )
			{
				return;
			}
		}
		/* New topic */
		else
		{
			/* Create topic */
			$topic = \IPS\forums\Topic::createItem( $author, $author->ip_address, \IPS\DateTime::ts( $this->date ), $forum, $this->hidden() );
			$topic->title = $topicTitle;
			$topic->topic_archive_status = \IPS\forums\Topic::ARCHIVE_EXCLUDE;
			$topic->save();

			if ( \IPS\Settings::i()->tags_enabled )
			{
				$topic->setTags( $this->prefix() ? array_merge( $this->tags(), array( 'prefix' => $this->prefix() ) ) : $this->tags() );
			}
			
			/* Add post */
			$post = \IPS\forums\Topic\Post::create( $topic, $postContent, TRUE );
			$topic->topic_firstpost = $post->pid;
			$topic->save();
			
			/* Update event */
			$this->topic_id = $topic->tid;
			$this->save();
		}
	} 
    
	/**
	 * Return tag values
	 *
	 * @param	$event	Event object
	 * @return	array
	 */
	protected function _returnTagValues()
	{              
	    /* Default tags */
		$tags['%TITLE%']	     = $this->title;
		$tags['%CATEGORY%']	     = $this->container()->_title;
		$tags['%CATEGORY_LINK%'] = "<a href=".$this->container()->url().">".$this->container()->_title."</a>";
		$tags['%SHORT_DESC%']	 = $this->short_desc;
		$tags['%FULL_DESC%']     = $this->description;
        $tags['%DATE_ADDED%']	 = \IPS\DateTime::create( $this->date )->format( 'Y-m-d' );
        $tags['%DATE_UPDATED%']	 = $this->last_updated ? \IPS\DateTime::create( $this->last_updated )->format( 'Y-m-d' ) : '';
        $tags['%SUBMITTER%']	 = $this->author()->name;
        $tags['%PROFILE_LINK%']	 = "<a href=".$this->author()->url().">".$this->author()->name."</a>";
        $tags['%EMBED%']	     = $this->embed;
        $tags['%VIDEO_LINK%']	 = "<a href=".$this->url().">{$this->title}</a>";
        $tags['%THUMBNAIL%']	 = $this->thumbnail ? "<img src=".\IPS\File::get( 'videos_Thumbs', $this->thumbnail )->url." class=\"ipsImage\">" : "";
                                
		return $tags;
	}         
}