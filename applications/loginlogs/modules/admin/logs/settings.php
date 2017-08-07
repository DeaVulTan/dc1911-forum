<?php


namespace IPS\loginlogs\modules\admin\logs;

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
	 * ...
	 *
	 * @return	void
	 */
	protected function manage()
	{
		\IPS\Dispatcher::i()->checkAcpPermission( 'settings_manage' );

		$form = new \IPS\Helpers\Form;

		$form->addHeader('llogs_general');
		$form->add( new \IPS\Helpers\Form\Radio( 'llogs_logtype', \IPS\Settings::i()->llogs_logtype, FALSE, array(
				'options' => array(
						'guest'  	=> 'llogs_logtype_guest',
						'member' 	=> 'llogs_logtype_member',
						'both'		=> 'llogs_logtype_both'
				),
				'toggles' => array(
						'member' 	=> array( 'llogs_groups' ),
						'both' 		=> array( 'llogs_groups' )
				)
			)
		) );
		$form->add( new \IPS\Helpers\Form\Select( 'llogs_groups', \IPS\Settings::i()->llogs_groups == '*' ? "*" : explode( ',', \IPS\Settings::i()->llogs_groups ), FALSE, array( 'options' => \IPS\Member\Group::groups( TRUE, FALSE ), 'parse' => 'normal', 'multiple' => true, 'unlimited' => '*', 'unlimitedLang' => 'all_groups' ), NULL, NULL, NULL, 'llogs_groups' ) );

		$form->add( new \IPS\Helpers\Form\Number( 'llogs_logpp', \IPS\Settings::i()->llogs_logpp, FALSE, array( 'min' => 5, 'max' => 50 ), NULL, NULL, NULL, 'llogs_logpp' ) );

		$form->addHeader('llogs_logpruning');
		$form->add( new \IPS\Helpers\Form\YesNo( 'llogs_logpruning', \IPS\Settings::i()->llogs_logpruning, FALSE, array( 'togglesOn' => array( 'llogs_days' ) ) ) );
		$form->add( new \IPS\Helpers\Form\Number( 'llogs_days', \IPS\Settings::i()->llogs_days, FALSE, array(), NULL, NULL, NULL, 'llogs_days' ) );

		if ( $values = $form->values( TRUE ) )
		{
			$form->saveAsSettings( $values );
			\IPS\Session::i()->log( 'acplogs__loginlogs_settings' );
		}

		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack('settings');
		\IPS\Output::i()->output = $form;
	}
}