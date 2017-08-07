<?php exit; ?>

Thu, 21 Jul 2016 12:10:16 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469103016, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"eb4abd66356bd1c71df4e4887d7e033e","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:11:22 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469103082, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"eb4abd66356bd1c71df4e4887d7e033e","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:11:32 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469103092, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj1sYW5ndWFnZSZpZD0yJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"2a979a047c3f2edd7c481243c62d0c63","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:12:05 +0000
INSERT INTO `core_file_logs` ( `log_action`, `log_type`, `log_configuration_id`, `log_method`, `log_filename`, `log_url`, `log_container`, `log_msg`, `log_date`, `log_data` ) VALUES ( 'delete', 'log', 1, 'FileSystem', 'root_map.js.5bd3298bb492118f34a6e54134d041c2.js', IPS\Http\Url::__set_state(array(
   'url' => 'http://forum.defcon.uz/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js',
   'data' => 
  array (
    'scheme' => 'http',
    'host' => 'forum.defcon.uz',
    'path' => '/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js',
  ),
   'queryString' => 
  array (
  ),
   'isInternal' => true,
   'isFriendly' => true,
)), 'javascript_global', 'file_deletion', 1469103125, '{"\/profile\/1-admin\/":""}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#2 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#3 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#4 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#5 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#6 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_profile.j...')
#7 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_profile.j...')
#8 /var/www/html/forum/applications/core/modules/front/members/profile.php(52): IPS\_Output->js('front_profile.j...', 'core')
#9 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#10 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#11 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:13:15 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469103195, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj10aGVtZSZpZD0xJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"bb4728ec9282542c5abdeebf8176f19f","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:15:47 +0000
INSERT INTO `core_file_logs` ( `log_action`, `log_type`, `log_configuration_id`, `log_method`, `log_filename`, `log_url`, `log_container`, `log_msg`, `log_date`, `log_data` ) VALUES ( 'delete', 'log', 1, 'FileSystem', 'root_map.js.5bd3298bb492118f34a6e54134d041c2.js', IPS\Http\Url::__set_state(array(
   'url' => 'http://forum.defcon.uz/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js',
   'data' => 
  array (
    'scheme' => 'http',
    'host' => 'forum.defcon.uz',
    'path' => '/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js',
  ),
   'queryString' => 
  array (
  ),
   'isInternal' => true,
   'isFriendly' => true,
)), 'javascript_global', 'file_deletion', 1469103347, '{"\/profile\/1-admin\/":""}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#2 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#3 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#4 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#5 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#6 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_statuses....')
#7 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_statuses....')
#8 /var/www/html/forum/applications/core/modules/front/members/profile.php(53): IPS\_Output->js('front_statuses....', 'core')
#9 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#10 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#11 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:27:28 +0000

IPS\Db\Exception: Unknown database 'forum' (1049)
#0 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#1 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#2 /var/www/html/forum/system/Session/Session.php(91): session_start()
#3 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#4 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#5 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#6 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#7 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#8 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#9 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#10 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('\nIPS\\Db\\Excepti...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:38:03 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469104682, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"ab83e237c593dfa1d531f54d4c1d44db","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:39:36 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469104776, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"ab83e237c593dfa1d531f54d4c1d44db","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 12:45:22 +0000
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id='inj55ar0finmb1ub3rbklvi047'
IPS\Db\Exception: Table 'forum.core_sessions' doesn't exist (1146)
#0 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#1 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#2 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#3 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#4 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#5 /var/www/html/forum/system/Session/Session.php(91): session_start()
#6 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#7 /var/www/html/forum/system/Dispatcher/Standard.php(59): IPS\_Theme::i()
#8 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#9 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#10 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#13 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('SELECT * FROM `...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:00:59 +0000
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id='inj55ar0finmb1ub3rbklvi047'
IPS\Db\Exception: Table 'forum.core_sessions' doesn't exist (1146)
#0 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#1 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#2 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#3 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#4 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#5 /var/www/html/forum/system/Session/Session.php(91): session_start()
#6 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#7 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#8 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#9 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#10 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#13 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('SELECT * FROM `...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:21:54 +0000

