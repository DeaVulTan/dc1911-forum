<?php exit; ?>

Thu, 21 Jul 2016 12:10:16 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469103016
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103016
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"eb4abd66356bd1c71df4e4887d7e033e","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:10:16 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103016
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"eb4abd66356bd1c71df4e4887d7e033e","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 12:11:22 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469103082
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103082
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"eb4abd66356bd1c71df4e4887d7e033e","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:11:22 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103082
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"eb4abd66356bd1c71df4e4887d7e033e","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 12:11:32 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469103092
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103092
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj1sYW5ndWFnZSZpZD0yJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"2a979a047c3f2edd7c481243c62d0c63","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj1sYW5ndWFnZSZpZD0yJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj1sYW5ndWFnZSZpZD0yJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj1sYW5ndWFnZSZpZD0yJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:11:32 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103092
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj1sYW5ndWFnZSZpZD0yJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"2a979a047c3f2edd7c481243c62d0c63","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 12:12:05 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469103125
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_file_logs` ( `log_action`, `log_type`, `log_configuration_id`, `log_method`, `log_filename`, `log_url`, `log_container`, `log_msg`, `log_date`, `log_data` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )
Array
(
    [0] => delete
    [1] => log
    [2] => 1
    [3] => FileSystem
    [4] => root_map.js.5bd3298bb492118f34a6e54134d041c2.js
    [5] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [6] => javascript_global
    [7] => file_deletion
    [8] => 1469103125
    [9] => {"\/profile\/1-admin\/":""}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/File.php                                                      | [IPS\_Db].insert                                                              | 1329              |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/FileSystem.php                                                | [IPS\_File].log                                                               | 351               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\File\_FileSystem].delete                                                 | 922               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript]._writeJavascriptFromResultset                        | 770               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript].compile                                              | 895               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\Output\_Javascript].compile                                              | 471               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\_Output]._getJavascriptFileObject                                        | 286               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/front/members/profile.php                       | [IPS\_Output].js                                                              | 52                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\core\modules\front\members\_profile].execute                             | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#4 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#5 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#6 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#7 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#8 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_profile.j...')
#9 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_profile.j...')
#10 /var/www/html/forum/applications/core/modules/front/members/profile.php(52): IPS\_Output->js('front_profile.j...', 'core')
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#13 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/index.php?/profile/1-admin/
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /index.php?/profile/1-admin/
                    [query] => /profile/1-admin/
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 1
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/File.php                                                      | [IPS\_Db].insert                                                              | 1329              |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/FileSystem.php                                                | [IPS\_File].log                                                               | 351               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\File\_FileSystem].delete                                                 | 922               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript]._writeJavascriptFromResultset                        | 770               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript].compile                                              | 895               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\Output\_Javascript].compile                                              | 471               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\_Output]._getJavascriptFileObject                                        | 286               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/front/members/profile.php                       | [IPS\_Output].js                                                              | 52                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\core\modules\front\members\_profile].execute                             | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#9 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#10 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#11 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#12 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#13 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_profile.j...')
#14 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_profile.j...')
#15 /var/www/html/forum/applications/core/modules/front/members/profile.php(52): IPS\_Output->js('front_profile.j...', 'core')
#16 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#17 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#18 {main}

-------------

Thu, 21 Jul 2016 12:12:05 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_file_logs` ( `log_action`, `log_type`, `log_configuration_id`, `log_method`, `log_filename`, `log_url`, `log_container`, `log_msg`, `log_date`, `log_data` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )
Array
(
    [0] => delete
    [1] => log
    [2] => 1
    [3] => FileSystem
    [4] => root_map.js.5bd3298bb492118f34a6e54134d041c2.js
    [5] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [6] => javascript_global
    [7] => file_deletion
    [8] => 1469103125
    [9] => {"\/profile\/1-admin\/":""}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/File.php                                                      | [IPS\_Db].insert                                                              | 1329              |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/FileSystem.php                                                | [IPS\_File].log                                                               | 351               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\File\_FileSystem].delete                                                 | 922               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript]._writeJavascriptFromResultset                        | 770               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript].compile                                              | 895               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\Output\_Javascript].compile                                              | 471               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\_Output]._getJavascriptFileObject                                        | 286               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/front/members/profile.php                       | [IPS\_Output].js                                                              | 52                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\core\modules\front\members\_profile].execute                             | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#4 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#5 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#6 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#7 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#8 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_profile.j...')
