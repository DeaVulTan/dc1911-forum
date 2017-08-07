<?php

# v2.3.0
$SQL[] = "ALTER TABLE videos_videos ADD featured TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE videos_cat ADD cat_only TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "ALTER TABLE videos_videos ADD extra_videos text NOT NULL;";
$SQL[] = "ALTER TABLE videos_videos ADD extra_videos_cached text NOT NULL;";

# Change of field name
$SQL[] = "ALTER TABLE videos_videos CHANGE thumbnail_upload thumbnail_type TINYINT(1) NOT NULL DEFAULT '0';";
