<?php


namespace IPS\loginlogs\modules\admin\logs;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * logs
 */
class _logs extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		\IPS\Dispatcher::i()->checkAcpPermission( 'logs_manage' );
		parent::execute();
	}
	
	/**
	 * Manage
	 *
	 * @return	void
	 */
	protected function manage()
	{		
		/* Create the table */
		$table = new \IPS\Helpers\Table\Db( 'loginlogs_logs', \IPS\Http\Url::internal( 'app=loginlogs&module=logs&controller=logs' ) );
		
		$table->joins = array( array( 'select' => 'core_members.*', 'from'	=> 'core_members', 'where'	=> 'core_members.member_id=loginlogs_logs.mid' ) );

		/* Columns we need */
		$table->include 	= array( 'photo', 'name', 'email', 'login_time', 'ipaddress', 'attempt_num', 'is_successful' );
		$table->mainColumn 	= 'name';
		$table->noSort		= array( 'photo' );
		$table->widths 		= array( 'photo' => '5', 'name' => '12', 'email' => '22', 'login_time' => '15', 'ipaddress' => '31', 'attempt_num' => '5', 'is_successful' => '10' );
		$table->langPrefix 	= 'llogs_';
		$table->limit 		= \IPS\Settings::i()->llogs_logpp;

        /* Custom parsers */
        $table->parsers = array(
        	'name'				=> function( $val, $row )
        	{
				$user = $row['name'] ? "<a href='" . \IPS\Http\Url::internal( 'app=core&module=members&controller=members&do=edit&id=' ) . $row['mid'] . "'>" . $row['name'] . "</a>" : "<em><span class='ipsType_normal ipsType_light'>".$row['login']."</span></em>";

				return $user;
			},
        	'email'				=> function( $val, $row )
        	{
				return $val ? $val : '...';
			},
            'login_time'		=> function( $val, $row )
            {
                return \IPS\DateTime::ts( $val )->relative();
            },
            'photo' 			=> function( $val, $row )
            {
                return \IPS\Theme::i()->getTemplate( 'global', 'core' )->userPhoto( \IPS\Member::constructFromData( $row ), 'tiny' );
            },
            'is_successful' 	=> function( $val, $row )
            {
                switch( $val )
                {
					case 1:
						$text = '<span class="ipsButton ipsButton_medium ipsButton_important ipsButton_primary">'. \IPS\Member::loggedIn()->language()->addToStack('llogs_result_successful') .'</span>';
					break;
					case 0:
					case 2:
						$text = '<span class="ipsButton ipsButton_medium ipsButton_negative ipsButton_primary">'. \IPS\Member::loggedIn()->language()->addToStack('llogs_result_failure') .'</span>';
					break;
				}

				return $text;
            },
			'ipaddress'	=> function( $val, $row )
			{
				if ( \IPS\Member::loggedIn()->hasAcpRestriction( 'core', 'members', 'membertools_ip' ) )
				{
					return "<a href='" . \IPS\Http\Url::internal( "app=core&module=members&controller=ip&ip={$val}" ) . "'>{$val}</a>";
				}
				
				return $val;
			},
        );

		/* Search */
		$table->quickSearch = 'name';
		$table->advancedSearch = array(
			'member_id'					=> \IPS\Helpers\Table\SEARCH_MEMBER,
			'email'						=> \IPS\Helpers\Table\SEARCH_CONTAINS_TEXT,
			'ipaddress'					=> array( \IPS\Helpers\Table\SEARCH_CONTAINS_TEXT, array(), function( $val )
			{
				return array( "loginlogs_logs.ipaddress LIKE ?", '%' . $val . '%' );
			} ),
			'login_time'				=> \IPS\Helpers\Table\SEARCH_DATE_RANGE
		);

		/* Filters */
		$table->filters = array(
			'llogs_failure'		=> 'is_successful IN( 0,2 )',
			'llogs_successful'	=> 'is_successful=1'
		);
		
		if( \IPS\Request::i()->advanced_search_submitted OR \IPS\Request::i()->quicksearch )
		{
			$link = ' <a href="' . \IPS\Http\Url::internal( 'app=loginlogs&module=logs&controller=logs' ) . '">' . \IPS\Member::loggedIn()->language()->addToStack('llogs_view_full_list') . '</a>';
			$table->extraHtml = \IPS\Theme::i()->getTemplate( 'global', 'core' )->message( \IPS\Member::loggedIn()->language()->addToStack( 'member_search_results' ) . $link, 'info', NULL, FALSE );
		}

        /* Default sort options */
        $table->sortBy = $table->sortBy ?: 'login_time';
        $table->sortDirection = $table->sortDirection ?: 'desc';

		/* Display */
		\IPS\Output::i()->title		= \IPS\Member::loggedIn()->language()->addToStack('menu__loginlogs_logs');
		\IPS\Output::i()->output	= \IPS\Theme::i()->getTemplate( 'global', 'core' )->block( 'title', (string) $table );
	}
}