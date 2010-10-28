<?php

// Establish IS_AJAX constant
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

if (! defined('ADDON_NAME'))
{
	define('ADDON_NAME', '');
	define('ADDON_VER',  '1.0');
	define('ADDON_DESC', '');
	define('ADDON_DOCS', '');
	define('ADDON_AUTHOR', '');
	define('ADDON_URL', '');
	
	define('ADDON_DB_SETTINGS', 'addon_settings');
}

$config['name']    = ADDON_NAME;
$config['version'] = ADDON_VER;
// $config['nsm_addon_updater']['versions_xml'] = '';