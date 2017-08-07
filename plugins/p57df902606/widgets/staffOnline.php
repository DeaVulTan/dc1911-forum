<?php

namespace IPS\plugins\p57df902606\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * staffOnline Widget
 */
class _staffOnline extends \IPS\Widget
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'staffOnline';
	
	/**
	 * @brief	App
	 */
	public $app = 'core';
		
	/**
	 * @brief	Plugin
	 */
	public $plugin = '30';
	
	/**
	 * Initialise this widget
	 *
	 * @return void
	 */ 
	public function init()
	{
		parent::init();
		// Use this to perform any set up and to assign a template that is not in the following format:
		$this->template( array( \IPS\Theme::i()->getTemplate( 'plugins', $this->app, 'global' ), $this->key ) );
	}
	
	/**
	 * Specify widget configuration
	 *
	 * @param	null|\IPS\Helpers\Form	$form	Form object
	 * @return	null|\IPS\Helpers\Form
	 */
	public function configuration( &$form=null )
	{
 		if ( $form === null )
		{
	 		$form = new \IPS\Helpers\Form;
 		}

        $form->add( new \IPS\Helpers\Form\Select( 'staffOnline_g', \IPS\Settings::i()->staffOnline_g ? explode( ',', \IPS\Settings::i()->staffOnline_g ) : array(), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => true ), NULL, NULL, NULL, 'staffOnline_g' ) );

 		return $form;
 	} 
 	
 	 /**
 	 * Ran before saving widget configuration
 	 *
 	 * @param	array	$values	Values from form
 	 * @return	array
 	 */
 	public function preConfig( $values )
 	{
 		return $values;
 	}

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
        if ( \IPS\Member::loggedIn()->inGroup(explode(',', \IPS\Settings::i()->staffOnline_g ) ) )
        {
            return '';
        }

        $groups = \IPS\core\StaffDirectory\Group::roots();

        try
        {
            \IPS\core\StaffDirectory\User::load( \IPS\Member::loggedIn()->member_id, 'leader_type_id', array( 'leader_type=?', 'm' ) );
            $userIsStaff	= TRUE;
        }
        catch( \OutOfRangeException $e )
        {
            $userIsStaff	= FALSE;
        }

        $where = array(
            array( 'login_type=' . \IPS\Session\Front::LOGIN_TYPE_MEMBER ),
            array( 'current_appcomponent=?', \IPS\Dispatcher::i()->application->directory ),
            array( 'current_module=?', \IPS\Dispatcher::i()->module->key ),
            array( 'current_controller=?', \IPS\Dispatcher::i()->controller ),
            array( 'running_time>' . \IPS\DateTime::create()->sub( new \DateInterval( 'PT30M' ) )->getTimeStamp() ),
            array( 'member_id IS NOT NULL' )
        );

        try
        {
            $online = \IPS\Db::i()->select( array( 'member_id', 'member_name', 'seo_name', 'member_group' ), 'core_sessions', $where, 'running_time DESC' )->setKeyField( 'member_id' );
            $onlineCount = count($online);
        }
        catch ( \UnderflowException $e )
        {
            $online	= FALSE;
        }

        return $this->output( $groups, $userIsStaff, $onlineCount );
	}
}