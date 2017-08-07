<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

try
{
\IPS\Db::i()->dropTable( 'topic_viewedby' );
}
catch( \IPS\Db\Exception $e )
{
	/* Ignore "Cannot drop because it does not exist" */
	if( $e->getCode() <> 1051 )
	{
		throw $e;
	}
}