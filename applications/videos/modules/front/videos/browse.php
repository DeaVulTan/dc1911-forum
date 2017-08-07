<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\modules\front\videos;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * browse
 */
class _browse extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		parent::execute();
        
        /* We need at least 1 category */
        if( !count( \IPS\videos\Category::roots() ) )
        {      
            \IPS\Output::i()->error( 'no_video_categories_found', '', 404, '' );
        }
        
		/* Latest videos RSS feed link */
		if( \IPS\Settings::i()->vs_enable_rss  )
		{
			\IPS\Output::i()->rssFeeds[ 'latest_videos_main' ] = \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&do=rss', 'front', 'videos_rss' );
		}  

		/* You must purchase copyright removal before removing */
        if( !\IPS\Settings::i()->devfuse_copy_num && !\IPS\Request::i()->isAjax() )
        {
            \IPS\Output::i()->output .= "<div style='clear:both;text-align:center;position:absolute;bottom:15px;width:95%;'><a href='http://defcon.uz/' class='ipsType_light ipsType_smaller'>Видео система Defcon Uzbekistan</a></div>";    
        }          
	}

	/**
	 * View Category
	 *
	 * @return	void
	 */
	protected function manage()
	{
	    /* Get category */
		try
		{
            $category = \IPS\videos\Category::loadAndCheckPerms( \IPS\Request::i()->id, 'view' );
            
            /* Decode options */        
            $category->options = json_decode( $category->options );            
		}
		catch ( \OutOfRangeException $e )
		{
			\IPS\Output::i()->error( 'node_error', '', 404, '' );
		}

        /* Set list type cookie */
        if( \IPS\Request::i()->listType && in_array( \IPS\Request::i()->listType, array( 'list', 'thumb' ) ) )
        {
            \IPS\Request::i()->cookie['listType'] = \IPS\Request::i()->listType;
            \IPS\Request::i()->setCookie( 'listType', \IPS\Request::i()->listType, NULL, FALSE );          
        }  
        
        /* Default category to list */
        if( ( isset( $category->options->display_type ) AND $category->options->display_type ) AND !\IPS\Request::i()->listType )
        {
            \IPS\Request::i()->cookie['listType'] = 'list';    
        }
        
        /* Pull videos from viewing category */
        $catIDS[ $category->id ] = $category->id;
        
        /* Add any children cats */
        if( count( $category->children() ) )
        {
            foreach( $category->children() as $child )
            {
                $catIDS[ $child->id ] = $child->id;    
            }     
        }    
                          
        /* Get category videos */        
		$table = new \IPS\Helpers\Table\Content( '\IPS\videos\Video', \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&id='.$category->_id, 'front', 'videos_category', $category->seo_name ), array( array( 'cid IN ('.implode( ',', $catIDS ).')' ) ), NULL, NULL, 'read' );        
        $table->tableTemplate = array( \IPS\Theme::i()->getTemplate( 'browse' ), 'videoTable' );        
		$table->include = array( 'title' );
		$table->mainColumn = 'title';	
        $table->limit = ( isset( $category->options->per_page ) AND $category->options->per_page ) ? (int) $category->options->per_page : 10; 

        /* List or thumbnail layout */
        if( !isset( \IPS\Request::i()->cookie['listType'] ) OR \IPS\Request::i()->cookie['listType'] == 'thumb'  )
        {
            $table->classes[] = 'ipsGrid ipsPad';
            $table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'browse' ), 'videoThumbRow' );    
        }
        else
        {
            $table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'browse' ), 'videoRow' );    
        }                
        
		/* Set default sort */
		if( !\IPS\Request::i()->sortby )
		{
			$table->sortBy = 'date';
		}      

        /* Sorting table */
        $table->langPrefix = "video_";
        $table->sortOptions['rating'] = 'video_rating';        
    	$table->sortBy = $table->sortBy ?: 'date';
		$table->sortDirection = $table->sortDirection ?: 'desc';
        
        /* Setup our filters */
		$table->filters	= array(
			'filter_myvideos' => array('author_id=?', \IPS\Member::loggedIn()->member_id ),
		 );   
         
		/* Category RSS */
		if( \IPS\Settings::i()->vs_enable_rss AND ( isset( $category->options->cat_rss ) AND $category->options->cat_rss ) )
		{
			/* Show the category link */
			$rssUrl   = \IPS\Http\Url::internal( "app=videos&module=videos&controller=browse&id={$category->_id}&rss=1", 'front', '', array( $category->seo_name ) );
			$rssTitle = \IPS\Member::loggedIn()->language()->addToStack( 'latest_videos_category', FALSE, array( 'sprintf' => array( $category->_title ) ) );
			\IPS\Output::i()->rssFeeds[ $rssTitle ] = $rssUrl;

			/* Show RSS feed */
			if ( isset( \IPS\Request::i()->rss ) )
			{			
				$document = \IPS\Xml\Rss::newDocument( $category->url(), $rssTitle, $rssTitle );

                /* Go through table items */
				foreach ( $table->getRows( array() ) as $video )
				{
					if ( ! $video->hidden() )
					{
					    $document->addItem( $video->title, $video->url(), $video->description, \IPS\DateTime::ts( $video->date ), $video->tid );
					}
				}

				\IPS\Output::i()->sendOutput( $document->asXML(), 200, 'text/xml' );
			}
		}     
        
        /* Add sidebar block */
        \IPS\Output::i()->sidebar['contextual'] = \IPS\Theme::i()->getTemplate( 'browse' )->categoriesBlock( $category );  
        
		/* Online User Location */
		$permissions = $category->permissions();
		\IPS\Session::i()->setLocation( $category->url(), explode( ",", $permissions['perm_view'] ), 'loc_videos_viewing_category', array( "videos_category_{$category->id}" => TRUE ) );                        
     
		/* Display */
		\IPS\Output::i()->title	 = $category->_title;
        
        /* Add parent cats to nav */
		foreach( $category->parents() AS $parent )
		{
			\IPS\Output::i()->breadcrumb[] = array( $parent->url(), $parent->_title );
		}        
        
		\IPS\Output::i()->breadcrumb[] = array( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&id='.$category->_id, 'front', 'videos_category', $category->seo_name ), $category->_title );        
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'browse' )->categoryPage( $category, (string) $table );        
	}
    
	/**
	 * List all videos
	 *
	 * @return	void
	 */
	protected function listall()
	{
        /* Set list type cookie */
        if( \IPS\Request::i()->listType && in_array( \IPS\Request::i()->listType, array( 'list', 'thumb' ) ) )
        {
            \IPS\Request::i()->cookie['listType'] = \IPS\Request::i()->listType;
            \IPS\Request::i()->setCookie( 'listType', \IPS\Request::i()->listType, NULL, FALSE );          
        } 	   
       
        /* Get all videos */        
		$table = new \IPS\Helpers\Table\Content( '\IPS\videos\Video', \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&do=listall', 'front', 'videos_listall' ), array(), NULL, NULL, 'read' );
        $table->tableTemplate = array( \IPS\Theme::i()->getTemplate( 'browse' ), 'videoTable' ); 
		$table->include = array( 'title' );
		$table->mainColumn = 'title';	
        $table->limit = 10;        
                
        /* List or thumbnail layout */
        if( !isset( \IPS\Request::i()->cookie['listType'] ) OR \IPS\Request::i()->cookie['listType'] == 'thumb'  )
        {
            $table->classes[] = 'ipsGrid ipsPad';
            $table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'browse' ), 'videoThumbRow' );    
        }
        else
        {
            $table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'browse' ), 'videoRow' );    
        }              
        
		/* Set default sort */
		if( !\IPS\Request::i()->sortby )
		{
			$table->sortBy = 'date';
		}        

        /* Sorting table */
        $table->langPrefix = "video_";
        $table->sortOptions['rating'] = 'video_rating';        
    	$table->sortBy = $table->sortBy ?: 'date';
		$table->sortDirection = $table->sortDirection ?: 'desc';
        
        /* Setup our filters */
		$table->filters	= array(
			'filter_myvideos' => array('author_id=?', \IPS\Member::loggedIn()->member_id ),
		 );        
     
		/* Display */
		\IPS\Output::i()->title	 = \IPS\Member::loggedIn()->language()->addToStack('page__listall');
		\IPS\Output::i()->breadcrumb[] = array( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&do=listall', 'front', 'videos_listall' ), \IPS\Member::loggedIn()->language()->addToStack('page__listall') );        
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'browse' )->categoryPage( NULL, (string) $table );       
	}    
    
	/**
	 * Show categories
	 *
	 * @return	void
	 */
	public function categories()
	{
		\IPS\Output::i()->title	 = \IPS\Member::loggedIn()->language()->addToStack('module__videos_categories');
		\IPS\Output::i()->breadcrumb[] = array( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse&do=categories=', 'front', 'videos_categories' ), \IPS\Member::loggedIn()->language()->addToStack('module__videos_categories') );        
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'browse' )->categories();
	} 
    
	/**
	 * Latest Videos RSS
	 *
	 * @return	void
	 */
	protected function rss()
	{
		if( !\IPS\Settings::i()->vs_enable_rss )
		{
			\IPS\Output::i()->error( 'videos_rss_offline', '', 403 );
		}
        
		/* Show rss feed */
		$document = \IPS\Xml\Rss::newDocument( \IPS\Http\Url::internal( 'app=videos&module=videos&controller=browse', 'front', 'videos' ), \IPS\Member::loggedIn()->language()->get('latest_videos_main'), \IPS\Member::loggedIn()->language()->get('latest_videos_main') );
		
		foreach ( \IPS\videos\Video::getItemsWithPermission( array() ) as $video )
		{
		    /* Add thumbnail to description */
		    if( $video->thumbnail )
            {
                $thumbImg = "<p><img src='".\IPS\File::get( 'videos_Thumbs', $video->thumbnail )->url."' class='ipsThumb ipsThumb_standard' /></p>";    
                $video->description = $thumbImg . $video->description;
            }
          
			$document->addItem( $video->title, $video->url(), $video->description, \IPS\DateTime::ts( $video->date ), $video->tid );
		}

		\IPS\Output::i()->sendOutput( $document->asXML(), 200, 'text/xml' ); 
	}       
}