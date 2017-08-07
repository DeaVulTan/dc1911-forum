<?php

# v3.0.0
# Delete old settings
$SQL[] = "DELETE FROM core_sys_conf_settings WHERE conf_key IN ('vs_members_videos_box_where','vs_members_videos_box_show', 'vs_pm_enable', 'vs_pm_author', 'vs_image_maximum_size', 'vs_image_url', 'vs_image_path');";

# Add category tagging
$SQL[] = "ALTER TABLE videos_cat ADD tags_disabled TINYINT NOT NULL DEFAULT '0',
	ADD tags_noprefixes TINYINT NOT NULL DEFAULT '0',
	ADD tags_predefined TEXT NULL DEFAULT NULL;";

# Modify news comments table
$SQL[] = "ALTER TABLE videos_comments ADD ip_address VARCHAR( 46 ) NULL ;";
$SQL[] = "ALTER TABLE videos_comments ADD comment_edit_time INT( 11 ) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE videos_comments ADD comment_edit_name VARCHAR( 255 ) NULL ;";
$SQL[] = "ALTER TABLE videos_comments ADD comment_append_edit TINYINT( 1 ) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE videos_comments ADD comment_approved TINYINT( 1 ) NOT NULL DEFAULT '1';";
$SQL[] = "ALTER TABLE videos_comments DROP members_seo_name;";

$SQL[] = "ALTER TABLE videos_cat ADD cat_rules MEDIUMTEXT NULL;";

$SQL[] = "ALTER TABLE videos ADD video_info MEDIUMTEXT NULL;";
$SQL[] = "ALTER TABLE videos CHANGE embed embed TEXT NULL;";
$SQL[] = "ALTER TABLE videos CHANGE video_data video_data TEXT NULL;";
$SQL[] = "ALTER TABLE videos ADD topic_seo VARCHAR( 250 ) NULL;";
