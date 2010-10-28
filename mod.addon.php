<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

/**
 * Addon Core Module File
 */
class Addon
{
	var $return_data = '';
	
	function __construct()
	{
		$this->EE =& get_instance();
	}
}

// End File mod.addon.php
// File Source /system/expressionengine/third_party/pundit/mod.addon.php