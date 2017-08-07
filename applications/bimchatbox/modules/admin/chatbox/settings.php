<?php


namespace IPS\bimchatbox\modules\admin\chatbox;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * settings
 */
class _settings extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		\IPS\Dispatcher::i()->checkAcpPermission( 'settings_manage' );
		
		# Build Form
		$form = new \IPS\Helpers\Form;	
		$form->addTab( 'chatbox_tab_basic' );
		$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_conf_on', \IPS\Settings::i()->chatbox_conf_on, FALSE, array() ) );
		
		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_timeformat', \IPS\Settings::i()->chatbox_conf_timeformat, TRUE, array( 'options' => array( '12' => 'chatbox_12hour', '24' => 'chatbox_24hour' ) ) ) );
		
		$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_conf_ordertop', \IPS\Settings::i()->chatbox_conf_ordertop, FALSE, array() ) );
		
		$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_conf_anntab', \IPS\Settings::i()->chatbox_conf_anntab, FALSE, array() ) );
		
		$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_conf_hidePhoto', \IPS\Settings::i()->chatbox_conf_hidePhoto, FALSE, array() ) );
		
		$form->add( new \IPS\Helpers\Form\Number( 'chatbox_conf_height', \IPS\Settings::i()->chatbox_conf_height ? \IPS\Settings::i()->chatbox_conf_height : 300, FALSE, array() ) );	
		
		$form->addTab( 'chatbox_tab_advanced' );
		$form->add( new \IPS\Helpers\Form\Number( 'chatbox_conf_chatlimit', \IPS\Settings::i()->chatbox_conf_chatlimit, FALSE, array() ) );	
				
		$form->add( new \IPS\Helpers\Form\Number( 'chatbox_conf_interval', \IPS\Settings::i()->chatbox_conf_interval, FALSE, array() ) );
		
		$form->add( new \IPS\Helpers\Form\Number( 'chatbox_conf_floodlimit', \IPS\Settings::i()->chatbox_conf_floodlimit, FALSE, array( 'unlimited' => 0, 'unlimitedLang' => 'none' ), NULL, NULL, \IPS\Member::loggedIn()->language()->addToStack('seconds') ) );
		
		$form->add( new \IPS\Helpers\Form\Number( 'chatbox_conf_maxlength', \IPS\Settings::i()->chatbox_conf_maxlength, FALSE, array( 'unlimited' => 0, 'unlimitedLang' => 'unlimited' ), NULL, NULL ) );
				
		$form->add( new \IPS\Helpers\Form\Number( 'chatbox_conf_maxemoticons', \IPS\Settings::i()->chatbox_conf_maxemoticons, FALSE, array( 'unlimited' => 0, 'unlimitedLang' => 'unlimited' ), NULL, NULL ) );
		
		$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_conf_imgPost', \IPS\Settings::i()->chatbox_conf_imgPost, FALSE, array(), NULL, NULL ) );
		
		//$form->add( new \IPS\Helpers\Form\YesNo( 'chatbox_conf_autoClear', \IPS\Settings::i()->chatbox_conf_autoClear, FALSE, array() ) );	
		
		$form->addTab( 'chatbox_tab_perm' );		
		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_canView', array_filter( explode( ',', \IPS\Settings::i()->chatbox_conf_canView ) ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => TRUE ) ) );		

		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_canchat', array_filter( explode( ',', \IPS\Settings::i()->chatbox_conf_canchat ) ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => TRUE ) ) );
		
		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_moderators', array_filter( explode( ',', \IPS\Settings::i()->chatbox_conf_moderators ) ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => TRUE ) ) );		
		
		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_canEdit', array_filter( explode( ',', \IPS\Settings::i()->chatbox_conf_canEdit ) ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => TRUE ) ) );		
		
		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_editOwn', array_filter( explode( ',', \IPS\Settings::i()->chatbox_conf_editOwn ) ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => TRUE ) ) );		
		
		$form->add( new \IPS\Helpers\Form\Select( 'chatbox_conf_canDelete', array_filter( explode( ',', \IPS\Settings::i()->chatbox_conf_canDelete ) ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => TRUE ) ) );		

		/* Save */
		if ( $values = $form->values( TRUE ) )
		{
			$form->saveAsSettings( $values );
			\IPS\Session::i()->log( 'acplogs__chatbox_settings' );
		}
		
		/* Output */
		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack('settings');
		\IPS\Output::i()->output = $form . \IPS\Application::load('bimchatbox')->cprbim();								
	}

	/**
	 * ...
	 *
	 * @return	void
	 */
	protected function manage()
	{

	}
	
}