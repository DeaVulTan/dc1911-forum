<?php


namespace IPS\bimchatbox\modules\front\chatbox;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * chatbox
 */
class _chatbox extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		if ( \IPS\Settings::i()->chatbox_conf_on != 1 )
		{
			if ( \IPS\Request::i()->isAjax() )
			{
				\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_off' ) ) );
				exit;
			}
			else
			{
				\IPS\Output::i()->error( 'chatbox_error_off', '2BIMCB101/1', 403, '' );
			}				
		}
		parent::execute();
	}

	/**
	 * ...
	 *
	 * @return	void
	 */
	protected function manage()
	{
		if ( ! \IPS\Application::load('bimchatbox')->can_View() )
		{
			\IPS\Output::i()->error( 'chatbox_error_noper', '2BIMCB101/2', 403, '' );
		}
		
		$chats = array(); 
		$chats = \IPS\Application::load('bimchatbox')->loadChatBox();
		
		// Output		
		\IPS\Output::i()->title		= \IPS\Member::loggedIn()->language()->addToStack('chatbox_title');
		\IPS\Output::i()->output	= \IPS\Theme::i()->getTemplate( 'chat' )->main($chats, $orientation) . \IPS\Application::load('bimchatbox')->cprbim();
	}
		
	/*-------------------------------------------------------------------------*/
	// Chatbox management
	// ... and PT is a donkey
	/*-------------------------------------------------------------------------*/		
	protected function cbmanage()
	{
		# Can manage?
		if ( ! \IPS\Application::load('bimchatbox')->can_Manage() )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_notmoderator' ) ) );
			exit;			
		}
		
		# Block list
		$form = new \IPS\Helpers\Form;

		$blockID = \IPS\Settings::i()->chatbox_conf_blocklist ? explode( ",", \IPS\Settings::i()->chatbox_conf_blocklist ) : array();
		$blockName = array();
		foreach( (array) $blockID as $mid )
		{
			$blockName[] = \IPS\Member::load( $mid )->name;
		}

		$form->add( new \IPS\Helpers\Form\Member( 'chatbox_conf_blocklist', $blockName, FALSE, array('multiple'	=> null) ) );
		
		$form->add( new \IPS\Helpers\Form\TextArea( 'chatbox_conf_announcements', \IPS\Settings::i()->chatbox_conf_announcements, FALSE, array('rows' => 5) ) );
		
		$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_clearchat', 0, FALSE, array() ) );
		
		$form->class = 'ipsForm_vertical';		
		
		if ( $values = $form->values( TRUE ) )
		{
			$form->saveAsSettings( $values );
			
			if ( $values['chatbox_clearchat'] == 1 )
			{
				\IPS\Db::i()->delete( 'bimchatbox_chat', null );
			}
			
			\IPS\Output::i()->redirect( isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : \IPS\Http\Url::internal( '' ) );
		}
		
		\IPS\Output::i()->breadcrumb[] = array( NULL, \IPS\Member::loggedIn()->language()->addToStack('chatbox_manage') );
		\IPS\Output::i()->title		= \IPS\Member::loggedIn()->language()->addToStack('chatbox_manage');		
		\IPS\Output::i()->output	= \IPS\Theme::i()->getTemplate( 'chat' )->manage($form) . \IPS\Application::load('bimchatbox')->cprbim();
	}
		
	/*-------------------------------------------------------------------------*/
	// Chat
	/*-------------------------------------------------------------------------*/		
	protected function chat()
	{
		\IPS\Session::i()->csrfCheck();
		
		# Force using ajax
		if ( ! \IPS\Request::i()->isAjax() )
		{
			\IPS\Output::i()->error( 'chatbox_error_noajax', '2BIMCB101/3', 403, '' );
		}
		
		# Can chat or not?
		if ( ! \IPS\Application::load('bimchatbox')->can_Chat() || in_array(\IPS\Member::loggedIn()->member_id, explode(",", \IPS\Settings::i()->chatbox_conf_blocklist)) )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_cannotchat' ) ) );
			exit;			
		}	
		
		# Check flood limit
		if ( \IPS\Settings::i()->chatbox_conf_floodlimit > 0 && ! \IPS\Application::load('bimchatbox')->can_Manage() )
		{
			try
			{
				$lastChat = \IPS\Db::i()->select( '*', 'bimchatbox_chat', 'user=' . \IPS\Member::loggedIn()->member_id, 'time DESC', 1 )->first();
			}
			catch ( \UnderflowException $e ) {}
			
			if ( time() - $lastChat['time'] < \IPS\Settings::i()->chatbox_conf_floodlimit )
			{
				$wait = \IPS\Settings::i()->chatbox_conf_floodlimit - ( time() - $lastChat['time'] );
				\IPS\Output::i()->json( array( 'type' => 'error', 'message' => sprintf( \IPS\Member::loggedIn()->language()->get( 'chatbox_error_flood' ), $wait ) ) );
				exit;
			}
		}
		
		# Before saving 
		if ( ! \IPS\Request::i()->txt  )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_nomsg' ) ) );
			exit;
		}	

		$txt = $this->chatboxText(\IPS\Request::i()->txt);

		# Update database
		$id = \IPS\Db::i()->insert( 'bimchatbox_chat', array(
				'user'		=> \IPS\Member::loggedIn()->member_id,
				'chat'		=> $txt,
				'time'		=> time(),
		) );		
		
		# Ouput		
		\IPS\Output::i()->json( 'OK' );	
	}
	
	/*-------------------------------------------------------------------------*/
	// getMessages
	/*-------------------------------------------------------------------------*/		
	protected function getMessages()
	{		
		\IPS\Session::i()->csrfCheck();
		
		# Force using ajax
		if ( ! \IPS\Request::i()->isAjax() )
		{
			\IPS\Output::i()->error( 'chatbox_error_noajax', '2BIMCB101/4', 403, '' );
		}

		# Value
		$lastID = \IPS\Request::i()->lastID ? intval( \IPS\Request::i()->lastID ) : 0;
		$user = \IPS\Member::loggedIn()->member_id ? \IPS\Member::loggedIn()->member_id : 0;
		$maxRow = \IPS\Request::i()->loadMoreMode == 1 ? 10 : \IPS\Settings::i()->chatbox_conf_chatlimit;
		$where = array(); 
		
		# Ignore users
		if( \IPS\Member::loggedIn()->member_id )
		{
			$ignored = iterator_to_array( \IPS\Db::i()->select( 'ignore_ignore_id, ignore_id', 'core_ignored_users', array( 'ignore_owner_id=? and ignore_chatbox=1', \IPS\Member::loggedIn()->member_id ) )->setValueField( 'ignore_ignore_id' ) );
		}
		else
		{
			$ignored = array();
		}
		
		if ( count($ignored) > 0 )
		{
			$where[] = array( 'user NOT IN(' . implode(",",$ignored) . ')' );
		}
		
		# Select newer ID
		if ( \IPS\Request::i()->loadMoreMode == 1 )
		{
			$where[] = array( 'id<?', $lastID );
		}
		else
		{
			$where[] = array( 'id>?', $lastID );
		}
		
		foreach ( \IPS\Db::i()->select( '*', 'bimchatbox_chat', $where, 'id DESC', array( 0, $maxRow ) ) as $k => $row )
		{
			$cnt++;
			if ( $cnt == 1 )
			{				
				$newLastID = $row['id'];
			}
			$chats[] = $row;
		}	
		
		# Ouput	
		$data = null;
		if ( count( $chats ) > 0 )
		{
			$chats = \IPS\Settings::i()->chatbox_conf_ordertop != 1 ? array_reverse($chats) : $chats;
			
			foreach( $chats as $chat )
			{
				try
				{					
					$member = \IPS\Member::load( $chat['user'] );
					$nameFormat = $member->member_group_id ? \IPS\Member\Group::load( $member->member_group_id )->formatName( $member->name ) : $member->name;
				}
				catch( \OutOfRangeException $e ){}					
				
				$photo = \IPS\Settings::i()->chatbox_conf_hidePhoto != 1 ? $member->photo : false;
				$canEdit = ( \IPS\Application::load('bimchatbox')->can_Edit($chat['user']) || \IPS\Application::load('bimchatbox')->can_Manage() ) ? 1 : false;
				$canDelete = ( \IPS\Application::load('bimchatbox')->can_Delete() || \IPS\Application::load('bimchatbox')->can_Manage() ) ? 1 : false;
				
				$new[] = 	$chat['id'] . "~~#~~" .
							$chat['user']. "~~#~~" .		
							$member->name . "~~#~~" .
							$nameFormat . "~~#~~" . 							
							$photo . "~~#~~" .		
							$member->url(). "~~#~~" .
							$chat['chat'] . "~~#~~" . 
							$chat['time'] . "~~#~~" . 
							$canEdit . "~~#~~" . 
							$canDelete;
			}
			
			$data = implode( "~~||~~", $new );
		}
		
		\IPS\Output::i()->json( array( 'content' => $data, 'lastID' => $newLastID, 'total' => $cnt ) );	
	}
	
	/*-------------------------------------------------------------------------*/
	// getAllMessages
	/*-------------------------------------------------------------------------*/		
	protected function getAllMessages()
	{
		\IPS\Session::i()->csrfCheck();
		
		# Force using ajax
		if ( ! \IPS\Request::i()->isAjax() )
		{
			\IPS\Output::i()->error( 'chatbox_error_noajax', '2BIMCB101/5', 403, '' );
		}
		
		# Ignore users
		if( \IPS\Member::loggedIn()->member_id )
		{
			$ignored = iterator_to_array( \IPS\Db::i()->select( 'ignore_ignore_id, ignore_id', 'core_ignored_users', array( 'ignore_owner_id=? and ignore_chatbox=1', \IPS\Member::loggedIn()->member_id ) )->setValueField( 'ignore_ignore_id' ) );
		}
		else
		{
			$ignored = array();
		}
		
		$where = array();
		
		if ( count($ignored) > 0 )
		{
			$where[] = array( 'user NOT IN(' . implode(",",$ignored) . ')' );
		}
		
		$where = array( 'id>?', 0 );
		
		# AutoClear		
		if ( \IPS\Settings::i()->chatbox_conf_autoClear == 1 )
		{
			$limit = 20;
			$maxquery = \IPS\Settings::i()->chatbox_conf_chatlimit + $limit;
			foreach ( \IPS\Db::i()->select( '*', 'bimchatbox_chat', $where, 'id DESC', array( 0, $maxquery ) ) as $k => $row )
			{
				if ( $k >= \IPS\Settings::i()->chatbox_conf_chatlimit )
				{
					if ( $k == \IPS\Settings::i()->chatbox_conf_chatlimit )
					{
						$removeFrom = $row['time'];
					}
					$remove++;
				}
				else
				{
					$cnt++;
					if ( $cnt == 1 )
					{
						$lastID = $row['id'];
					}				
					$chats[] = $row;
				}
			}	
			if ( $removeFrom > 0 && $remove >= $limit )
			{
				\IPS\Db::i()->delete( 'bimchatbox_chat', array( 'time<=?', $removeFrom ) );
			}
		}
		else
		{
			foreach ( \IPS\Db::i()->select( '*', 'bimchatbox_chat', $where, 'time DESC', array( 0, \IPS\Settings::i()->chatbox_conf_chatlimit ) ) as $k => $row )
			{
				$cnt++;
				if ( $cnt == 1 )
				{
					$lastID = $row['id'];
				}				
				$chats[] = $row;
			}				
		}
		
		# Ouput	
		$lastID_ = \IPS\Request::i()->lastID ? intval( \IPS\Request::i()->lastID ) : 0;
		
		if ( count( $chats ) > 0 && $lastID > $lastID_ )
		{
			$chats = \IPS\Settings::i()->chatbox_conf_ordertop != 1 ? array_reverse($chats) : $chats;
			foreach( $chats as $chat )
			{
				$member = \IPS\Member::load( $chat['user'] );
				$nameFormat = $member->member_group_id ? \IPS\Member\Group::load( $member->member_group_id )->formatName( $member->name ) : $member->name;
				$photo = \IPS\Settings::i()->chatbox_conf_hidePhoto != 1 ? $member->photo : false;
				$canEdit = ( \IPS\Application::load('bimchatbox')->can_Edit($chat['user']) || \IPS\Application::load('bimchatbox')->can_Manage() ) ? 1 : false;
				$canDelete = ( \IPS\Application::load('bimchatbox')->can_Delete() || \IPS\Application::load('bimchatbox')->can_Manage() ) ? 1 : false;
				
				$new[] = 	$chat['id'] . "~~#~~" .
							$chat['user']. "~~#~~" .		
							$member->name . "~~#~~" .
							$nameFormat . "~~#~~" . 							
							$photo . "~~#~~" .		
							$member->url(). "~~#~~" .
							$chat['chat'] . "~~#~~" . 
							$chat['time'] . "~~#~~" . 
							$canEdit . "~~#~~" . 
							$canDelete;
			}
			
			$data = implode( "~~||~~", $new );
		}
		
		\IPS\Output::i()->json( array( 'content' => $data, 'lastID' => $lastID ) );	
	}	
	
	/*-------------------------------------------------------------------------*/
	// Delete
	/*-------------------------------------------------------------------------*/		
	protected function delete()
	{
		\IPS\Session::i()->csrfCheck();
		
		# Can manage?
		if ( ! \IPS\Application::load('bimchatbox')->can_Delete() && ! \IPS\Application::load('bimchatbox')->can_Manage() )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_notmoderator' ) ) );
			exit;			
		}
		
		# Delete
		\IPS\Db::i()->delete( 'bimchatbox_chat', array( 'id=?', \IPS\Request::i()->id ) );

		# Done
		\IPS\Output::i()->json( array( 'message' => 'deleted' ) );	
	}
	
	/*-------------------------------------------------------------------------*/
	// Edit
	/*-------------------------------------------------------------------------*/		
	protected function edit()
	{	
		\IPS\Session::i()->csrfCheck();	
		
		# Chat db
		try
		{
			$chat = \IPS\Db::i()->select( '*', 'bimchatbox_chat', 'id=' . \IPS\Request::i()->id, 'time DESC', 1 )->first();
		}
		catch ( \UnderflowException $e ) {}		
				
		if ( !$chat['id']  )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_nodata' ) ) );
			exit;			
		}			
		
		# Can manage?
		if ( ! \IPS\Application::load('bimchatbox')->can_Edit($chat['user']) && ! \IPS\Application::load('bimchatbox')->can_Manage() )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_notmoderator' ) ) );
			exit;			
		}
		
		# Done
		\IPS\Output::i()->json( array( 'content' => trim( strip_tags( $chat['chat'] ) ) ) );	
	}

	protected function saveMSG()
	{		
		\IPS\Session::i()->csrfCheck();	
		
		# Chat db
		try
		{
			$chat = \IPS\Db::i()->select( '*', 'bimchatbox_chat', 'id=' . \IPS\Request::i()->id, 'id DESC', 1 )->first();
		}
		catch ( \UnderflowException $e ) {}		
		
		if ( !$chat['id']  )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_nodata' ) ) );
			exit;			
		}		
		
		# Can manage?
		if ( ! \IPS\Application::load('bimchatbox')->can_Edit($chat['user']) && ! \IPS\Application::load('bimchatbox')->can_Manage() )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_notmoderator' ) ) );
			exit;			
		}
		
		# Before saving 
		if ( ! \IPS\Request::i()->txt  )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => \IPS\Member::loggedIn()->language()->get( 'chatbox_error_nomsg' ) ) );
			exit;			
		}	

		$txt = $this->chatboxText(\IPS\Request::i()->txt);
		
		\IPS\Db::i()->update( 'bimchatbox_chat', array( 'chat' => $txt ), array( 'id=?', $chat['id'] ) );
		
		# Done
		\IPS\Output::i()->json( array( 'message' => 'saved', 'txt' => $txt ) );	
	}	
	
	/*-------------------------------------------------------------------------*/
	// What what what is the text @_@
	/*-------------------------------------------------------------------------*/
	public function chatboxText($txt)
	{	
		$txt = urldecode($txt);
		$txt = htmlspecialchars( $txt, \IPS\HTMLENTITIES, 'UTF-8', FALSE );
		$txt = str_replace( "~~||~~", "", $txt );
		$txt = str_replace( "~~#~~", "", $txt );
		$txt = str_replace( "[lock]", "", $txt );
		$txt = str_replace( "[/lock]", "", $txt );
		$txt = str_replace( "[hide]", "", $txt );
		$txt = str_replace( "[/hide]", "", $txt );		
		if ( \IPS\Settings::i()->chatbox_conf_maxlength && mb_strlen($txt) > \IPS\Settings::i()->chatbox_conf_maxlength )
		{
			\IPS\Output::i()->json( array( 'type' => 'error', 'message' => sprintf( \IPS\Member::loggedIn()->language()->get( 'chatbox_error_maxlength' ) ) ) );
			exit;				
		}
		if ( \IPS\Settings::i()->remote_image_proxy )
		{	
			preg_match("~https?://\S+\.(?:jpe?g|gif|png|webp)(?:\?\S*)?(?=\s|$|\pP)~i", $txt, $img);
			$imageSrc = new \IPS\Http\Url( $img[0] );
			if ( !$imageSrc->isInternal and !$imageSrc->isLocalhost() ) 
			{
				$newUrl = new \IPS\Http\Url( \IPS\Settings::i()->base_url . "applications/core/interface/imageproxy/imageproxy.php" );
				$newUrl = $newUrl->setQueryString( array(
					'key'	=> hash_hmac( "sha256", (string) $imageSrc, \IPS\SITE_SECRET_KEY ?: md5( \IPS\Settings::i()->sql_pass . \IPS\Settings::i()->board_url . \IPS\Settings::i()->sql_database ) ),
					'img' 	=> (string) $imageSrc
					) );
				$newIMG = (string) $newUrl;
				$txt = str_replace($img[0], $newIMG, $txt);
			}
		}
		
		return $txt;
	}
}