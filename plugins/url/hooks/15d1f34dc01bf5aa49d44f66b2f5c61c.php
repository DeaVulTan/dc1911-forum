//<?php

class hook104 extends _HOOK_CLASS_
{

	/**
	 * Parse Node
	 *
	 * @param	\DOMDocument		$document	The document
	 * @param	\DOMElement			$node		The node to parse
	 * @param	\DOMElement|null	$parent		The parent node to place $node into
	 * @return	bool				If the node contains any contents
	 */
	protected function parseNode( $document, $node, $parent=NULL ) {
		try
		{
			if($par = parent::parseNode( $document, $node, $parent ) AND isset($node->tagName) AND $node->tagName == 'body' ) {
				$links = $document->getElementsByTagName("a");
				if($links->length > 0)
				foreach ($links as $link) {
					
					// $href = filter_var($link->nodeValue, FILTER_VALIDATE_URL)
					if($link->attributes->getNamedItem('href') AND $href = filter_var($link->attributes->getNamedItem('href')->nodeValue, FILTER_VALIDATE_URL) AND $parsed = \IPS\Http\Url::utf8ParseUrl($href) AND preg_match('#^https?#i', $parsed['scheme'])) {
						// TODO: Add Force option
						$pos = \strpos($link->nodeValue, $parsed['host']);
						if( $pos === 0 || $pos === 7 || $pos === 8 ) { // TODO: Make it better
	
							$heads = @get_headers($href, 1);
							if(!$heads) continue;
							$heads['Content-Length'] = isset($heads['Content-Length']) ?: 0;
							if(preg_match('/HTTP\/1\.\d\s(?!404+)/i', $heads[0]) AND intval($heads['Content-Length']) < 5120000) {
								$response = \IPS\Http\Url::external( $href )->request()->get();
								preg_match( '/^([^;]+)(?:;\s*charset=(.*))?/im', $response->httpHeaders['Content-Type'], $matches );
								if(isset($matches[1]) && $matches[1] == 'text/html' && preg_match('#<title[^>]*>(.*)</title>#siU', $response->content, $match)) {
									if(isset($matches[2]) && \strtolower($matches[2]) != 'utf-8' && function_exists('mb_convert_encoding')) {
										$match[1] = @mb_convert_encoding($match[1], 'utf-8', $matches[2]);
									}
									unset($response);
									$link->nodeValue = $match[1];
								}
							}
						}
					}
				}
			}
			return $par;
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