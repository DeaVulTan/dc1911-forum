<?php

# v2.1.0 change
$SQL[] = "ALTER TABLE videos_videos ADD num_comments MEDIUMINT(5) NOT NULL default '0';";
$SQL[] = "ALTER TABLE videos_videos ADD num_votes MEDIUMINT(5) NOT NULL default '0';";
$SQL[] = "ALTER TABLE videos_videos ADD video_rating DOUBLE(3,2) NOT NULL default '0';";
$SQL[] = "ALTER TABLE videos_videos ADD members_seo_name VARCHAR(255) NOT NULL;";
$SQL[] = "ALTER TABLE videos_cat ADD video_ids_cache TEXT NULL;";
$SQL[] = "ALTER TABLE videos_comments ADD members_seo_name VARCHAR(255) NOT NULL;";

$SQL[] = "ALTER TABLE videos_videos CHANGE date date INT(10) NOT NULL default '0';";
$SQL[] = "ALTER TABLE videos_videos CHANGE thumbnail thumbnail VARCHAR(250) NOT NULL default '';";
//$SQL[] = "ALTER TABLE videos_rate CHANGE ratings ratings TINYINT(1) NOT NULL default '0';";

$SQL[] = "ALTER TABLE videos_comments ADD INDEX ( video_id );";
//$SQL[] = "ALTER TABLE videos_rate ADD INDEX ( tid );";
$SQL[] = "ALTER TABLE videos_videos ADD INDEX ( date );";