#9 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_profile.j...')
#10 /var/www/html/forum/applications/core/modules/front/members/profile.php(52): IPS\_Output->js('front_profile.j...', 'core')
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:13:15 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469103195
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103195
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj10aGVtZSZpZD0xJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"bb4728ec9282542c5abdeebf8176f19f","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj10aGVtZSZpZD0xJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj10aGVtZSZpZD0xJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj10aGVtZSZpZD0xJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:13:15 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469103195
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJmFwcD1jb3JlJm1vZHVsZT1zeXN0ZW0mY29udHJvbGxlcj10aGVtZSZpZD0xJmNzcmZLZXk9NzIzOTk5NTJkZTMxMDFkN2U2ZjE1ZTg3NWQ2MDYyNDQ=","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"bb4728ec9282542c5abdeebf8176f19f","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 12:15:47 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469103347
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_file_logs` ( `log_action`, `log_type`, `log_configuration_id`, `log_method`, `log_filename`, `log_url`, `log_container`, `log_msg`, `log_date`, `log_data` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )
Array
(
    [0] => delete
    [1] => log
    [2] => 1
    [3] => FileSystem
    [4] => root_map.js.5bd3298bb492118f34a6e54134d041c2.js
    [5] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [6] => javascript_global
    [7] => file_deletion
    [8] => 1469103347
    [9] => {"\/profile\/1-admin\/":""}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/File.php                                                      | [IPS\_Db].insert                                                              | 1329              |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/FileSystem.php                                                | [IPS\_File].log                                                               | 351               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\File\_FileSystem].delete                                                 | 922               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript]._writeJavascriptFromResultset                        | 770               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript].compile                                              | 895               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\Output\_Javascript].compile                                              | 471               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\_Output]._getJavascriptFileObject                                        | 286               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/front/members/profile.php                       | [IPS\_Output].js                                                              | 53                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\core\modules\front\members\_profile].execute                             | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#4 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#5 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#6 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#7 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#8 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_statuses....')
#9 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_statuses....')
#10 /var/www/html/forum/applications/core/modules/front/members/profile.php(53): IPS\_Output->js('front_statuses....', 'core')
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#13 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/index.php?/profile/1-admin/
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /index.php?/profile/1-admin/
                    [query] => /profile/1-admin/
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 1
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/File.php                                                      | [IPS\_Db].insert                                                              | 1329              |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/FileSystem.php                                                | [IPS\_File].log                                                               | 351               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\File\_FileSystem].delete                                                 | 922               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript]._writeJavascriptFromResultset                        | 770               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript].compile                                              | 895               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\Output\_Javascript].compile                                              | 471               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\_Output]._getJavascriptFileObject                                        | 286               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/front/members/profile.php                       | [IPS\_Output].js                                                              | 53                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\core\modules\front\members\_profile].execute                             | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#9 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#10 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#11 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#12 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#13 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_statuses....')
#14 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_statuses....')
#15 /var/www/html/forum/applications/core/modules/front/members/profile.php(53): IPS\_Output->js('front_statuses....', 'core')
#16 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#17 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#18 {main}

-------------

Thu, 21 Jul 2016 12:15:47 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_file_logs` ( `log_action`, `log_type`, `log_configuration_id`, `log_method`, `log_filename`, `log_url`, `log_container`, `log_msg`, `log_date`, `log_data` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )
Array
(
    [0] => delete
    [1] => log
    [2] => 1
    [3] => FileSystem
    [4] => root_map.js.5bd3298bb492118f34a6e54134d041c2.js
    [5] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /uploads/javascript_global/root_map.js.5bd3298bb492118f34a6e54134d041c2.js
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [6] => javascript_global
    [7] => file_deletion
    [8] => 1469103347
    [9] => {"\/profile\/1-admin\/":""}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/File.php                                                      | [IPS\_Db].insert                                                              | 1329              |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/File/FileSystem.php                                                | [IPS\_File].log                                                               | 351               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\File\_FileSystem].delete                                                 | 922               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript]._writeJavascriptFromResultset                        | 770               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Javascript/Javascript.php                                   | [IPS\Output\_Javascript].compile                                              | 895               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\Output\_Javascript].compile                                              | 471               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Output/Output.php                                                  | [IPS\_Output]._getJavascriptFileObject                                        | 286               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/front/members/profile.php                       | [IPS\_Output].js                                                              | 53                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\core\modules\front\members\_profile].execute                             | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/File/File.php(1329): IPS\_Db->insert('core_file_logs', Array)
