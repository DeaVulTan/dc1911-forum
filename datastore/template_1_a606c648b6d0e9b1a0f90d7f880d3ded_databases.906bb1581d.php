<?php

return <<<'VALUE'
"namespace IPS\\Theme;\nclass class_cms_admin_databases extends \\IPS\\Theme\\Template\n{\n\t\t\tfunction downloadDialog( $database ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n<div class='ipsBox ipsPad'>\n\t<i class=\"fa fa-download ipsAlert_icon\"><\/i>\n\t\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'cms_download_db_explain', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n\n\t<ul class=\"ipsToolList ipsToolList_horizontal ipsType_right ipsAlert_buttonRow ipsClear ipsClearFix\">\n\t\t<li>\n\t\t\t<a href='\nCONTENT;\n\n$return .= str_replace( '&', '&amp;', \\IPS\\Http\\Url::internal( \"app=cms&module=databases&controller=databases&do=download&id={$database->_id}&go=true\", null, \"\", array(), 0 ) );\n$return .= <<<CONTENT\n' class='ipsButton ipsButton_normal'>\nCONTENT;\n\n$sprintf = array($database->_title); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'cms_download_db', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'sprintf' => $sprintf ) );\n$return .= <<<CONTENT\n<\/a>\n\t\t<\/li>\n\t<\/ul>\n<\/div>\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction fieldsWrapper( $tree ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n<br \/>\n<br \/>\n<div class='acpBlock_title'>\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'content_fields_fixed_title', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/div>\n{$tree}\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction manageDatabaseName( $database, $row, $page ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\nCONTENT;\n\n;\n$return .= <<<CONTENT\n\n<strong>\nCONTENT;\n$return .= htmlspecialchars( $database->_title, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/strong>\n\nCONTENT;\n\nif ( $page ):\n$return .= <<<CONTENT\n\n\t<a class=\"ipsPos_right ipsBadge ipsBadge_style1\" href=\"\nCONTENT;\n$return .= htmlspecialchars( $page->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\" target=\"_blank\">\nCONTENT;\n\n$sprintf = array($page->_title); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'cms_db_used_on_page', \\IPS\\HTMLENTITIES, 'UTF-8', FALSE ), FALSE, array( 'sprintf' => $sprintf ) );\n$return .= <<<CONTENT\n<\/a>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n<p class='ipsType_light'>\nCONTENT;\n$return .= htmlspecialchars( $database->_description, ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/p>\nCONTENT;\n\n\t\treturn $return;\n}}"
VALUE;
