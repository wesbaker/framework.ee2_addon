<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

/**
* Addon Control Panel
*/
class Addon_mcp
{
	function __construct()
	{
		$this->EE =& get_instance();
		
		// Setup the base url to the module
		if (isset($this->EE->cp)) { $this->base = 'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=addon'; }
		
		// Build the global module navigation
		$this->EE->cp->set_right_nav(array(
			"nav_home" => BASE.AMP.$this->base, 
		));
	}
	
	/**
	 * 
	 */
	public function index()
	{

	}
}

// End File mcp.addon.php
// File Source /system/expressionengine/third_party/addon/mcp.addon.php