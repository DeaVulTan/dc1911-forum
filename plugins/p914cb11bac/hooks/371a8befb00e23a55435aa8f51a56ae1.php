//<?php

class hook80 extends _HOOK_CLASS_
{
	/**
	 * Get Review Voters List
	 *
	 */
	protected function voters()
	{
		try
		{
			$file 	 = \IPS\downloads\File::load( \IPS\Request::i()->fid );
		
			/* Permission check */
			if( \IPS\Settings::i()->reviewVoters_author AND \IPS\Member::loggedIn()->member_id > 0 AND \IPS\Member::loggedIn()->member_id != $file->mapped('author') AND \IPS\Settings::i()->reviewVoters_groups != 'all' AND !\IPS\Member::loggedIn()->inGroup( explode( ',', \IPS\Settings::i()->reviewVoters_groups ) ) )
			{
				\IPS\Output::i()->error( 'no_module_permission', '2B201/3', 403, '' );
			}
		
			$review = \IPS\downloads\File\Review::load( \IPS\Request::i()->rid );
			$voters	= $review->mapped('votes_data');
			$who 	= json_decode( $voters, TRUE );
	
			foreach( $who as $key => $member )
			{
				$members[] = $key;
			}
		
			$where = \IPS\Db::i()->in( 'member_id', $members );
		
			$table = new \IPS\Helpers\Table\Db( 'core_members', $file->url()->setQueryString( array( 'do' => 'voters', 'review_id' => $rid, 'review_fid' => $fid  ) ), array( $where ) );
		
			$table->tableTemplate = array( \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' ), 'logTableReviewVoters' );
			$table->rowsTemplate = array( \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' ), 'logRowsReviewVoters' );
			$table->sortBy = 'member_id';
			$table->limit = 5;
			\IPS\Output::i()->output = \IPS\Theme::i()->getTemplate( 'plugins', 'core', 'global' )->logReviewVoters( $rid, (string) $table );
		
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