<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */


namespace IPS\videos\extensions\core\Profile;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * @brief	Profile extension: Videos
 */
class _Videos
{
	/**
	 * Member
	 */
	protected $member;
	
	/**
	 * Constructor
	 *
	 * @param	\IPS\Member	$member	Member whose profile we are viewing
	 * @return	void
	 */
	public function __construct( \IPS\Member $member )
	{
		$this->member = $member;
	}
	
	/**
	 * Is there content to display?
	 *
	 * @return	bool
	 */
	public function showTab()
	{
		return ( \IPS\Member::loggedIn()->group['g_vs_view'] ) ? TRUE : FALSE;
	}
	
	/**
	 * Display
	 *
	 * @return	string
	 */
	public function render()
	{
	    /* Setup featured posts table */
        $table = new \IPS\Helpers\Table\Content( '\IPS\videos\Video', $this->member->url()->setQueryString( array( 'tab' => 'node_videos_Videos' ) ) );
        $table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'browse', 'videos', 'front' ), 'videoRow' );
        $table->where[] = array( 'author_id=? AND status=1', $this->member->member_id );
        $table->noModerate = TRUE;
        
		return (string) $table;
	}
}