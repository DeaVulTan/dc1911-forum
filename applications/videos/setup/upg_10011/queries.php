<?php

# v2.2.1
$SQL[] = "ALTER TABLE core_groups ADD g_vs_embed_video TINYINT(1) NOT NULL DEFAULT '0';";
$SQL[] = "DELETE FROM core_sys_conf_settings WHERE conf_key IN ('vs_video_type','vs_social_bookmarks_integration');";
