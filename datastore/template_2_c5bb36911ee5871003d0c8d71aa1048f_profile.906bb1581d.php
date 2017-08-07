<?php

return <<<'VALUE'
"namespace IPS\\Theme;\nclass class_awards_front_profile extends \\IPS\\Theme\\Template\n{\n\t\t\tfunction awards( $table, $member ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n<h2 class='ipsType_pageTitle'>\nCONTENT;\n\n$sprintf = array($member->name); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_my_awards', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'sprintf' => $sprintf ) );\n$return .= <<<CONTENT\n<\/h2>\n<div class=''>\n    {$table}\n<\/div>\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction awardsSettings( $form ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n{$form}\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction rows( $table, $headers, $rows ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\n$size = explode( 'x', \\IPS\\Settings::i()->award_settings_profile_size );\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( count( $rows ) ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nforeach ( $rows as $award ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( !in_array( $award->id, explode(\",\", \\IPS\\Member::loggedIn()->award_member_show )) ):\n$return .= <<<CONTENT\n\n<div class=\"ipsResponsive_showPhone ipsResponsive_block\">\n    <div class='ipsColumns ipsColumns_bothSpacing ipsColumns_halfSpacing'>\n        <div class='ipsColumn ipsColumn_fluid ipsType_center'>\n            <img src=\"\nCONTENT;\n\n$return .= \\IPS\\File::get( \"awards_Awards\",  $award->container()->icon )->url;\n$return .= <<<CONTENT\n\" class=\"ia_award_img\" style=\"width:\n            \nCONTENT;\n$return .= htmlspecialchars( $size[0], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\npx; height: \nCONTENT;\n$return .= htmlspecialchars( $size[1], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\npx;\">\n            <br>\n\n            <h2 class=\"ipsType_sectionHead ipsCursor_pointer\" style=\"cursor: default;\">\n                {$award->container()->title}<\/i><\/h2>\n            \nCONTENT;\n\nif ( $award->container()->can( 'manage' ) ):\n$return .= <<<CONTENT\n\n            <span class=\"ipsPos_right\">\n                <a href='#' data-ipsDialog data-ipsDialog-size=\"wide\" data-ipsDialog-title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_title_edit_awarded', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" data-ipsDialog-url=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=awards&module=awards&controller=awards&do=edit&id={$award->id}\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" class=\"\"><i class=\"fa fa-pencil\"><\/i><\/a>&nbsp;\n                <a href=\"#\" data-ipsDialog data-ipsDialog-size=\"wide\" data-ipsDialog-title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_title_remove', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" data-ipsDialog-url=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=awards&module=awards&controller=awards&do=remove&id={$award->id}\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" class=\"\"><i class=\"fa fa-times-circle\"><\/i><\/a>\n            <\/span>\n            \nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n            <br>\n            <span class=\"ipsType_light ipsType_noBreak\" style=\"cursor:default;\" title=\"\nCONTENT;\n\n$val = (  $award->date instanceof \\IPS\\DateTime ) ?  $award->date : \\IPS\\DateTime::ts(  $award->date );$return .= (string) $val;\n$return .= <<<CONTENT\n\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_awarded', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n \nCONTENT;\n\n$val = ( $award->date instanceof \\IPS\\DateTime ) ? $award->date : \\IPS\\DateTime::ts( $award->date );$return .= $val->html();\n$return .= <<<CONTENT\n<\/span>\n\n        <\/div>\n    <\/div>\n    <div class='ipsColumns ipsColumns_bothSpacing ipsColumns_halfSpacing'>\n        <div class='ipsColumn ipsColumn_fluid ipsType_left'>\n            <hr class=\"awardsHr\">\n            {$award->reason}\n        <\/div>\n    <\/div>\n<\/div>\n<div class=\"ipsResponsive_showTablet ipsResponsive_block\">\n    <div class='ipsColumns ipsColumns_bothSpacing ipsColumns_halfSpacing'>\n        <div class='ipsColumn ipsColumn_narrow ipsType_center'>\n            <img src=\"\nCONTENT;\n\n$return .= \\IPS\\File::get( \"awards_Awards\",  $award->container()->icon )->url;\n$return .= <<<CONTENT\n\" class=\"ia_award_img\" style=\"width:\n            \nCONTENT;\n$return .= htmlspecialchars( $size[0], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\npx; height: \nCONTENT;\n$return .= htmlspecialchars( $size[1], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\npx;\">\n        <\/div>\n        <div class='ipsColumn ipsColumn_fluid ipsType_left'>\n            <h2 class=\"ipsType_sectionHead ipsCursor_pointer\" style=\"cursor: default;\">\n                {$award->container()->title}<\/i><\/h2>\n            \nCONTENT;\n\nif ( $award->container()->can( 'manage' ) ):\n$return .= <<<CONTENT\n\n            <span class=\"ipsPos_right\">\n                <a href='#' data-ipsDialog data-ipsDialog-size=\"wide\" data-ipsDialog-title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_title_edit_awarded', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" data-ipsDialog-url=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=awards&module=awards&controller=awards&do=edit&id={$award->id}\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" class=\"\"><i class=\"fa fa-pencil\"><\/i><\/a>&nbsp;\n                <a href=\"#\" data-ipsDialog data-ipsDialog-size=\"wide\" data-ipsDialog-title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_title_remove', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" data-ipsDialog-url=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=awards&module=awards&controller=awards&do=remove&id={$award->id}\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" class=\"\"><i class=\"fa fa-times-circle\"><\/i><\/a>\n            <\/span>\n            \nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n            <br>\n            <span class=\"ipsType_light ipsType_noBreak\" style=\"cursor:default;\" title=\"\nCONTENT;\n\n$val = (  $award->date instanceof \\IPS\\DateTime ) ?  $award->date : \\IPS\\DateTime::ts(  $award->date );$return .= (string) $val;\n$return .= <<<CONTENT\n\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_awarded', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n \nCONTENT;\n\n$val = ( $award->date instanceof \\IPS\\DateTime ) ? $award->date : \\IPS\\DateTime::ts( $award->date );$return .= $val->html();\n$return .= <<<CONTENT\n<\/span>\n            <hr class=\"awardsHr\">\n            {$award->reason}\n        <\/div>\n    <\/div>\n<\/div>\n<div class=\"ipsResponsive_showDesktop ipsResponsive_block\">\n    <div class='ipsColumns ipsColumns_bothSpacing ipsColumns_halfSpacing'>\n        <div class='ipsColumn ipsColumn_narrow ipsType_center'>\n            <img src=\"\nCONTENT;\n\n$return .= \\IPS\\File::get( \"awards_Awards\",  $award->container()->icon )->url;\n$return .= <<<CONTENT\n\" class=\"ia_award_img\" style=\"width:\n            \nCONTENT;\n$return .= htmlspecialchars( $size[0], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\npx; height: \nCONTENT;\n$return .= htmlspecialchars( $size[1], ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\npx;\">\n        <\/div>\n        <div class='ipsColumn ipsColumn_fluid ipsType_left'>\n            <h2 class=\"ipsType_sectionHead ipsCursor_pointer\" style=\"cursor: default;\">\n                {$award->container()->title}<\/i><\/h2>\n            \nCONTENT;\n\nif ( $award->container()->can( 'manage' ) ):\n$return .= <<<CONTENT\n\n            <span class=\"ipsPos_right\">\n                <a href='#' data-ipsDialog data-ipsDialog-size=\"wide\" data-ipsDialog-title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_title_edit_awarded', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" data-ipsDialog-url=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=awards&module=awards&controller=awards&do=edit&id={$award->id}\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" class=\"\"><i class=\"fa fa-pencil\"><\/i><\/a>&nbsp;\n                <a href=\"#\" data-ipsDialog data-ipsDialog-size=\"wide\" data-ipsDialog-title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_title_remove', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" data-ipsDialog-url=\"\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=awards&module=awards&controller=awards&do=remove&id={$award->id}\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n\" class=\"\"><i class=\"fa fa-times-circle\"><\/i><\/a>\n            <\/span>\n            \nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n            <br>\n            <span class=\"ipsType_light ipsType_noBreak\" style=\"cursor:default;\" title=\"\nCONTENT;\n\n$val = (  $award->date instanceof \\IPS\\DateTime ) ?  $award->date : \\IPS\\DateTime::ts(  $award->date );$return .= (string) $val;\n$return .= <<<CONTENT\n\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_awarded', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n \nCONTENT;\n\n$val = ( $award->date instanceof \\IPS\\DateTime ) ? $award->date : \\IPS\\DateTime::ts( $award->date );$return .= $val->html();\n$return .= <<<CONTENT\n<\/span>\n            <hr class=\"awardsHr\">\n            {$award->reason}\n        <\/div>\n    <\/div>\n<\/div>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction settings( $tab ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n<li>\n    <a href='\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=core&module=system&controller=settings&area=awards\", null, \"setting_awards\", array(), 0 ) );\n$return .= <<<CONTENT\n'\n       id='setting_awards' class='ipsTabs_item \nCONTENT;\n\nif ( $tab === ' awards' ):\n$return .= <<<CONTENT\nipsTabs_activeItem\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n'\n    title=\"\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( '__app_awards', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\" role=\"tab\" aria-selected=\"true\">\n    <i class='fa fa-trophy'><\/i> \nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( '__app_awards', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\n    <\/a>\n<\/li>\n\n\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction table( $table, $headers, $rows, $quickSearch, $advancedSearch ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( count( $rows ) ):\n$return .= <<<CONTENT\n\n<table class='ipsTable ipsTable_responsive ipsTable_zebra ipsClear \nCONTENT;\n\nforeach ( $table->classes as $class ):\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $class, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n \nCONTENT;\n\nendforeach;\n$return .= <<<CONTENT\n' data-role=\"table\" data-ipsKeyNav data-ipsKeyNav-observe='e d return'>\n    <tbody data-role=\"tableRows\">\n    \nCONTENT;\n\n$return .= $table->rowsTemplate[0]->{$table->rowsTemplate[1]}( $table, $headers, $rows );\n$return .= <<<CONTENT\n\n    <\/tbody>\n<\/table>\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n<div class='ipsPad ipsType_center ipsType_large ipsType_light'>\n    <p class='ipsType_large'>\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'award_no_rows_in_table', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/p>\n<\/div>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( $table->pages > 1 ):\n$return .= <<<CONTENT\n\n<div data-role=\"tablePagination\" style=\"margin: 10px;\">\n    \nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"global\", \"core\", 'global' )->pagination( $table->baseUrl, $table->pages, $table->page, $table->limit );\n$return .= <<<CONTENT\n\n<\/div>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}}"
VALUE;
