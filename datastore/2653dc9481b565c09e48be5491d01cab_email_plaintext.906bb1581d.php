<?php

return <<<'VALUE'
"namespace IPS\\Theme;\n\tfunction email_html_core_notification_unapproved_content( $content, $member, $email ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\n\nCONTENT;\n\nif ( $content->author()->member_id ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"email_new_content_unapproved\", FALSE, array( 'sprintf' => array( $content->author()->url(), $content->author()->name, $content->indefiniteArticle( $email->language ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n <a href='\nCONTENT;\n$return .= htmlspecialchars( $content->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'>\nCONTENT;\n\nif ( $content instanceof \\IPS\\Content\\Comment OR $content instanceof \\IPS\\Content\\Review ):\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $content->item()->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $content->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n<\/a>\n\nCONTENT;\n\nelseif ( $content->author()->real_name ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"email_new_content_unapproved_guest\", FALSE, array( 'sprintf' => array( $email->language->addToStack( 'guest_name_shown', NULL, array( 'sprintf' => array( $content->author()->real_name ) ) ), $content->indefiniteArticle( $email->language ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n <a href='\nCONTENT;\n$return .= htmlspecialchars( $content->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'>\nCONTENT;\n\nif ( $content instanceof \\IPS\\Content\\Comment OR $content instanceof \\IPS\\Content\\Review ):\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $content->item()->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $content->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n<\/a>\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\n\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"email_new_content_unapproved_guest\", FALSE, array( 'sprintf' => array( $email->language->addToStack( 'guest_name_shown', NULL, array( 'sprintf' => array( $email->language->addToStack('guest') ) ) ), $content->indefiniteArticle( $email->language ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n <a href='\nCONTENT;\n$return .= htmlspecialchars( $content->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'>\nCONTENT;\n\nif ( $content instanceof \\IPS\\Content\\Comment OR $content instanceof \\IPS\\Content\\Review ):\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $content->item()->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nelse:\n$return .= <<<CONTENT\n\nCONTENT;\n$return .= htmlspecialchars( $content->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n<\/a>\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\n<br \/>\n<br \/>\n\n<table width='100%' cellpadding='0' cellspacing='0' border='0'>\n\t<tr>\n\t\t<td dir='{dir}' width='40' valign='top' class='hidePhone' style='width: 0; max-height: 0; overflow: hidden; float: left;'>\n\t\t\t<img src='\nCONTENT;\n$return .= htmlspecialchars( $content->author()->get_photo( true, true ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' width='40' height='40' style='border: 1px solid #777777; vertical-align: middle;'>\n\t\t<\/td>\n\t\t<td dir='{dir}' width='30' valign='top' class='hidePhone' style='width: 0; max-height: 0; overflow: hidden; float: left;'>\n\t\t\t<br \/>\n\t\t\t<span style='display: block; width: 0px; height: 0px; border-width: 15px; border-color: transparent #f9f9f9 transparent transparent; border-style: solid'><\/span>\n\t\t<\/td>\n\t\t<td dir='{dir}' valign='top' style='background: #f9f9f9;'>\n\t\t\t<table width='100%' cellpadding='10' cellspacing='0' border='0'>\n\t\t\t\t<tr>\n\t\t\t\t\t<td dir='{dir}'>\n\t\t\t\t\t\t<table width='100%' cellpadding='5' cellspacing='0' border='0'>\n\t\t\t\t\t\t\t\nCONTENT;\n\nif ( ( ( $content instanceof \\IPS\\Content\\Comment or $content instanceof \\IPS\\Content\\Review ) and $container = $content->item()->containerWrapper() ) or ( $content instanceof \\IPS\\Content\\Item and $container = $content->containerWrapper() ) ):\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t<td dir='{dir}' style=\"font-family: 'Helvetica Neue', helvetica, sans-serif; line-height: 1.5; font-size: 14px; color: #8d8d8d\">\n\t\t\t\t\t\t\t\t\t\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"email_posted_in\", FALSE, array( 'sprintf' => array( $email->language->addToStack( $container->_titleLanguageKey ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t\t<\/td>\n\t\t\t\t\t\t\t<\/tr>\n\t\t\t\t\t\t\t\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t<td dir='{dir}' style=\"font-family: 'Helvetica Neue', helvetica, sans-serif; line-height: 1.5; font-size: 14px;\">\n\t\t\t\t\t\t\t\t\t{$email->parseTextForEmail( $content->content(), $email->language )}\n\t\t\t\t\t\t\t\t<\/td>\n\t\t\t\t\t\t\t<\/tr>\n\t\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t\t<td dir='{dir}'>\n\t\t\t\t\t\t\t\t\t<a href='\nCONTENT;\n$return .= htmlspecialchars( $content->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' style=\"color: #ffffff; font-family: 'Helvetica Neue', helvetica, sans-serif; text-decoration: none; font-size: 14px; background: \nCONTENT;\n\n$return .= \\IPS\\Settings::i()->email_color;\n$return .= <<<CONTENT\n; line-height: 32px; padding: 0 10px; display: inline-block; border-radius: 3px;\">\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"go_to_this_x\", FALSE, array( 'sprintf' => array( mb_strtolower( $email->language->addToStack( $content::$title, FALSE ) ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n<\/a>\n\t\t\t\t\t\t\t\t<\/td>\n\t\t\t\t\t\t\t<\/tr>\n\t\t\t\t\t\t<\/table>\n\t\t\t\t\t<\/td>\n\t\t\t\t<\/tr>\n\t\t\t<\/table>\n\t\t<\/td>\n\t<\/tr>\n<\/table>\n<br \/><br \/>\n<em style='color: #8c8c8c'>&mdash; \nCONTENT;\n\n$return .= \\IPS\\Settings::i()->board_name;\n$return .= <<<CONTENT\n<\/em>\nCONTENT;\n\n\t\treturn $return;\n}\n\tfunction email_plaintext_core_notification_unapproved_content( $content, $member, $email ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\n\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"email_new_content_unapproved_plain\", FALSE, array( 'sprintf' => array( $content->author()->real_name ? $email->language->addToStack( 'guest_name_shown', NULL, array( 'sprintf' => array( $content->author()->real_name ) ) ) : $email->language->addToStack( 'guest_name_shown', NULL, array( 'sprintf' => array( $email->language->addToStack('guest') ) ) ), $content->indefiniteArticle( $email->language ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n \nCONTENT;\n$return .= htmlspecialchars( $content->mapped('title'), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\n\n\nCONTENT;\n$return .= htmlspecialchars( $email->language->addToStack(\"go_to_this_x\", FALSE, array( 'sprintf' => array( mb_strtolower( $email->language->addToStack( $content::$title, FALSE ) ) ) ) ), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n: \nCONTENT;\n$return .= htmlspecialchars( $content->url(), ENT_QUOTES | \\IPS\\HTMLENTITIES, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\n\n-- \nCONTENT;\n\n$return .= \\IPS\\Settings::i()->board_name;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}"
VALUE;
