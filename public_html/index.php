<?php

// Version
define('VERSION', '3.0.3.6');


// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (!defined('DIR_APPLICATION')) {
	header('Location: install/index.php');
	exit;
}

if (file_exists($li = DIR_APPLICATION.'/controller/extension/lightning/gamma.php')) require_once($li); //Lightning

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// BEGIN NitroPack
if (is_file(DIR_SYSTEM . 'library/nitropackio/hook/index_serve_cache.php')) {
    require_once(DIR_SYSTEM . 'library/nitropackio/hook/index_serve_cache.php');
}
// END NitroPack

start('catalog');