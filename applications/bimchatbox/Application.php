<?php
/**
 * @brief		Chatbox Application Class
 * @author		<a href='http://ipsviet.com'>onlyME</a>
 * @copyright	(c) 2015 onlyME
 * @package		IPS Social Suite
 * @subpackage	Chatbox
 * @since		01 Mar 2015
 * @version		
 */
 
namespace IPS\bimchatbox;

/**
 * Chatbox Application Class
 */
class _Application extends \IPS\Application
{
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
			'browseTabs'	=> array( array( 'key' => 'Chatbox' ) ),
			'browseTabsEnd'	=> array(),
			'activityTabs'	=> array()
		);
	}
	
	//===========================================================================
	// [Node] Get Icon
	//===========================================================================	
	protected function get__icon()
	{
		return 'weixin';
	}

	//===========================================================================
	// canView
	//===========================================================================	
	public function can_View()
	{
		if ( \IPS\Member::loggedIn()->inGroup( explode(",", \IPS\Settings::i()->chatbox_conf_canView) ) )
		{
			return true;		
		}
		else
		{
			return false;
		}
	}	
	
	//===========================================================================
	// canChat
	//===========================================================================	
	public function can_Chat()
	{
		if ( \IPS\Member::loggedIn()->member_id && \IPS\Member::loggedIn()->inGroup( explode(",", \IPS\Settings::i()->chatbox_conf_canchat) ) )
		{
			return true;		
		}
		else
		{		
			return false;
		}
	}	
	
	//===========================================================================
	// canManage
	//===========================================================================	
	public function can_Manage()
	{
		if ( \IPS\Member::loggedIn()->inGroup( explode(",", \IPS\Settings::i()->chatbox_conf_moderators) ) )
		{
			return true;		
		}
		else
		{
			return false;
		}
	}	
	
	//===========================================================================
	// canEdit
	//===========================================================================	
	public function can_Edit($chatterID)
	{
		if ( in_array(\IPS\Member::loggedIn()->member_id, explode(",", \IPS\Settings::i()->chatbox_conf_blocklist)) )
		{
			return false;
		}
		if ( \IPS\Member::loggedIn()->inGroup( explode(",", \IPS\Settings::i()->chatbox_conf_canEdit) ) OR ( \IPS\Member::loggedIn()->member_id == $chatterID && \IPS\Member::loggedIn()->inGroup( explode(",", \IPS\Settings::i()->chatbox_conf_editOwn) ) ) )
		{
			return true;		
		}
		else
		{
			return false;
		}
	}
	
	//===========================================================================
	// canDelete
	//===========================================================================	
	public function can_Delete()
	{
		if ( \IPS\Member::loggedIn()->inGroup( explode(",", \IPS\Settings::i()->chatbox_conf_canDelete) ) )
		{
			return true;		
		}
		else
		{
			return false;
		}
	}
	
	//===========================================================================
	// loadChatbox
	//===========================================================================	
	public function loadChatbox()
	{
		# Emoticons
		$emoticons = array();
		foreach ( \IPS\Db::i()->select( '*', 'core_emoticons', NULL, 'emo_set,emo_position' ) as $row )
		{
			$emoticons[ $row['typed'] ] = (string) \IPS\File::get( 'core_Emoticons', $row['image'] )->url;
		}
		
		# Value
		\IPS\Output::i()->endBodyCode = \IPS\Output::i()->endBodyCode . \IPS\Theme::i()->getTemplate( 'embed', 'bimchatbox' )->chatvars($emoticons);
	}
	
	//===========================================================================
	// get announcement
	//===========================================================================	
	public function announcement()
	{
		$txt = \IPS\Settings::i()->chatbox_conf_announcements;
		$txt = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $txt);
		return $txt;
	}
	
	//===========================================================================
	// This app is free for you. But...
	// Please Keep the copyright, removing it means you're killing the Chatbox
	//===========================================================================
	public function cprbim()
	{
		$cprbim .= "<div id='cbCopyright' class='ipsType ipsType_center ipsType_small ipsType_light ipsPad_half'>";
		$cprbim .= "Chatbox {$this->version} by <a href='http://ipsviet.com'>IPSViet.com</a>";
		if ( \IPS\Dispatcher::i()->controllerLocation === 'admin'  )
		{
			$cprbim .= "<br><br>BUY ME A BEER<br><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='JDCVLS35NCNDE'>
<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>";
		}
		$cprbim .= "</div>";
		return $cprbim;
	}
}