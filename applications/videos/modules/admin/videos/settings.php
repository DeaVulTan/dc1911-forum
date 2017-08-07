<?php
/**
 * @package		Videos
 * @author		<a href='http://www.devfuse.com'>DevFuse</a>
 * @copyright	(c) 2015 DevFuse
 */

namespace IPS\videos\modules\admin\videos;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * settings
 */
class _settings extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		\IPS\Dispatcher::i()->checkAcpPermission( 'settings_manage' );
		parent::execute();
	}

	/**
	 * Manage Settings
	 *
	 * @return	void
	 */
	protected function manage()
	{
		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack('settings');
        
        $tags = array();

		$form = new \IPS\Helpers\Form;

        /* Form Settings */
        $form->addTab( 'videos_settings' );
        $form->addHeader( 'video_portal_settings' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_enable_rss', \IPS\Settings::i()->vs_enable_rss, FALSE, array(), NULL, NULL, NULL, 'vs_enable_rss' ) ); 
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_extra_videos', \IPS\Settings::i()->vs_extra_videos, FALSE, array(), NULL, NULL, NULL, 'vs_extra_videos' ) );       
        $form->add( new \IPS\Helpers\Form\Number( 'vs_members_videos_box_limit', \IPS\Settings::i()->vs_members_videos_box_limit, FALSE, array(), NULL, NULL, NULL, 'vs_members_videos_box_limit' ) );
        $form->add( new \IPS\Helpers\Form\Select( 'vs_members_videos_box_sort_by', \IPS\Settings::i()->vs_members_videos_box_sort_by, FALSE, array( 'options' => array( 'date' => 'vs_members_videos_box_sort_by_date_added_sort', 'last_updated' => 'vs_members_videos_box_sort_by_last_updated_sort', 'title' => 'vs_members_videos_box_sort_by_title_sort', 'views' => 'vs_members_videos_box_sort_by_views_sort', 'video_rating' => 'vs_members_videos_box_sort_by_rating_sort' ) ), NULL, NULL, NULL, 'vs_members_videos_box_sort_by' ) );
        $form->add( new \IPS\Helpers\Form\Select( 'vs_members_videos_box_sort_order', \IPS\Settings::i()->vs_members_videos_box_sort_order, FALSE, array( 'options' => array( 'desc' => 'vs_members_videos_box_sort_order_desc_sort', 'asc' => 'vs_members_videos_box_sort_order_asc_sort' ) ), NULL, NULL, NULL, 'vs_members_videos_box_sort_order' ) );

        $form->addHeader( 'videos_setting_Header' );
       	$form->add( new \IPS\Helpers\Form\Number( 'vs_max_video_width', \IPS\Settings::i()->vs_max_video_width, FALSE, array( 'unlimited' => 0 ), NULL, NULL, 'px' ) );
        $form->add( new \IPS\Helpers\Form\Select( 'vs_default_video_type', \IPS\Settings::i()->vs_default_video_type, FALSE, array( 'options' => array( 'media_url' => 'videotype__media_url', 'media_embed' => 'videotype__media_embed', 'media_upload' => 'videotype__media_upload', 'media_upload_url' => 'videotype__media_upload_url' ) ), NULL, NULL, NULL, 'vs_default_video_type' ) );           
        $form->add( new \IPS\Helpers\Form\Select( 'vs_default_thumbnail_type', \IPS\Settings::i()->vs_default_thumbnail_type, FALSE, array( 'options' => array( 0 => 'thumbtype__0', 1 => 'thumbtype__1', 2 => 'thumbtype__2' ) ), NULL, NULL, NULL, 'vs_default_thumbnail_type' ) );           

        $form->addHeader( 'video_featured_settings' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_featured_videos', \IPS\Settings::i()->vs_featured_videos, FALSE, array( 'togglesOn' => array( 'vs_featured_embed' ) ), NULL, NULL, NULL, 'vs_featured_videos' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_featured_embed', \IPS\Settings::i()->vs_featured_embed, FALSE, array(), NULL, NULL, NULL, 'vs_featured_embed' ) );

        $form->addHeader( 'video_checks' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_add_approval', \IPS\Settings::i()->vs_add_approval, FALSE, array(), NULL, NULL, NULL, 'vs_add_approval' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_edit_approval', \IPS\Settings::i()->vs_edit_approval, FALSE, array(), NULL, NULL, NULL, 'vs_edit_approval' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_duplicate_media_url', \IPS\Settings::i()->vs_duplicate_media_url, FALSE, array(), NULL, NULL, NULL, 'vs_duplicate_media_url' ) );

        $form->addHeader( 'video_comments' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_enable_comments', \IPS\Settings::i()->vs_enable_comments, FALSE, array(), NULL, NULL, NULL, 'vs_enable_comments' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_comment_moderation', \IPS\Settings::i()->vs_comment_moderation, FALSE, array(), NULL, NULL, NULL, 'vs_comment_moderation' ) );
        $form->add( new \IPS\Helpers\Form\Number( 'vs_comments_per_page', \IPS\Settings::i()->vs_comments_per_page, FALSE, array(), NULL, NULL, NULL, 'vs_comments_per_page' ) );

        $form->addTab( 'video_thumbnails_uploads' );
        $form->addHeader( 'video_thumbnails_settings' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_enable_thumbnail', \IPS\Settings::i()->vs_enable_thumbnail, FALSE, array( 'togglesOn' => array( 'vs_thumbnail_upload', 'vs_enable_thumbnail_url', 'vs_image_extensions', 'vs_image_maximum_dimensions', 'vs_standard_thumbnail' ) ), NULL, NULL, NULL, 'vs_enable_thumbnail' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_thumbnail_upload', \IPS\Settings::i()->vs_thumbnail_upload, FALSE, array(), NULL, NULL, NULL, 'vs_thumbnail_upload' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_enable_thumbnail_url', \IPS\Settings::i()->vs_enable_thumbnail_url, FALSE, array(), NULL, NULL, NULL, 'vs_enable_thumbnail_url' ) );
        $form->add( new \IPS\Helpers\Form\Text( 'vs_image_extensions', \IPS\Settings::i()->vs_image_extensions, FALSE, array( 'autocomplete' => array( 'unique' => 'true' ) ), NULL, NULL, NULL, 'vs_image_extensions' ) );
        $form->add( new \IPS\Helpers\Form\WidthHeight( 'vs_image_maximum_dimensions', \IPS\Settings::i()->vs_image_maximum_dimensions ? explode( ',', \IPS\Settings::i()->vs_image_maximum_dimensions ) : array( 0, 0 ), FALSE, array( 'resizableDiv' => FALSE ), NULL, NULL, NULL, 'vs_image_maximum_dimensions' ) );
        $form->add( new \IPS\Helpers\Form\WidthHeight( 'vs_standard_thumbnail', \IPS\Settings::i()->vs_standard_thumbnail ? explode( ',', \IPS\Settings::i()->vs_standard_thumbnail ) : array( 0, 0 ), FALSE, array( 'resizableDiv' => FALSE ), NULL, NULL, NULL, 'vs_standard_thumbnail' ) );

        $form->addHeader( 'video_uploads' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_video_upload', \IPS\Settings::i()->vs_video_upload, FALSE, array( 'togglesOn' => array( 'vs_submit_video_url', 'vs_video_upload_extensions', 'vs_video_upload_size' ) ), NULL, NULL, NULL, 'vs_video_upload' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_submit_video_url', \IPS\Settings::i()->vs_submit_video_url, FALSE, array(), NULL, NULL, NULL, 'vs_submit_video_url' ) );
        $form->add( new \IPS\Helpers\Form\Text( 'vs_video_upload_extensions', \IPS\Settings::i()->vs_video_upload_extensions, FALSE, array( 'autocomplete' => array( 'unique' => 'true' ) ), NULL, NULL, NULL, 'vs_video_upload_extensions' ) );
        $form->add( new \IPS\Helpers\Form\Number( 'vs_video_upload_size', \IPS\Settings::i()->vs_video_upload_size, FALSE, array(), NULL, NULL, 'kB', 'vs_video_upload_size' ) );
         
        $form->addTab( 'video_topic_settings' );         
        $form->addHeader( 'video_topic_settings' );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_create_topic', \IPS\Settings::i()->vs_create_topic, FALSE, array( 'togglesOn' => array( 'vs_topic_own', 'vs_topic_author', 'vs_topic_forum', 'vs_topic_title', 'vs_topic_template' ) ), NULL, NULL, NULL, 'vs_create_topic' ) );
        $form->add( new \IPS\Helpers\Form\YesNo( 'vs_topic_own', \IPS\Settings::i()->vs_topic_own, FALSE, array( 'togglesOff' => array( 'vs_topic_author' ) ), NULL, NULL, NULL, 'vs_topic_own' ) );
        $form->add( new \IPS\Helpers\Form\Member( 'vs_topic_author', ( \IPS\Settings::i()->vs_topic_author ) ? \IPS\Member::load( \IPS\Settings::i()->vs_topic_author ) : \IPS\Member::loggedIn(), FALSE, array(), NULL, NULL, NULL, 'vs_topic_author' ) );
        $form->add( new \IPS\Helpers\Form\Translatable( 'vs_topic_title', NULL, FALSE, array( 'app' => 'videos', 'key' => 'vs_topic_title_value' ), NULL, NULL, NULL, 'vs_topic_title' ) );
        $form->add( new \IPS\Helpers\Form\Node( 'vs_topic_forum', \IPS\Settings::i()->vs_topic_forum ?: 0, FALSE, array( 'class' => 'IPS\forums\Forum', 'multiple' => FALSE, 'zeroVal' => 'vs_topic_forum_zeroVal', 'permissionCheck' => function ( $forum ) { return $forum->sub_can_post and !$forum->redirect_url; } ), NULL, NULL, NULL, 'vs_topic_forum' ) );
        $form->add( new \IPS\Helpers\Form\Translatable( 'vs_topic_template', NULL, FALSE, array( 'app' => 'videos', 'key' => 'vs_topic_template_value', 'editor' => array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'vs_topic_template', 'attachIds' => array( NULL, NULL, 'vs_topic_template' ), 'tags' => $tags ) ), NULL, NULL, NULL, 'vs_topic_template' ) );     
          
		if ( $values = $form->values() )
		{
		    /* Save translatable fields */
			foreach ( array( 'vs_topic_title' => 'vs_topic_title_value', 'vs_topic_template' => 'vs_topic_template_value' ) as $k => $v )
			{
                if ( array_key_exists( $k, $values ) )
    			{				 
				    \IPS\Lang::saveCustom( 'videos', $v, $values[ $k ] );
				    unset( $values[ $k ] );
                }
			}		  
          
       	    if ( !empty( $values[ 'vs_topic_author' ] ) and $values[ 'vs_topic_author' ]->member_id )
            {
                $values[ 'vs_topic_author' ] = $values[ 'vs_topic_author' ]->member_id;
            }     
            if ( !empty( $values['vs_image_maximum_dimensions'] ) and $values['vs_image_maximum_dimensions'] )
            {
                $values[ 'vs_image_maximum_dimensions' ] = implode( ',', $values['vs_image_maximum_dimensions'] );
            }
            if ( !empty( $values['vs_standard_thumbnail'] ) and $values['vs_standard_thumbnail'] )
            {
                $values[ 'vs_standard_thumbnail' ] = implode( ',', $values['vs_standard_thumbnail'] );
            }					    
            if ( !empty( $values[ 'vs_topic_forum' ] ) and $values[ 'vs_topic_forum' ]->_id )
            {
                $values[ 'vs_topic_forum' ] = $values[ 'vs_topic_forum' ]->_id;
            }
		    
            $form->saveAsSettings( $values );
		}

		\IPS\Output::i()->output = $form;
	}
}