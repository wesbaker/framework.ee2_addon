<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

/**
 * 
 */
class Addon_ext
{
	var $settings        = array();
	var $name            = ADDON_NAME;
	var $version         = ADDON_VER;
	var $description     = ADDON_DESC;
	var $settings_exist  = 'n';
	var $docs_url        = ADDON_DOCS;

	function __construct($settings='')
	{
	    $this->settings = $settings;
	    $this->EE =& get_instance();
	}
	
	// Extension Required Methods ==================================================
	
	function activate_extension()
	{
		$hooks = array(
		  'publish_form_channel_preferences' => 'change_status'
		);
		
		foreach ($hooks as $hook => $method)
		{
			$sql[] = $this->EE->db->insert_string(
				'exp_extensions', 
				array(
					'extension_id' => '',
					'class'        => ucfirst(get_class($this)),
					'method'       => $method,
					'hook'         => $hook,
					'settings'     => "",
					'priority'     => 10,
					'version'      => $this->version,
					'enabled'      => "y"
				)
			);
		}

		// run all sql queries
		foreach ($sql as $query) { $this->EE->db->query($query); }
		return TRUE;
	}

	function update_extension($current='')
	{
	    if ($current == '' OR $current == $this->version)
	    {
	        return FALSE;
	    }
	    
		$this->EE->db->where('class', ucfirst(get_class($this)))
					 ->update('extensions', array("version" => $this->EE->db->escape_str($this->version)));
	}

	
	function disable_extension()
	{	    
		$this->EE->db->delete("exp_extensions", array("class" => ucfirst(get_class($this))));
	}

	// Hook Methods ================================================================

	public function change_status($channel_preferences)
	{
		var_dump($channel_preferences);
		die();
		return $channel_preferences;
	}
}

/* End of file ext.addon.php */
/* Location: ./system/expressionengine/third_party/addon/ext.addon.php */