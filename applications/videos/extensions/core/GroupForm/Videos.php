<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\extensions\core\GroupForm;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Admin CP Group Form
 */
class _Videos
{
	/**
	 * Process Form
	 *
	 * @param	\IPS\Form\Tabbed		$form	The form
	 * @param	\IPS\Member\Group		$group	Existing Group
	 * @return	void
	 */
	public function process( &$form, $group )
	{	
        /* Videos Management */
		$form->addHeader( 'videos_management' );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_view', $group->g_vs_view ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_add_video', $group->g_vs_add_video ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_edit_video', $group->g_vs_edit_video ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_delete_video', $group->g_vs_delete_video ) );        
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_rate_video', $group->g_vs_rate_video ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_rate_video_change', $group->g_vs_rate_video_change ) );        
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_report_video', $group->g_vs_report_video ) );   
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_embed_video', $group->g_vs_embed_video ) ); 
                
        /* Comments Management */
		$form->addHeader( 'video_comments_management' );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_view_comments', $group->g_vs_view_comments ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_add_comments', $group->g_vs_add_comments ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_edit_comments', $group->g_vs_edit_comments ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_delete_comments', $group->g_vs_delete_comments ) );
		$form->add( new \IPS\Helpers\Form\Number( 'g_vs_comments_per_member', $group->g_vs_comments_per_member, FALSE, array( 'unlimited' => 0, 'unlimitedLang' => 'unlimited' ) ) );

        /* Moderate Management */
		$form->addHeader( 'video_moderate_management' );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_m_edit_videos', $group->g_vs_m_edit_videos ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_m_delete_videos', $group->g_vs_m_delete_videos ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_m_edit_comments', $group->g_vs_m_edit_comments ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_m_delete_comments', $group->g_vs_m_delete_comments ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'g_vs_m_manage', $group->g_vs_m_manage ) ); 
	}
	
	/**
	 * Save
	 *
	 * @param	array				$values	Values from form
	 * @param	\IPS\Member\Group	$group	The group
	 * @return	void
	 */
	public function save( $values, &$group )
	{
	    /* Setup list of our permissions */
	    $ourPermissions = array( 'g_vs_view', 'g_vs_add_video', 'g_vs_edit_video', 'g_vs_delete_video', 'g_vs_rate_video', 'g_vs_rate_video_change',
                                 'g_vs_report_video', 'g_vs_embed_video', 'g_vs_view_comments', 'g_vs_add_comments', 'g_vs_edit_comments',
                                 'g_vs_delete_comments', 'g_vs_comments_per_member', 'g_vs_m_edit_videos', 'g_vs_m_delete_videos', 
                                 'g_vs_m_edit_comments', 'g_vs_m_delete_comments', 'g_vs_m_manage' );
        
        /* Go through and save */                      
        foreach( $ourPermissions as $perm )
        {
            $group->$perm = (int) $values[ $perm ];   
        }
	}
}