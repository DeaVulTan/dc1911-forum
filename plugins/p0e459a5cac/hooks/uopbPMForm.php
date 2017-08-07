//<?php

class hook109 extends _HOOK_CLASS_
{
	/**
	 * Get elements for add/edit form
	 *
	 * @param	\IPS\Content\Item|NULL	$item		The current item if editing or NULL if creating
	 * @param	int						$container	Container (e.g. forum) ID, if appropriate
	 * @return	array
	 */
	public static function formElements( $item=NULL, \IPS\Node\Model  $container=NULL )
	{
		try
		{
			$formElements = parent::formElements( $item, $container );
	
			if( \IPS\Settings::i()->uopbEmbedPost AND isset( \IPS\Request::i()->fromPost ) AND \IPS\Request::i()->fromPost )
			{
				$post 	= \IPS\forums\Topic\Post::load( \IPS\Request::i()->fromPost );
				$topic	= \IPS\forums\Topic::load( $post->topic_id );
				$link	= $topic->url()->setQueryString( array( 'do' => 'findComment', 'comment' => \IPS\Request::i()->fromPost ) );
				$formElements['content']->value = $link;
			}
	
			return $formElements;
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