#4 /var/www/html/forum/system/File/FileSystem.php(351): IPS\_File->log('file_deletion', 'delete', Array, 'log')
#5 /var/www/html/forum/system/Output/Javascript/Javascript.php(922): IPS\File\_FileSystem->delete()
#6 /var/www/html/forum/system/Output/Javascript/Javascript.php(770): IPS\Output\_Javascript::_writeJavascriptFromResultset(Array, 'map.js', 'global', 'root')
#7 /var/www/html/forum/system/Output/Javascript/Javascript.php(895): IPS\Output\_Javascript::compile('global', 'root', 'map.js')
#8 /var/www/html/forum/system/Output/Output.php(471): IPS\Output\_Javascript::compile('core', 'front', 'front_statuses....')
#9 /var/www/html/forum/system/Output/Output.php(286): IPS\_Output::_getJavascriptFileObject('core', 'front', 'front_statuses....')
#10 /var/www/html/forum/applications/core/modules/front/members/profile.php(53): IPS\_Output->js('front_statuses....', 'core')
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#12 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:27:28 +0000
Unknown database 'forum'
 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 121               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].i                                                                   | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Unknown databas...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(121): IPS\Db\_Exception->__construct('Unknown databas...', 1049)
#2 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#3 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#4 /var/www/html/forum/system/Session/Session.php(91): session_start()
#5 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#6 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#7 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#8 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#9 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#10 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#11 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#12 {main}

-------------

Thu, 21 Jul 2016 12:38:03 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469104683
    [1] => INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( '195.158.2.220', 'ADMIN', 1469104682, 1, '{"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"ab83e237c593dfa1d531f54d4c1d44db","auth":"ADMIN","password":"*******8"}' )
IPS\Db\Exception: Duplicate entry '0' for key 'PRIMARY' (1062)
#0 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#1 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#2 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#4 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#6 {main}
    [2] => #0 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#2 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => uncaught_exception
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php                                                                  | [IPS\_Log].log                                                                | 498               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\IPS].exceptionHandler                                                    |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/init.php(498): IPS\_Log::log('INSERT INTO `co...', 'uncaught_except...')
#6 [internal function]: IPS\IPS::exceptionHandler(Object(IPS\Db\Exception))
#7 {main}

-------------

Thu, 21 Jul 2016 12:39:36 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469104776
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469104776
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"ab83e237c593dfa1d531f54d4c1d44db","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 12:39:36 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469104776
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"ab83e237c593dfa1d531f54d4c1d44db","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 12:45:22 +0000
Table 'forum.core_sessions' doesn't exist
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id=?
Array
(
    [0] => inj55ar0finmb1ub3rbklvi047
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\_Db].preparedQuery                                                       | 346               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].runQuery                                                     | 408               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].rewind                                                       | 329               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\Db\_Select].first                                                        | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 59                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'SELECT * FROM `...', Array)
#2 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#3 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#4 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#5 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#6 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#7 /var/www/html/forum/system/Session/Session.php(91): session_start()
#8 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#9 /var/www/html/forum/system/Dispatcher/Standard.php(59): IPS\_Theme::i()
#10 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#11 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#12 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#13 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#14 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#15 {main}

-------------

