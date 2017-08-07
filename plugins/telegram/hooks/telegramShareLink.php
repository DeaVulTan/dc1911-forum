//<?php

class hook58 extends _HOOK_CLASS_
{
		/**
	 * Node Class
	 */
	protected $nodeClass = '\IPS\core\ShareLinks\Service';
	
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		try
		{
			try
			{
				\IPS\Dispatcher::i()->checkAcpPermission( 'sharelinks_manage' );
				
				$reloadRoots	= FALSE;
				
				/* First, see if any are missing */
				$nodeClass = $this->nodeClass;
				
				$className	= 'Telegram';
				
				try
				{
					$nodeClass::load( mb_strtolower( $className ), 'share_key' );
				}
				catch( \OutOfRangeException $e )
				{
					/* Class does not exist - let's add it */
					$newService	= new \IPS\core\ShareLinks\Service;
					$newService->key		= mb_strtolower( $className );
					$newService->groups		= '*';
					$newService->title		= 'Telegram';
					$newService->enabled	= 0;
					$newService->save();
					
					$reloadRoots	= TRUE;
				}
				
				if( $reloadRoots === TRUE )
				{
					$nodeClass::resetRootResult();
				}
				
				return parent::execute();
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