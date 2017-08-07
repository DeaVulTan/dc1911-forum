<?php

$SQL[] = "ALTER TABLE videos_rate ADD r_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY;";
$SQL[] = "ALTER TABLE videos ADD thumbnail text NOT NULL;";	
$SQL[] = "ALTER TABLE videos ADD video_type varchar(255) NOT NULL default 'media_embed';";	
$SQL[] = "ALTER TABLE videos ADD video_data text NOT NULL;";	
$SQL[] = "ALTER TABLE videos ADD seo_title varchar(255) NOT NULL;";	
$SQL[] = "ALTER TABLE videos_cat ADD seo_name VARCHAR( 255 ) NOT NULL;";
$SQL[] = "ALTER TABLE videos_cat ADD c_options text NOT NULL;";	
$SQL[] = "ALTER TABLE videos_cat ADD c_info text NOT NULL;";

$SQL[] = "ALTER TABLE groups ADD g_vs_view TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_view_offline TINYINT(1) NOT NULL DEFAULT '0';";

$SQL[] = "ALTER TABLE groups ADD g_vs_add_video TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_edit_video TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_delete_video TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_rate_video TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_rate_video_change TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_report_video TINYINT(1) NOT NULL DEFAULT '1';";

$SQL[] = "ALTER TABLE groups ADD g_vs_view_comments TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_add_comments TINYINT(1) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE groups ADD g_vs_edit_comments TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_delete_comments TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_comments_per_member varchar(10) NOT NULL DEFAULT '-1';";

$SQL[] = "ALTER TABLE groups ADD g_vs_m_edit_videos TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_m_delete_videos TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_m_edit_comments TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_m_delete_comments TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE groups ADD g_vs_m_manage TINYINT(1) NOT NULL DEFAULT '0';";

$SQL[] = "DELETE FROM core_sys_conf_settings WHERE conf_key IN ('vs_comments','vs_enable_bookmarking','vs_enable_rss_feed','vs_enable_rss_feed','vs_topic_enable','vs_manage','vs_pm_message','vs_delete','vs_edit','vs_add','vs_view','vs_pm_title','vs_flagging_message','vs_enable_flagging','vs_disable_flagging','vs_flagging_author','vs_approve');";