Thu, 21 Jul 2016 13:00:59 +0000
Table 'forum.core_sessions' doesn't exist
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id=?
Array
(
    [0] => inj55ar0finmb1ub3rbklvi047
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\_Db].preparedQuery                                                       | 346               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].runQuery                                                     | 408               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].rewind                                                       | 329               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\Db\_Select].first                                                        | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'SELECT * FROM `...', Array)
#2 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#3 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#4 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#5 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#6 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#7 /var/www/html/forum/system/Session/Session.php(91): session_start()
#8 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#9 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#10 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#11 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#12 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#13 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#14 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#15 {main}

-------------

Thu, 21 Jul 2016 13:00:59 +0000
Table 'forum.core_sessions' doesn't exist
REPLACE INTO `core_sessions` ( `member_name`, `member_id`, `data`, `current_appcomponent`, `current_module`, `current_controller`, `current_id` ) VALUES ( ?, NULL, ?, ?, ?, NULL, ? )
Array
(
    [0] => 
    [1] => 
    [2] => 
    [3] => 
    [4] => 
    [5] => 
    [6] => 0
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 688               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].replace                                                             | 300               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].write                                                    |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'REPLACE INTO `c...', Array)
#2 /var/www/html/forum/system/Db/Db.php(688): IPS\_Db->preparedQuery('REPLACE INTO `c...', Array)
#3 /var/www/html/forum/system/Session/Front.php(300): IPS\_Db->replace('core_sessions', Array, true)
#4 [internal function]: IPS\Session\_Front->write('inj55ar0finmb1u...', '')
#5 {main}

-------------

Thu, 21 Jul 2016 13:21:54 +0000
Access denied for user 'root'@'localhost' (using password: NO)
 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 121               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].i                                                                   | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Access denied f...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(121): IPS\Db\_Exception->__construct('Access denied f...', 1045)
#2 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#3 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#4 /var/www/html/forum/system/Session/Session.php(91): session_start()
#5 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#6 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#7 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#8 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#9 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#10 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#11 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#12 {main}

-------------

Thu, 21 Jul 2016 13:45:31 +0000
Access denied for user 'root'@'localhost' (using password: NO)
 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 121               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].i                                                                   | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Access denied f...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(121): IPS\Db\_Exception->__construct('Access denied f...', 1045)
#2 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#3 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#4 /var/www/html/forum/system/Session/Session.php(91): session_start()
#5 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#6 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#7 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#8 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#9 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#10 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#11 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#12 {main}

-------------

Thu, 21 Jul 2016 13:46:16 +0000
Access denied for user 'root'@'localhost' (using password: NO)
 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 121               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].i                                                                   | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Access denied f...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(121): IPS\Db\_Exception->__construct('Access denied f...', 1045)
#2 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#3 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#4 /var/www/html/forum/system/Session/Session.php(91): session_start()
#5 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#6 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#7 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#8 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#9 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#10 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#11 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#12 {main}

-------------

Thu, 21 Jul 2016 13:47:17 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469108837
    [1] => ErrorException: Invalid argument supplied for foreach() (2)
#0 /var/www/html/forum/applications/cms/sources/Records/Records.php(1126): IPS\IPS::errorHandler(2, 'Invalid argumen...', '/var/www/html/f...', 1126, Array)
#1 /var/www/html/forum/system/Content/Search/Results.php(174): IPS\cms\_Records::searchResultExtraData(NULL)
#2 /var/www/html/forum/applications/core/modules/front/members/profile.php(210): IPS\Content\Search\_Results->init(true)
#3 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\front\members\_profile->manage()
#4 /var/www/html/forum/applications/core/modules/front/members/profile.php(64): IPS\Dispatcher\_Controller->execute()
#5 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\core\modules\front\members\_profile->execute()
#6 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#7 {main}
    [2] => #0 /var/www/html/forum/init.php(498): IPS\_Log::log('ErrorException:...', 'uncaught_except...')
#1 [internal function]: IPS\IPS::exceptionHandler(Object(ErrorException))
#2 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/index.php?/profile/1-admin/
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /index.php?/profile/1-admin/
                    [query] => /profile/1-admin/
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 1
    [5] => uncaught_exception
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php                                                                  | [IPS\_Log].log                                                                | 498               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\IPS].exceptionHandler                                                    |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/init.php(498): IPS\_Log::log('ErrorException:...', 'uncaught_except...')
#6 [internal function]: IPS\IPS::exceptionHandler(Object(ErrorException))
#7 {main}

