//<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */
 
class videos_hook_oembedsites extends _HOOK_CLASS_
{
	/**
	 * Override default oEmbed Sites
	 *
	 * @see		<a href="http://www.oembed.com">oEmbed</a>
	 * @return	array
	 */
	static public function oembedServices()
	{
		try
		{
		    /* Get our default sites first */
		    $defaultSites = call_user_func_array( 'parent::oembedServices', func_get_args() );
            
            /* Add our custom sites */
            $customSites = array();
            
            if( count( $mediaSites = \IPS\videos\MediaSite::roots( NULL, NULL, array( array( 'site_enabled=?', 1 ) ) ) ) )
            {
                foreach( $mediaSites as $site )
                {
                    $customSites[ $site->host ] = $site->oembed;    
                }  
                
                /* Return merged site list */
                return array_merge( $customSites, $defaultSites );      
            }
            
            /* Just return default sites */
            return $defaultSites;
		}
		catch ( \RuntimeException $e )
		{
			return call_user_func_array( 'parent::oembedServices', func_get_args() );
		}
	}
}