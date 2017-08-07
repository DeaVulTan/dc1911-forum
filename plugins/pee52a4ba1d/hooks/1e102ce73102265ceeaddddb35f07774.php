//<?php

class hook21 extends _HOOK_CLASS_
{
	/**
	 * View Topic
	 *
	 * @return	void
	 */
	protected function manage()
	{
		try
		{
			try
			{
				try
				{
					if( \IPS\Member::loggedIn()->inGroup( explode( ',', \IPS\Settings::i()->topicViewed_hideInList ) ) OR !\IPS\Member::loggedIn()->member_id )
					{
						return parent::manage();
					}
			
					try
					{
						$topic = \IPS\forums\Topic::loadAndCheckPerms( \IPS\Request::i()->id );
			
						if( \IPS\Settings::i()->topicViewed_forums === '0' OR in_array( $topic->forum_id, explode( ',', \IPS\Settings::i()->topicViewed_forums ) ) )
						{
							if( !\IPS\Settings::i()->topicViewed_uniqueVisit )
							{
								if( \IPS\Settings::i()->topicViewed_floodControl > 0 )
								{
									try
									{
										$visit = \IPS\Db::i()->select( '*', 'topic_viewedby', array( 'member_id=? AND tid=?', \IPS\Member::loggedIn()->member_id, \IPS\Request::i()->id ), 'id DESC' )->first();
						
										if( \IPS\DateTime::ts( $visit['dateview'] )->add( new \DateInterval( "PT".\IPS\Settings::i()->topicViewed_floodControl."M" ) ) < \IPS\DateTime::create()->setTimezone( new \DateTimeZone( \IPS\Member::loggedIn()->timezone ) ) )
										{
											\IPS\Db::i()->insert( 'topic_viewedby', array(
												'tid'		=> \IPS\Request::i()->id,
												'member_id'	=> \IPS\Member::loggedIn()->member_id,
												'dateview'	=> time()
											), TRUE );
										}
									}
									catch ( \UnderflowException $e )
									{
										\IPS\Db::i()->insert( 'topic_viewedby', array(
											'tid'		=> \IPS\Request::i()->id,
											'member_id'	=> \IPS\Member::loggedIn()->member_id,
											'dateview'	=> time()
										), TRUE );
									}
								}
								else
								{
									\IPS\Db::i()->insert( 'topic_viewedby', array(
										'tid'		=> \IPS\Request::i()->id,
										'member_id'	=> \IPS\Member::loggedIn()->member_id,
										'dateview'	=> time()
									), TRUE );
								}
							}
							else
							{
								try
								{
									$visit = \IPS\Db::i()->select( '*', 'topic_viewedby', array( 'member_id=? AND tid=?', \IPS\Member::loggedIn()->member_id, \IPS\Request::i()->id ), 'id DESC' )->first();
						
									\IPS\Db::i()->update( 'topic_viewedby', array( 'dateview' => time() ), 'id=' . $visit['id'] );
								}
								catch ( \UnderflowException $e )
								{
									\IPS\Db::i()->insert( 'topic_viewedby', array(
										'tid'		=> \IPS\Request::i()->id,
										'member_id'	=> \IPS\Member::loggedIn()->member_id,
										'dateview'	=> time()
									), TRUE );
								}
							}
						}
		
		
		
						return parent::manage();
					}
					catch ( \OutOfRangeException $e )
					{
						return parent::manage();
					}
				}
				catch ( \RuntimeException $e )
				{
					if ( method_exists( get_parent_class(), __FUNCTION__ ) )
					{
						return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
					}
					else
					{
						throw $e;
					}
				}
			}
			catch ( \RuntimeException $e )
			{
				if ( method_exists( get_parent_class(), __FUNCTION__ ) )
				{
					return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
				}
				else
				{
					throw $e;
				}
			}
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}

	/**
	 * View Topic Readers
	 *
	 * @return	void
	 */
	protected function readers()
	{
		try
		{
			try
			{
				try
				{
					if( \IPS\Settings::i()->topicViewed_canViewList != '*' AND !\IPS\Member::loggedIn()->inGroup( explode( ',', \IPS\Settings::i()->topicViewed_canViewList ) ) )
					{
						\IPS\Output::i()->error( 'no_module_permission', '2D161/B', 403, '' );
					}
					
					$topic = \IPS\forums\Topic::loadAndCheckPerms( \IPS\Request::i()->id );
						
					$table = new \IPS\Helpers\Table\Db( 'topic_viewedby', $topic->url()->setQueryString( 'do', 'readers' ), array( array( 'tid=?', \IPS\Request::i()->id ) ) );
						
					$table->joins = array(
						array( 'select' => 'm.*', 'from' => array( 'core_members', 'm' ), 'where' => "m.member_id=topic_viewedby.member_id" )
					);
			
					$table->sortBy 			= \IPS\Settings::i()->topicViewed_sortBy;
					$table->sortDirection 	= \IPS\Settings::i()->topicViewed_sortOrder;
						
					$table->tableTemplate 	= array( \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' ), 'whoReadTheTopicTable' );
					$table->rowsTemplate 	= array( \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' ), 'whoReadTheTopicRows' );
					$table->limit			= 15;
						
					\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' )->whoReadTheTopicGeneral(  (string) $table );
				}
				catch ( \RuntimeException $e )
				{
					if ( method_exists( get_parent_class(), __FUNCTION__ ) )
					{
						return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
					}
					else
					{
						throw $e;
					}
				}
			}
			catch ( \RuntimeException $e )
			{
				if ( method_exists( get_parent_class(), __FUNCTION__ ) )
				{
					return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
				}
				else
				{
					throw $e;
				}
			}
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}
}