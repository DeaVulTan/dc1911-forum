<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */
 
namespace IPS\videos\Video;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Videos Comment Model
 */
class _Comment extends \IPS\Content\Comment implements \IPS\Content\EditHistory, \IPS\Content\ReportCenter, \IPS\Content\Hideable, \IPS\Content\Reputation
{
	/**
	 * @brief	[ActiveRecord] Multiton Store
	 */
	protected static $multitons;
		
	/**
	 * @brief	[Content\Comment]	Item Class
	 */
	public static $itemClass = 'IPS\videos\Video';
	
	/**
	 * @brief	[ActiveRecord] Database Table
	 */
	public static $databaseTable = 'videos_comments';
	
	/**
	 * @brief	[ActiveRecord] Database Prefix
	 */
	public static $databasePrefix = 'comment_';
    
	/**
	 * @brief	[ActiveRecord] ID Database Column
	 */
	public static $databaseColumnId = 'id';    
	
	/**
	 * @brief	Database Column Map
	 */
	public static $databaseColumnMap = array(
		'item'				=> 'video_id',
		'author'			=> 'member_id',
		'author_name'		=> 'member_name',
		'content'			=> 'text',
		'date'				=> 'date_added',
		'ip_address'		=> 'ip_address',
		'edit_time'			=> 'edit_time',
		'edit_member_name'	=> 'edit_name',
		'edit_show'			=> 'append_edit',
		'approved'			=> 'approved'
	);
	
	/**
	 * @brief	Application
	 */
	public static $application = 'videos';
	
	/**
	 * @brief	Title
	 */
	public static $title = 'videos_comments';
	
	/**
	 * @brief	Icon
	 */
	public static $icon = 'videos';
	
	/**
	 * @brief	Reputation Type
	 */
	public static $reputationType = 'comment_id';
	
	/**
	 * @brief	[Content]	Key for hide reasons
	 */
	public static $hideLogKey = 'videos-videos';   
    
	/**
	 * Get URL for doing stuff
	 *
	 * @param	string|NULL		$action		Action
	 * @return	\IPS\Http\Url
	 */
	public function url( $action=NULL )
	{
		return parent::url( $action )->setQueryString( 'tab', 'comments' );
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
		
        /* Group can view comment? */
        if( $member->group['g_vs_view_comments'] )
        {
            return true;
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

        /* Can edit own comments? */
        if( ( $this->author()->member_id == $member->member_id ) && $member->group['g_vs_edit_comments'] )
        {
            return TRUE;   
        }

        /* Can edit others comments? */
        if( ( $this->author()->member_id != $member->member_id ) && $member->group['g_vs_m_edit_comments'] )
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
        
        /* Can delete own comments? */
        if( ( $this->author()->member_id == $member->member_id ) && $member->group['g_vs_delete_comments'] )
        {
            return TRUE;   
        }

        /* Can delete others comments? */
        if( ( $this->author()->member_id != $member->member_id ) && $member->group['g_vs_m_delete_comments'] )
        {
            return TRUE;   
        }        

		return false;
	} 
    
	/**
	 * Can hide?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for (NULL for currently logged in member)
	 * @return	bool
	 */
	public function canHide( $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();

        /* Group can delete comment? */
        if( $member->group['g_vs_m_manage'] )
        {
            return true;
        }

		return false;
	} 
    
	/**
	 * Can hide?
	 *
	 * @param	\IPS\Member|NULL	$member	The member to check for (NULL for currently logged in member)
	 * @return	bool
	 */
	public function canUnhide( $member=NULL )
	{
		$member = $member ?: \IPS\Member::loggedIn();

        /* Group can delete comment? */
        if( $member->group['g_vs_m_manage'] )
        {
            return true;
        }

		return false;
	}
                    
}