<?php
/**
 * @brief		gatewayPending Task
 * @author		<a href='http://www.invisionpower.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) 2001 - 2016 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/legal/standards/
 * @package		IPS Community Suite
 * @subpackage	nexus
 * @since		06 Jun 2016
 * @version		SVN_VERSION_NUMBER
 */

namespace IPS\nexus\tasks;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * gatewayPending Task
 */
class _gatewayPending extends \IPS\Task
{
	/**
	 * Execute
	 *
	 * If ran successfully, should return anything worth logging. Only log something
	 * worth mentioning (don't log "task ran successfully"). Return NULL (actual NULL, not '' or 0) to not log (which will be most cases).
	 * If an error occurs which means the task could not finish running, throw an \IPS\Task\Exception - do not log an error as a normal log.
	 * Tasks should execute within the time of a normal HTTP request.
	 *
	 * @return	mixed	Message to log or NULL
	 * @throws	\IPS\Task\Exception
	 */
	public function execute()
	{		
		$this->runUntilTimeout( function(){
			/* Try and get a transaction */
			try
			{
				/* Get it */
				$transaction = \IPS\Db::i()->select( '*', 'nexus_transactions', array( 't_status=?', \IPS\nexus\Transaction::STATUS_GATEWAY_PENDING ) )->first();
				$transaction = \IPS\nexus\Transaction::constructFromData( $transaction );
				
				/* Try to capture it */
				try
				{
					$transaction->capture();
				}
				catch ( \Exception $e )
				{
					return;
				}
				
				/* If it succeeded, take any fraud action */
				$fraudResult = $transaction->fraud_blocked ? $transaction->fraud_blocked->action : NULL;
				if ( $fraudResult )
				{
					$transaction->executeFraudAction( $fraudResult, TRUE );
				}
				if ( !$fraudResult or $fraudResult === \IPS\nexus\Transaction::STATUS_PAID )
				{
					$transaction->approve();
				}
				
				/* Let the customer know */
				$transaction->sendNotification();
				
			}
			/* If there's no transactions left, disable this task and return */
			catch ( \UnderflowException $e )
			{				
				$this->enabled = FALSE;
				$this->save();
				return FALSE;
			}
		});
	}
	
	/**
	 * Cleanup
	 *
	 * If your task takes longer than 15 minutes to run, this method
	 * will be called before execute(). Use it to clean up anything which
	 * may not have been done
	 *
	 * @return	void
	 */
	public function cleanup()
	{
		
	}
}