-------------

Thu, 21 Jul 2016 13:49:42 +0000
Table 'forum.core_sessions' doesn't exist
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id=?
Array
(
    [0] => inj55ar0finmb1ub3rbklvi047
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\_Db].preparedQuery                                                       | 346               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].runQuery                                                     | 408               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].rewind                                                       | 329               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\Db\_Select].first                                                        | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 59                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'SELECT * FROM `...', Array)
#2 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#3 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#4 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#5 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#6 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#7 /var/www/html/forum/system/Session/Session.php(91): session_start()
#8 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#9 /var/www/html/forum/system/Dispatcher/Standard.php(59): IPS\_Theme::i()
#10 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#11 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#12 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#13 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#14 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#15 {main}

-------------

Thu, 21 Jul 2016 13:52:23 +0000
Table 'forum.core_sessions' doesn't exist
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id=?
Array
(
    [0] => inj55ar0finmb1ub3rbklvi047
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\_Db].preparedQuery                                                       | 346               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].runQuery                                                     | 408               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].rewind                                                       | 329               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\Db\_Select].first                                                        | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'SELECT * FROM `...', Array)
#2 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#3 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#4 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#5 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#6 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#7 /var/www/html/forum/system/Session/Session.php(91): session_start()
#8 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#9 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#10 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#11 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#12 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#13 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#14 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#15 {main}

-------------

Thu, 21 Jul 2016 13:52:23 +0000
Table 'forum.core_sessions' doesn't exist
REPLACE INTO `core_sessions` ( `member_name`, `member_id`, `data`, `current_appcomponent`, `current_module`, `current_controller`, `current_id` ) VALUES ( ?, NULL, ?, ?, ?, NULL, ? )
Array
(
    [0] => 
    [1] => 
    [2] => 
    [3] => 
    [4] => 
    [5] => 
    [6] => 0
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 688               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].replace                                                             | 300               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].write                                                    |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'REPLACE INTO `c...', Array)
#2 /var/www/html/forum/system/Db/Db.php(688): IPS\_Db->preparedQuery('REPLACE INTO `c...', Array)
#3 /var/www/html/forum/system/Session/Front.php(300): IPS\_Db->replace('core_sessions', Array, true)
#4 [internal function]: IPS\Session\_Front->write('inj55ar0finmb1u...', '')
#5 {main}

-------------

Thu, 21 Jul 2016 13:54:22 +0000
Table 'forum.core_sessions' doesn't exist
SELECT * FROM `core_sessions` LEFT JOIN `core_members` ON core_members.member_id=core_sessions.member_id WHERE id=?
Array
(
    [0] => inj55ar0finmb1ub3rbklvi047
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 388               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\_Db].preparedQuery                                                       | 346               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].runQuery                                                     | 408               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Select.php                                                      | [IPS\Db\_Select].rewind                                                       | 329               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\Db\_Select].first                                                        | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 59                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Table 'forum.co...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(388): IPS\Db\_Exception->__construct('Table 'forum.co...', 1146, NULL, 'SELECT * FROM `...', Array)
#2 /var/www/html/forum/system/Db/Select.php(346): IPS\_Db->preparedQuery('SELECT * FROM `...', Array)
#3 /var/www/html/forum/system/Db/Select.php(408): IPS\Db\_Select->runQuery()
#4 /var/www/html/forum/system/Db/Select.php(329): IPS\Db\_Select->rewind()
#5 /var/www/html/forum/system/Session/Front.php(88): IPS\Db\_Select->first()
#6 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#7 /var/www/html/forum/system/Session/Session.php(91): session_start()
#8 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#9 /var/www/html/forum/system/Dispatcher/Standard.php(59): IPS\_Theme::i()
#10 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#11 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#12 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#13 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#14 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#15 {main}

-------------

Thu, 21 Jul 2016 14:01:25 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `exception_class`, `exception_code`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469109685
    [1] => OutOfRangeException
    [2] => 0
    [3] => 
    [4] => #0 /var/www/html/forum/system/Dispatcher/Front.php(466): IPS\_Widget::load(Object(IPS\bimchatbox\Application), 'bimchatbox', 'be0shyqnr', Array, NULL, 'horizontal')
