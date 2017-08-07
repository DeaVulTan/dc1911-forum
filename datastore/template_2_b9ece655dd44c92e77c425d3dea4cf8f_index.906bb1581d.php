<?php

return <<<'VALUE'
"namespace IPS\\Theme;\nclass class_forums_front_index extends \\IPS\\Theme\\Template\n{\n\t\t\tfunction forumGridItem( $forum ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( $forum->can('view') ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n\n$lastPost = $forum->lastPost();\n$return .= <<<CONTENT\n\n\t<div class=\"ipsDataItem ipsGrid_span4 ipsAreaBackground_reset cForumGrid \nCONTENT;\n\nif ( \\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\ncForumGrid_unread ipsDataItem_unread\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n ipsClearfix\" data-forumID=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->_id, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\">\n\n\t\t<div class='ipsPhotoPanel ipsPhotoPanel_mini ipsClearfix ipsPad ipsAreaBackground_light cForumGrid_forumInfo'>\n\t\t\t<span class='ipsPos_left'>\n\t\t\t\t\nCONTENT;\n\nif ( !$forum->redirect_on AND \\IPS\\forums\\Topic::containerUnread( $forum ) AND \\IPS\\Member::loggedIn()->member_id ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( 'do', 'markRead' )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" data-action='markAsRead'>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\nCONTENT;\n\nif ( $forum->icon ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<img src=\"\nCONTENT;\n\n$return .= \\IPS\\File::get( \"forums_Icons\", $forum->icon )->url;\n$return .= <<<CONTENT\n\" class='cForumGrid_icon \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\nCONTENT;\n\nif ( $forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_redirect \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t\t<i class='fa fa-arrow-right'><\/i>\n\t\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nelseif ( $forum->forums_bitoptions['bw_enable_answers'] ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_answers \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t\t<i class='fa fa-question'><\/i>\n\t\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nelseif ( $forum->password ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_password \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t\t\nCONTENT;\n\nif ( $forum->loggedInMemberHasPasswordAccess() ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t\t<i class='fa fa-unlock'><\/i>\n\t\t\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t\t<i class='fa fa-lock'><\/i>\n\t\t\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_normal \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t\t<i class=\"fa fa-comments\"><\/i>\n\t\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( !$forum->redirect_on AND \\IPS\\forums\\Topic::containerUnread( $forum ) AND \\IPS\\Member::loggedIn()->member_id ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<\/a>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t<\/span>\n\t\t\t<div>\n\t\t\t\t<h3 class='ipsType_reset ipsType_sectionHead ipsTruncate ipsTruncate_line cForumGrid_title'>\n\t\t\t\t\t\nCONTENT;\n\nif ( $forum->password && !$forum->loggedInMemberHasPasswordAccess() ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( 'passForm', '1' ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" data-ipsDialog data-ipsDialog-size='narrow' data-ipsDialog-title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'forum_requires_password', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n'>\nCONTENT;\n$return .= htmlspecialchars( $forum->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\">\nCONTENT;\n$return .= htmlspecialchars( $forum->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t<\/h3>\n\t\t\t\t\nCONTENT;\n\nif ( !$forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\nCONTENT;\n\n$count = \\IPS\\forums\\Topic::contentCount( $forum, TRUE );\n$return .= <<<CONTENT\n\n\t\t\t\t\t<p class='ipsType_reset'>\nCONTENT;\n\n$pluralize = array( $count ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'posts_number', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n<\/p>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( \\IPS\\forums\\Topic::modPermission( 'unhide', NULL, $forum ) AND ( $forum->queued_topics OR $forum->queued_posts ) ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<strong class='ipsType_warning ipsType_medium'>\n\t\t\t\t\t\t<i class='fa fa-warning'><\/i>\n\t\t\t\t\t\t\nCONTENT;\n\nif ( $forum->queued_topics ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<a href='\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( array( 'advanced_search_submitted' => 1, 'topic_type' => 'queued_topics' ) )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' data-ipsTooltip title='\nCONTENT;\n\n$pluralize = array( $forum->queued_topics ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'queued_topics_badge', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n' class='ipsType_blendLinks'>\nCONTENT;\n$return .= htmlspecialchars( $forum->queued_topics, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsType_light'>0<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\/\n\t\t\t\t\t\t\nCONTENT;\n\nif ( $forum->queued_posts ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<a href='\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( array( 'advanced_search_submitted' => 1, 'topic_type' => 'queued_posts' ) )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' data-ipsTooltip title='\nCONTENT;\n\n$pluralize = array( $forum->queued_posts ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'queued_posts_badge', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n' class='ipsType_blendLinks'>\nCONTENT;\n$return .= htmlspecialchars( $forum->queued_posts, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsType_light'>0<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t<\/strong>\t\t\t\t\t\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t<\/div>\n\t\t<\/div>\n\t\t\n\t\t<div class='ipsPad'>\n\t\t\t\nCONTENT;\n\nif ( $forum->description ):\n$return .= <<<CONTENT\n\n\t\t\t\t<div class='ipsType_richText ipsType_normal'>{$forum->description}<\/div>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\n\t\t\t\nCONTENT;\n\nif ( $forum->hasChildren() ):\n$return .= <<<CONTENT\n\n\t\t\t\t<h4 class='ipsType_minorHeading ipsSpacer_top'>\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'subforums', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/h4>\n\t\t\t\t<ul class=\"ipsDataItem_subList ipsList_inline ipsClearfix\">\n\t\t\t\t\t\nCONTENT;\n\nforeach ( $forum->children() as $subforum ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<li class=\"\nCONTENT;\n\nif ( \\IPS\\forums\\Topic::containerUnread( $subforum ) ):\n$return .= <<<CONTENT\nipsDataItem_unread\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\">\n\t\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $subforum->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\">\n                            \nCONTENT;\n$return .= htmlspecialchars( $subforum->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\nCONTENT;\n\nif ( \\IPS\\forums\\Topic::containerUnread( $subforum ) ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_tiny \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $subforum ) && !$subforum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t\t\t<i class=\"fa fa-circle\"><\/i>\n\t\t\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<\/a>\n\t\t\t\t\t<\/li>\n\t\t\t\t\t\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\n\t\t\t\t<\/ul>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t<\/div>\n\n\t\t<div class='cForumGrid_info'>\n\t\t\t<hr class='ipsHr'>\n\n\t\t\t\nCONTENT;\n\nif ( !$forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( $lastPost ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<div class='ipsPhotoPanel ipsPhotoPanel_tiny'>\n\t\t\t\t\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"global\", \"core\" )->userPhoto( $lastPost['author'], 'tiny' );\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<div>\n\t\t\t\t\t\t\t<ul class='ipsList_reset'>\n\t\t\t\t\t\t\t\t<li><a href=\"\nCONTENT;\n$return .= htmlspecialchars( $lastPost['topic_url']->setQueryString( 'do', 'getNewComment' ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" class='ipsType_break' title='\nCONTENT;\n$return .= htmlspecialchars( $lastPost['topic_title'], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'>\nCONTENT;\n\n$return .= htmlspecialchars( mb_substr( html_entity_decode( $lastPost['topic_title'] ), '0', \"30\" ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ) . ( ( mb_strlen( html_entity_decode( $lastPost['topic_title'] ) ) > \"30\" ) ? '&hellip;' : '' );\n$return .= <<<CONTENT\n<\/a><\/li>\n\t\t\t\t\t\t\t\t<li class='ipsType_light ipsTruncate ipsTruncate_line'>\nCONTENT;\n\n$htmlsprintf = array($lastPost['author']->link()); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'byline_nodate', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'htmlsprintf' => $htmlsprintf ) );\n$return .= <<<CONTENT\n, <a href='\nCONTENT;\n$return .= htmlspecialchars( $lastPost['topic_url']->setQueryString( 'do', 'getLastComment' ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'get_last_post', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n' class='ipsType_blendLinks'>\nCONTENT;\n\n$val = ( $lastPost['date'] instanceof \\IPS\\DateTime ) ? $lastPost['date'] : \\IPS\\DateTime::ts( $lastPost['date'] );$return .= $val->html();\n$return .= <<<CONTENT\n<\/a><\/li>\n\t\t\t\t\t\t\t<\/ul>\n\t\t\t\t\t\t<\/div>\n\t\t\t\t\t<\/div>\n\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t<p class='ipsType_light ipsType_reset ipsTruncate ipsTruncate_line'>\nCONTENT;\n\nif ( $forum->password ):\n$return .= <<<CONTENT\n\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'no_forum_posts_password', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'no_forum_posts', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n<\/p>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t<p class='ipsType_light ipsType_reset ipsTruncate ipsTruncate_line'>\n\t\t\t\t\t\nCONTENT;\n\n$pluralize = array( $forum->redirect_hits ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'redirect_hits', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n\n\t\t\t\t<\/p>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t<\/div>\n\t<\/div>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction forumRow( $forum, $isSubForum=FALSE, $table=NULL ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( $forum->can('view') ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n\n$lastPost = $forum->lastPost();\n$return .= <<<CONTENT\n\n\t<li class=\"ipsDataItem ipsDataItem_responsivePhoto \nCONTENT;\n\nif ( \\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsDataItem_unread\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n ipsClearfix\" data-forumID=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->_id, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\">\n\t\t<div class=\"ipsDataItem_icon ipsDataItem_category\">\n\t\t\t\nCONTENT;\n\nif ( !$forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t\nCONTENT;\n\nif ( \\IPS\\forums\\Topic::containerUnread( $forum ) AND \\IPS\\Member::loggedIn()->member_id ):\n$return .= <<<CONTENT\n<a href=\"\nCONTENT;\n\nif ( $isSubForum ):\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( array( 'do' => 'markRead', 'return' => $forum->parent_id ) )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( 'do', 'markRead' )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\" data-action='markAsRead' title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'mark_forum_read', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n' data-ipsTooltip>\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( $forum->icon ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<img src=\"\nCONTENT;\n\n$return .= \\IPS\\File::get( \"forums_Icons\", $forum->icon )->url;\n$return .= <<<CONTENT\n\" class='ipsItemStatus ipsItemStatus_custom \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\nCONTENT;\n\nif ( $forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_redirect \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t<i class='fa fa-arrow-right'><\/i>\n\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\nCONTENT;\n\nelseif ( $forum->forums_bitoptions['bw_enable_answers'] ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_answers \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t<i class='fa fa-question'><\/i>\n\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\nCONTENT;\n\nelseif ( $forum->password ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_password \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t\nCONTENT;\n\nif ( $forum->loggedInMemberHasPasswordAccess() ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t<i class='fa fa-unlock'><\/i>\n\t\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t<i class='fa fa-lock'><\/i>\n\t\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<span class='ipsItemStatus ipsItemStatus_large cForumIcon_normal \nCONTENT;\n\nif ( !\\IPS\\forums\\Topic::containerUnread( $forum ) && !$forum->redirect_on ):\n$return .= <<<CONTENT\nipsItemStatus_read\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'>\n\t\t\t\t\t\t\t<i class=\"fa fa-comments\"><\/i>\n\t\t\t\t\t\t<\/span>\n\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\nCONTENT;\n\nif ( !$forum->redirect_on and \\IPS\\forums\\Topic::containerUnread( $forum ) AND \\IPS\\Member::loggedIn()->member_id ):\n$return .= <<<CONTENT\n\n\t\t\t<\/a>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t<\/div>\n\t\t<div class=\"ipsDataItem_main\">\n\t\t\t<h4 class=\"ipsDataItem_title ipsType_large ipsType_break\">\n\t\t\t\t\nCONTENT;\n\nif ( $forum->password && !$forum->loggedInMemberHasPasswordAccess() ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( 'passForm', '1' ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" data-ipsDialog data-ipsDialog-size='narrow' data-ipsDialog-title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'forum_requires_password', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n'>\nCONTENT;\n$return .= htmlspecialchars( $forum->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $forum->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\">\nCONTENT;\n$return .= htmlspecialchars( $forum->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( $forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t&nbsp;&nbsp;<span class='ipsType_light ipsType_medium'>(\nCONTENT;\n\n$pluralize = array( $forum->redirect_hits ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'redirect_hits', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n)<\/span>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t<\/h4>\n\t\t\t\nCONTENT;\n\nif ( $forum->hasChildren() ):\n$return .= <<<CONTENT\n\n\t\t\t\t<ul class=\"ipsDataItem_subList ipsList_inline \nCONTENT;\n\nif ( $forum->description ):\n$return .= <<<CONTENT\nwithBorder\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\">\n\t\t\t\t\t\nCONTENT;\n\nforeach ( $forum->children() as $subforum ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<li class=\"\nCONTENT;\n\nif ( \\IPS\\forums\\Topic::containerUnread( $subforum ) ):\n$return .= <<<CONTENT\nipsDataItem_unread\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\">\n\t\t\t\t\t\t\t<a href=\"\nCONTENT;\n$return .= htmlspecialchars( $subforum->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\"><i class=\"fa fa-arrow-circle-o-right\"><\/i> \nCONTENT;\n$return .= htmlspecialchars( $subforum->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\t<\/li>\n\t\t\t\t\t\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\n\t\t\t\t<\/ul>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\nCONTENT;\n\nif ( $forum->description ):\n$return .= <<<CONTENT\n\n\t\t\t\t<div class=\"ipsDataItem_meta ipsType_richText\">{$forum->description}<\/div>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t<\/div>\n\t\t\nCONTENT;\n\nif ( !$forum->redirect_on ):\n$return .= <<<CONTENT\n\n\t\t\t<div class=\"ipsDataItem_stats ipsDataItem_statsLarge\">\n\t\t\t\t\nCONTENT;\n\nif ( $lastPost ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<dl>\n\t\t\t\t\t\t\nCONTENT;\n\n$count = \\IPS\\forums\\Topic::contentCount( $forum, TRUE );\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<dt class=\"ipsDataItem_stats_number\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->formatNumber( $count );\n$return .= <<<CONTENT\n<\/dt>\n\t\t\t\t\t\t<dd class=\"ipsDataItem_stats_type ipsType_light\">\nCONTENT;\n\n$pluralize = array( $count ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'posts_no_number', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n<\/dd>\n\t\t\t\t\t<\/dl>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( \\IPS\\forums\\Topic::modPermission( 'unhide', NULL, $forum ) AND $unapprovedContent = $forum->unapprovedContentRecursive() and ( $unapprovedContent['topics'] OR $unapprovedContent['posts'] ) ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<strong class='ipsType_warning ipsType_medium'>\n\t\t\t\t\t\t<i class='fa fa-warning'><\/i>\n\t\t\t\t\t\t\nCONTENT;\n\nif ( $unapprovedContent['topics'] ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<a href='\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( array( 'advanced_search_submitted' => 1, 'topic_type' => 'queued_topics' ) )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' data-ipsTooltip title='\nCONTENT;\n\n$pluralize = array( $unapprovedContent['topics'] ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'queued_topics_badge', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n' class='ipsType_blendLinks'>\nCONTENT;\n$return .= htmlspecialchars( $unapprovedContent['topics'], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsType_light'>0<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\/\n\t\t\t\t\t\t\nCONTENT;\n\nif ( $unapprovedContent['posts'] ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<a href='\nCONTENT;\n$return .= htmlspecialchars( $forum->url()->setQueryString( array( 'advanced_search_submitted' => 1, 'topic_type' => 'queued_posts' ) )->csrf(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' data-ipsTooltip title='\nCONTENT;\n\n$pluralize = array( $unapprovedContent['posts'] ); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'queued_posts_badge', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'pluralize' => $pluralize ) );\n$return .= <<<CONTENT\n' class='ipsType_blendLinks'>\nCONTENT;\n$return .= htmlspecialchars( $unapprovedContent['posts'], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<span class='ipsType_light'>0<\/span>\n\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t<\/strong>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t<\/div>\n\t\t\t<ul class=\"ipsDataItem_lastPoster ipsDataItem_withPhoto\">\n\t\t\t\t\nCONTENT;\n\nif ( $lastPost ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<li>\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"global\", \"core\" )->userPhoto( $lastPost['author'], 'tiny' );\n$return .= <<<CONTENT\n<\/li>\n\t\t\t\t\t\nCONTENT;\n\nif ( $lastPost['topic_title'] ):\n$return .= <<<CONTENT\n<li><a href=\"\nCONTENT;\n$return .= htmlspecialchars( $lastPost['topic_url']->setQueryString( 'do', 'getNewComment' ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" class='ipsType_break ipsContained' title='\nCONTENT;\n$return .= htmlspecialchars( $lastPost['topic_title'], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'>\nCONTENT;\n\n$return .= htmlspecialchars( mb_substr( html_entity_decode( $lastPost['topic_title'] ), '0', \"26\" ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ) . ( ( mb_strlen( html_entity_decode( $lastPost['topic_title'] ) ) > \"26\" ) ? '&hellip;' : '' );\n$return .= <<<CONTENT\n<\/a><\/li>\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t<li class='ipsType_blendLinks'>\nCONTENT;\n\n$htmlsprintf = array($lastPost['author']->link()); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'byline_nodate', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'htmlsprintf' => $htmlsprintf ) );\n$return .= <<<CONTENT\n<\/li>\n\t\t\t\t\t\nCONTENT;\n\nif ( $lastPost['topic_title'] ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<li class=\"ipsType_light\"><a href='\nCONTENT;\n$return .= htmlspecialchars( $lastPost['topic_url']->setQueryString( 'do', 'getLastComment' ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'get_last_post', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n' class='ipsType_blendLinks'>\nCONTENT;\n\n$val = ( $lastPost['date'] instanceof \\IPS\\DateTime ) ? $lastPost['date'] : \\IPS\\DateTime::ts( $lastPost['date'] );$return .= $val->html();\n$return .= <<<CONTENT\n<\/a><\/li>\n\t\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<li class=\"ipsType_light\">\nCONTENT;\n\n$val = ( $lastPost['date'] instanceof \\IPS\\DateTime ) ? $lastPost['date'] : \\IPS\\DateTime::ts( $lastPost['date'] );$return .= $val->html();\n$return .= <<<CONTENT\n<\/li>\n\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t<li class='ipsType_light ipsResponsive_showDesktop'>\nCONTENT;\n\nif ( $forum->password ):\n$return .= <<<CONTENT\n\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'no_forum_posts_password', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'no_forum_posts', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n<\/li>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t<\/ul>\t\n\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\nCONTENT;\n\nif ( $table and $table->canModerate() ):\n$return .= <<<CONTENT\n\n\t\t\t<div class='ipsDataItem_modCheck'>\n\t\t\t\t<span class='ipsCustomInput'>\n\t\t\t\t\t<input type='checkbox' data-role='moderation' name=\"moderate[\nCONTENT;\n$return .= htmlspecialchars( $forum->_id, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n]\" data-actions=\"\nCONTENT;\n\n$return .= htmlspecialchars( implode( ' ', $table->multimodActions( $forum ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" data-state=''>\n\t\t\t\t\t<span><\/span>\n\t\t\t\t<\/span>\n\t\t\t<\/div>\n\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t<\/li>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction forumTableRow( $table, $headers, $forums ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\nforeach ( $forums as $forum ):\n$return .= <<<CONTENT\n\n\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"index\", \"forums\" )->forumRow( $forum, FALSE, $table );\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction index(  ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"global\", \"core\" )->pageHeader( \\IPS\\Member::loggedIn()->language()->addToStack('forums') );\n$return .= <<<CONTENT\n\n\n\nCONTENT;\n\nif ( \\IPS\\Member::loggedIn()->member_id ):\n$return .= <<<CONTENT\n\n\t<ul class=\"ipsToolList ipsToolList_horizontal ipsResponsive_hideDesktop ipsResponsive_block ipsClearfix\">\n\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"index\", \"forums\" )->indexButtons(  );\n$return .= <<<CONTENT\n\n\t<\/ul>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\n<section>\n\t<ol class='ipsList_reset cForumList' data-controller='core.global.core.table, forums.front.forum.forumList' data-baseURL=''>\n\t\t\nCONTENT;\n\nforeach ( \\IPS\\forums\\Forum::roots() as $category ):\n$return .= <<<CONTENT\n\n\t\t\t\nCONTENT;\n\nif ( $category->can('view') && $category->hasChildren() ):\n$return .= <<<CONTENT\n\n\t\t\t<li data-categoryID='\nCONTENT;\n$return .= htmlspecialchars( $category->_id, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' class='cForumRow ipsBox ipsSpacer_bottom ipsfocus_reset'>\n\t\t\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->settings['ipsfocus_b1'];\n$return .= <<<CONTENT\n\n\t\t\t\t<h2 class=\"ipsType_sectionTitle ipsType_reset cForumTitle\">\n\t\t\t\t\t<a href='#' class='ipsPos_right ipsJS_show ipsType_noUnderline cForumToggle' data-action='toggleCategory' data-ipsTooltip title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'toggle_this_category', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n'><\/a>\n\t\t\t\t\t<a href='\nCONTENT;\n$return .= htmlspecialchars( $category->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'>\nCONTENT;\n$return .= htmlspecialchars( $category->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t<\/h2>\n\t\t\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->settings['ipsfocus_b2'];\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\nif ( \\IPS\\Theme::i()->settings['forum_layout'] === 'grid' ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t<div class='ipsAreaBackground_reset ipsPad' data-role=\"forums\">\n\t\t\t\t\t\t<div class='ipsGrid ipsGrid_collapsePhone' data-ipsGrid data-ipsGrid-minItemSize='250' data-ipsGrid-maxItemSize='500' data-ipsGrid-equalHeights='row'>\n\t\t\t\t\t\t\t\nCONTENT;\n\nforeach ( $category->children() as $forum ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"index\", \"forums\" )->forumGridItem( $forum );\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t<\/div>\n\t\t\t\t\t<\/div>\n\t\t\t\t\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\t\t\t\t\t<ol class=\"ipsDataList ipsDataList_large ipsDataList_zebra ipsAreaBackground_reset\" data-role=\"forums\">\n\t\t\t\t\t\t\nCONTENT;\n\nforeach ( $category->children() as $forum ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"index\", \"forums\" )->forumRow( $forum );\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\n\t\t\t\t\t<\/ol>\n\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\nCONTENT;\n\n$return .= \\IPS\\Theme::i()->settings['ipsfocus_b3'];\n$return .= <<<CONTENT\n\n\t\t\t<\/li>\n\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\n\t<\/ol>\n<\/section>\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction indexButtons(  ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\n<li>\n\t<a class=\"ipsButton ipsButton_large ipsButton_important ipsButton_fullWidth\" href=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=forums&module=forums&controller=forums&do=add\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" data-ipsDialog data-ipsDialog-size='narrow' data-ipsDialog-title='\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'select_forum', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n'>\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'start_new_topic', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/a>\n<\/li>\nCONTENT;\n\n\t\treturn $return;\n}}"
VALUE;