<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */
 
namespace IPS\videos\Video;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

class _Thumbnail
{
	public function busy()
	{
	}    
    
	/**
	 * Default oEmbed Sites
	 * @return	array
	 */
	protected static function oembedSites()
	{
		return array(
			'vine.co'						=> 'https://vine.co/oembed.json',        
			'youtube.com'					=> 'https://www.youtube.com/oembed',
			'youtu.be'						=> 'https://www.youtube.com/oembed',
			'flickr.com'					=> 'http://www.flickr.com/services/oembed/',
			'flic.kr'						=> 'http://www.flickr.com/services/oembed/',
			'hulu.com'						=> 'http://www.hulu.com/api/oembed.json',
			'vimeo.com'						=> 'http://vimeo.com/api/oembed.json',
			'collegehumor.com'				=> 'http://www.collegehumor.com/oembed.json',
			'twitter.com'					=> 'https://api.twitter.com/1/statuses/oembed.json',
			'instagr.am'					=> 'http://api.instagram.com/oembed',
			'instagram.com'					=> 'http://api.instagram.com/oembed',
			'soundcloud.com'				=> 'http://soundcloud.com/oembed',
			'open.spotify.com'				=> 'https://embed.spotify.com/oembed/',
			'play.spotify.com'				=> 'https://embed.spotify.com/oembed/',
			'ted.com'						=> 'http://www.ted.com/talks/oembed.json',
		);
	}
    
	/**
	 * Get thumbnail url from oembed url
	 *
	 * @param	string		$url		The URL
	 * @return	string|null	Thumbnail url, or NULL if URL is not embeddable
	 */
	public static function getThumb( $url )
	{
	    if( !$url )
        {
            return null;
        }
       
		/* Init */
		$parsedUrl = parse_url( $url );
        
		$domain = $parsedUrl['host'];
		if ( mb_substr( $domain, 0, 4 ) === 'www.' )
		{
			$domain = mb_substr( $domain, 4 );
		}
        
        /* Return now */
		if( !$domain )
		{
			return null;
		}
  		
		/* Get already combined list */
        $oembedSites = \IPS\Text\Parser::oembedServices();
        
        /* Use our local backup in case */
        if( !count( $oembedSites ) )
        {
            $oembedSites = static::oembedSites();    
        }            

		if ( array_key_exists( $domain, $oembedSites ) )
		{
			try
			{
				$oembedUrl = \IPS\Http\Url::external( $oembedSites[ $domain ] )->setQueryString( array( 'format' => 'json', 'url' => $url, 'scheme' => ( $parsedUrl['scheme'] === 'https' or \IPS\Request::i()->isSecure() ) ? 'https' : null ) );
                $response = $oembedUrl->request()->get()->decodeJson();
				
				if( !isset( $response['type'] ) )
				{
					throw new \RuntimeException( 'NO_EMBED_TYPE' );
				}
                
                /* Return if successful */
                return ( isset( $response['thumbnail_url'] ) AND $response['thumbnail_url'] ) ? $response['thumbnail_url'] : NULL;
			}
			catch ( \Exception $e ) {}
		}
        
		/* Check facebook content */
		if( $domain == 'facebook.com' )
		{
			/* Check url matches */
			if( !preg_match( '/^https:\/\/www\.facebook\.com\/(.+?\/permalink\/|photo\.php|(.+?)\/posts\/)/i', $url ) )
			{
				return NULL;
			}
            
            /* Get video id from query */
            $videoID = str_replace( 'v=', '', $parsedUrl['query'] );

			$apiUrl = \IPS\Http\Url::external( "https://graph.facebook.com/{$videoID}/picture?redirect=false" );
            $response = $apiUrl->request()->get()->decodeJson(); 
            
            /* Return if successful */
            return ( isset( $response['url'] ) AND $response['url'] ) ? $response['url'] : NULL;            
		}
		
		/* Just return nothing */
		return NULL;
	}                 
}