IPS\Db\Exception: Access denied for user 'root'@'localhost' (using password: NO) (1045)
#0 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#1 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#2 /var/www/html/forum/system/Session/Session.php(91): session_start()
#3 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#4 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#5 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#6 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#7 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#8 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#9 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#10 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('\nIPS\\Db\\Excepti...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:45:31 +0000

IPS\Db\Exception: Access denied for user 'root'@'localhost' (using password: NO) (1045)
#0 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#1 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#2 /var/www/html/forum/system/Session/Session.php(91): session_start()
#3 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#4 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#5 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#6 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#7 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#8 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#9 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#10 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('\nIPS\\Db\\Excepti...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:46:16 +0000

IPS\Db\Exception: Access denied for user 'root'@'localhost' (using password: NO) (1045)
#0 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#1 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#2 /var/www/html/forum/system/Session/Session.php(91): session_start()
#3 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#4 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#5 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#6 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#7 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#8 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#9 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#10 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('\nIPS\\Db\\Excepti...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:47:17 +0000
ErrorException: Invalid argument supplied for foreach() (2)
#0 /var/www/html/forum/applications/cms/sources/Records/Records.php(1126): IPS\IPS::errorHandler(2, 'Invalid argumen...', '/var/www/html/f...', 1126, Array)
#1 /var/www/html/forum/system/Content/Search/Results.php(174): IPS\cms\_Records::searchResultExtraData(NULL)
#2 /var/www/html/forum/applications/core/modules/front/members/profile.php(210): IPS\Content\Search\_Results->init(true)
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\front\members\_profile->manage()
#4 /var/www/html/forum/applications/core/modules/front/members/profile.php(64): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#6 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#7 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('ErrorException:...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(ErrorException))
#2 {main}

-------------

Thu, 21 Jul 2016 13:49:42 +0000
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id='inj55ar0finmb1ub3rbklvi047'
IPS\Db\Exception: Table 'forum.core_sessions' doesn't exist (1146)
#0 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#1 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#2 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#3 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#4 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#5 /var/www/html/forum/system/Session/Session.php(91): session_start()
#6 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#7 /var/www/html/forum/system/Dispatcher/Standard.php(59): IPS\_Theme::i()
#8 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#9 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#10 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#13 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('SELECT * FROM `...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:52:23 +0000
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id='inj55ar0finmb1ub3rbklvi047'
IPS\Db\Exception: Table 'forum.core_sessions' doesn't exist (1146)
#0 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#1 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#2 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#3 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#4 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#5 /var/www/html/forum/system/Session/Session.php(91): session_start()
#6 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#7 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#8 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#9 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#10 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#13 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('SELECT * FROM `...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 13:54:22 +0000
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id='inj55ar0finmb1ub3rbklvi047'
IPS\Db\Exception: Table 'forum.core_sessions' doesn't exist (1146)
#0 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#1 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#2 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#3 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#4 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#5 /var/www/html/forum/system/Session/Session.php(91): session_start()
#6 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#7 /var/www/html/forum/system/Dispatcher/Standard.php(59): IPS\_Theme::i()
#8 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#9 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#10 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#13 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('SELECT * FROM `...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 14:01:54 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469109714, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"279e32d8b24392920279afecaed6e99f","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 14:01:59 +0000
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469109719, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"279e32d8b24392920279afecaed6e99f","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}

-------------

Thu, 21 Jul 2016 14:03:10 +0000

IPS\Db\Exception: Unknown database 'forum' (1049)
#0 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#1 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#2 /var/www/html/forum/system/Session/Session.php(91): session_start()
#3 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#4 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#5 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#6 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#7 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#8 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#9 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#10 {main}
#0 /var/www/html/forum/init.php(498): IPS\_Log::log('\nIPS\\Db\\Excepti...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}