#1 /var/www/html/forum/system/Dispatcher/Dispatcher.php(131): IPS\Dispatcher\_Front->finish()
#2 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#3 {main}
    [5] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [6] => 1
    [7] => dispatcher
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\_Log].log                                                                | 475               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Front].finish                                                | 131               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Dispatcher/Front.php(475): IPS\_Log::log(Object(OutOfRangeException), 'dispatcher')
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(131): IPS\Dispatcher\_Front->finish()
#7 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 14:01:31 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `exception_class`, `exception_code`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469109691
    [1] => OutOfRangeException
    [2] => 0
    [3] => 
    [4] => #0 /var/www/html/forum/system/Dispatcher/Front.php(466): IPS\_Widget::load(Object(IPS\bimchatbox\Application), 'bimchatbox', 'be0shyqnr', Array, NULL, 'horizontal')
#1 /var/www/html/forum/system/Dispatcher/Dispatcher.php(131): IPS\Dispatcher\_Front->finish()
#2 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#3 {main}
    [5] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /
                )

            [queryString] => Array
                (
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [6] => 1
    [7] => dispatcher
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\_Log].log                                                                | 475               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Front].finish                                                | 131               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Dispatcher/Front.php(475): IPS\_Log::log(Object(OutOfRangeException), 'dispatcher')
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(131): IPS\Dispatcher\_Front->finish()
#7 /var/www/html/forum/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 14:01:54 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469109714
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469109714
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"279e32d8b24392920279afecaed6e99f","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 14:01:54 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469109714
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"279e32d8b24392920279afecaed6e99f","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 14:01:59 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_log` ( `time`, `message`, `backtrace`, `url`, `member_id`, `category` ) VALUES ( ?, ?, ?, ?, ?, ? )
Array
(
    [0] => 1469109719
    [1] => Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469109719
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"279e32d8b24392920279afecaed6e99f","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
    [2] => #0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}
    [3] => IPS\Http\Url Object
        (
            [url:protected] => http://forum.defcon.uz/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/?adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
            [data] => Array
                (
                    [scheme] => http
                    [host] => forum.defcon.uz
                    [path] => /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/
                    [query] => adsess=ddd5rotah06k5v5u44egh68113&app=core&module=system&controller=login&ref=YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg%3D%3D
                )

            [queryString] => Array
                (
                    [adsess] => ddd5rotah06k5v5u44egh68113
                    [app] => core
                    [module] => system
                    [controller] => login
                    [ref] => YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==
                )

            [isInternal] => 1
            [isFriendly] => 1
        )

    [4] => 0
    [5] => sql
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Patterns/ActiveRecord.php                                          | [IPS\_Db].insert                                                              | 441               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Log/Log.php                                                        | [IPS\Patterns\_ActiveRecord].save                                             | 112               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Exception.php                                                   | [IPS\_Log].log                                                                | 109               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/system/Patterns/ActiveRecord.php(441): IPS\_Db->insert('core_log', Array)
#4 /var/www/html/forum/system/Log/Log.php(112): IPS\Patterns\_ActiveRecord->save()
#5 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#6 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#7 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#8 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#9 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#10 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#11 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#12 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#13 {main}

-------------

Thu, 21 Jul 2016 14:01:59 +0000
Duplicate entry '0' for key 'PRIMARY'
INSERT INTO `core_admin_login_logs` ( `admin_ip_address`, `admin_username`, `admin_time`, `admin_success`, `admin_request` ) VALUES ( ?, ?, ?, ?, ? )
Array
(
    [0] => 195.158.2.220
    [1] => ADMIN
    [2] => 1469109719
    [3] => 1
    [4] => {"adsess":"ddd5rotah06k5v5u44egh68113","app":"core","module":"system","controller":"login","ref":"YWRzZXNzPWRkZDVyb3RhaDA2azV2NXU0NGVnaDY4MTEzJg==","login__standard_submitted":"1","csrfKey":"72399952de3101d7e6f15e875d606244","MAX_FILE_SIZE":"32505856","plupload":"279e32d8b24392920279afecaed6e99f","auth":"ADMIN","password":"*******8"}
)

 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 427               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Db/Db.php                                                          | [IPS\_Db].preparedQuery                                                       | 661               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\_Db].insert                                                              | 173               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /applications/core/modules/admin/system/login.php                          | [IPS\core\modules\admin\system\_login].log                                    | 62                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Controller.php                                          | [IPS\core\modules\admin\system\_login].manage                                 | 96                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\_Controller].execute                                          | 129               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php                                | [IPS\_Dispatcher].run                                                         | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Duplicate entry...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(427): IPS\Db\_Exception->__construct('Duplicate entry...', 1062, NULL, 'INSERT INTO `co...', Array)
