<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

/**
* Addon Module Update
*/
class Addon_upd
{
	var $version = ADDON_VER;
	
	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	/**
	 * Installs the module, creating the necessary tables
	 */
	public function install()
	{
		// Insert module information into Modules table
		$data = array(
			"module_name" => ADDON_NAME, 
			"module_version" => $this->version, 
			"has_cp_backend" => "y",
			"has_publish_fields" => "n"
		);
		$this->EE->db->insert('modules', $data);
		
		// Create new database tables
		$this->EE->load->dbforge();
		
		// Settings Table
		$settings_table = array(
			"id"    => array("type" => "int", "constraint" => "10", "unsigned" => TRUE, "auto_increment" => TRUE),
			"name"  => array("type" => "varchar", "constraint" => "250"),
			"value" => array("type" => "text")
		);
		$this->EE->dbforge->add_field($settings_table);
		$this->EE->dbforge->add_key('id', TRUE);
		$this->EE->dbforge->create_table(ADDON_DB_SETTINGS);

		return TRUE;
	}

	/**
	 * Uninstalls the module, removing the database tables
	 */
	public function uninstall()
	{
		$module_id = $this->EE->db->select('module_id')->get_where('modules', array('module_name' => ADDON_NAME))->row('module_id');
		
		$this->EE->db->where('module_id', $module_id);
		$this->EE->db->delete('module_member_groups');
		
		$this->EE->db->where('module_name', ADDON_NAME);
		$this->EE->db->delete('modules');
		
		$this->EE->db->where('class', ADDON_NAME);
		$this->EE->db->delete('actions');
		
		$this->EE->load->dbforge();
		$this->EE->dbforge->drop_table(ADDON_DB_SETTINGS);
		
		return TRUE;
	}
	
	/**
	 * Update the module's database tables if necessary
	 * @param String $current The installed module's current version
	 */
	public function update($current = '')
	{
		return FALSE;
	}
}

// End File upd.addon.php
// File Source /system/expressionengine/third_party/addon/upd.addon.php