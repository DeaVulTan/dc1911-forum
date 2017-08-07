//<?php
/**
 * SolutionrDEVs Application
 * (SD) Auto Tagging
 *
 * @author      Dawid Baruch <dawid.baruch@solutiondevs.pl>
 * @copyright   (c) 2005 - 2015 SolutionDEVs
 * @package     SolutionDEVs Apps
 * @subpackage  PHP
 * @link        http://www.solutiondevs.pl
 * @link        http://www.ipsbeyond.pl
 * @version     1.0.2
 *
 */

class hook105 extends _HOOK_CLASS_
{
	/**
	 * Process create/edit form
	 *
	 * @param	array				$values	Values from form
	 * @return	void
	 */
	public function processForm( $values )
	{
		try
		{
	        if( \IPS\Settings::i()->sd_autotag_enable && ( \IPS\Settings::i()->sd_autotag_forums == 0 || in_array( \IPS\Request::i()->id, explode( ',', \IPS\Settings::i()->sd_autotag_forums ) ) ) && !intval( $this->tid ) )
	        {
	            $cTags = explode( ' ', $values[ 'topic_title' ] );
	            
	            foreach( $cTags as $tag ) 
	            {
	                $tag = trim( $tag );
	                
	                if( mb_strlen( $tag ) >= \IPS\Settings::i()->sd_autotag_min_length )
	                {
	                    $values[ 'topic_tags' ][] = mb_strtolower( $tag );
	                }
	            }
	        }
	            
	        parent::processForm( $values ); 
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