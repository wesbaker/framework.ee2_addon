<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

/**
 * 
 */
class Newcity_contact_acc {
	var $name        = ADDON_NAME;
	var $id          = '';
	var $version     = ADDON_VER;
	var $description = ADDON_DESC;
	var $sections    = array();
	var $extension   = '';

	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	
	public function set_sections()
	{
		$settings = $this->get_settings();
		
		$this->sections[''] = '';
	}
}

/* End of file acc.addon.php */
/* Location: ./system/expressionengine/third_party/addon/acc.addon.php */ 