#2 /var/www/html/forum/system/Db/Db.php(661): IPS\_Db->preparedQuery('INSERT INTO `co...', Array)
#3 /var/www/html/forum/applications/core/modules/admin/system/login.php(173): IPS\_Db->insert('core_admin_logi...', Array)
#4 /var/www/html/forum/applications/core/modules/admin/system/login.php(62): IPS\core\modules\admin\system\_login->log('ok')
#5 /var/www/html/forum/system/Dispatcher/Controller.php(96): IPS\core\modules\admin\system\_login->manage()
#6 /var/www/html/forum/system/Dispatcher/Dispatcher.php(129): IPS\Dispatcher\_Controller->execute()
#7 /var/www/html/forum/MeQ0prXz8WdH0Jc3R6AHxjWAYAPEtRUl/index.php(13): IPS\_Dispatcher->run()
#8 {main}

-------------

Thu, 21 Jul 2016 14:03:10 +0000
Unknown database 'forum'
 | File                                                                       | Function                                                                      | Line No.          |
 |----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------|
 | /system/Db/Db.php                                                          | [IPS\Db\_Exception].__construct                                               | 121               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Front.php                                                  | [IPS\_Db].i                                                                   | 88                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 |                                                                            | [IPS\Session\_Front].read                                                     |                   |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Session/Session.php                                                | [].session_start                                                              | 91                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Theme/Theme.php                                                    | [IPS\_Session].i                                                              | 245               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Standard.php                                            | [IPS\_Theme].i                                                                | 50                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Standard].baseCss                                            | 546               |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Front.php                                               | [IPS\Dispatcher\_Front].baseCss                                               | 64                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /init.php(434) : eval()'d code                                             | [IPS\Dispatcher\_Front].init                                                  | 7                 |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /system/Dispatcher/Dispatcher.php                                          | [IPS\Dispatcher\tos_hook_tosCheck].init                                       | 86                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
 | /index.php                                                                 | [IPS\_Dispatcher].i                                                           | 13                |
 '----------------------------------------------------------------------------+-------------------------------------------------------------------------------+-------------------'
#0 /var/www/html/forum/system/Db/Exception.php(109): IPS\_Log::log('Unknown databas...', 'sql')
#1 /var/www/html/forum/system/Db/Db.php(121): IPS\Db\_Exception->__construct('Unknown databas...', 1049)
#2 /var/www/html/forum/system/Session/Front.php(88): IPS\_Db::i()
#3 [internal function]: IPS\Session\_Front->read('inj55ar0finmb1u...')
#4 /var/www/html/forum/system/Session/Session.php(91): session_start()
#5 /var/www/html/forum/system/Theme/Theme.php(245): IPS\_Session::i()
#6 /var/www/html/forum/system/Dispatcher/Standard.php(50): IPS\_Theme::i()
#7 /var/www/html/forum/system/Dispatcher/Front.php(546): IPS\Dispatcher\_Standard::baseCss()
#8 /var/www/html/forum/system/Dispatcher/Front.php(64): IPS\Dispatcher\_Front::baseCss()
#9 /var/www/html/forum/init.php(434) : eval()'d code(7): IPS\Dispatcher\_Front->init()
#10 /var/www/html/forum/system/Dispatcher/Dispatcher.php(86): IPS\Dispatcher\tos_hook_tosCheck->init()
#11 /var/www/html/forum/index.php(13): IPS\_Dispatcher::i()
#12 {main}