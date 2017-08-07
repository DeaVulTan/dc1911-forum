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
 * comments
 */
class _comments extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 */
	public function execute()
	{    
        parent::execute();
        
		/* You must purchase copyright removal before removing */
        if( !\IPS\Settings::i()->devfuse_copy_num && !\IPS\Request::i()->isAjax() )
        {
            \IPS\Output::i()->output .= "<div style='clear:both;text-align:center;position:absolute;bottom:15px;width:95%;'><a href='http://defcon.uz' class='ipsType_light ipsType_smaller'>Видео система Defcon Uzbekistan</a></div>";    
        }         
    }    
    
	/**
	 * Comment List
	 *
	 * @return	void
	 */
	protected function manage()
	{
	    /* Setup comments table */
		$table = new \IPS\Helpers\Table\Content( '\IPS\videos\Video\Comment', \IPS\Http\Url::internal( 'app=videos&module=videos&controller=comments', 'front', 'videos_comments' ) );
		$table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'comments', 'videos', 'front' ), 'commentRow' );
		$table->include = array( 'comment_text' );
		$table->mainColumn = 'comment_text';
        $table->langPrefix = "videocomments_";
        $table->limit = 5;       
        $table->showFilters = FALSE;
        
        /* Setup our filters */
		$table->filters	= array(
			'mycomments' => array('comment_member_id=?', \IPS\Member::loggedIn()->member_id ),
		 );              
        
        /* Table sort */
		$table->sortBy = $table->sortBy ?: 'comment_date';
		$table->sortDirection = $table->sortDirection ?: 'desc';
		
        /* Display table */
		\IPS\Output::i()->breadcrumb[] = array( NULL, \IPS\Member::loggedIn()->language()->addToStack( 'module__videos_comments' ) );       
		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack( 'module__videos_comments' );
		\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'browse' )->commentList( (string) $table );
	}
}