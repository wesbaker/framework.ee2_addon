<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

/**
 * 
 *
 * @package Pundit
 **/
class Base_model extends CI_Model {

	public function __construct()
	{
		parent::CI_Model();
		$this->EE =& get_instance();
	}
	
	/**
	 * 
	 * @param array $parameters An associative array of database columns and their data
	 * @param integer $limit The number of items to show, optional
	 * @param integer $offset The row number to start at, optional, but required if you're using $limit
	 */
	public function get($parameters = array(), $limit = NULL, $offset = NULL)
	{
		if ( ! is_null($limit)) { $this->EE->db->limit($limit, $offset);}
		
		if (isset($parameters['id'])) {
			return $this->EE->db->get(ADDON_DB_SETTINGS)->row();
		} else {
			return $this->EE->db->get(ADDON_DB_SETTINGS)->result();
		}
	}
	
	/**
	 * 
	 * @param array $parameters Associative array of database columns and their data
	 */
	public function save($parameters = array())
	{
		if (isset($parameters['name'])) { $this->EE->db->set('name', $parameters['name']); }
		if (isset($parameters['value'])) { $this->EE->db->set('value', $parameters['value']); }
		
		if (isset($parameters['id']) AND $this->_exists($parameters['id']) === TRUE) { 
			$this->EE->db->where('id', $parameters['id']);
			$this->EE->db->update(ADDON_DB_SETTINGS);
			return $this->EE->db->affected_rows();
		} else {
			$this->EE->db->insert(ADDON_DB_SETTINGS);
			return $this->EE->db->insert_id();
		}
	}
	
	/**
	 * 
	 * @param array $parameters Associative array of database columns and their data
	 */
	public function delete($parameters = array())
	{
		if (isset($parameters['id'])) {
			$this->EE->db->where('id', $parameters['id']);
		} else {
			show_error("Error (Base Model): Can't delete entry if you're not specifying an ID.");
		}
		
		$this->EE->db->delete(ADDON_DB_SETTINGS);
	}
	
	// Private Functions ======================================================
	
	/**
	 * Checks to see if a row exists in the database
	 * @param number $feed_id Feed ID to check for in the database
	 */
	private function _exists($id)
	{
		return $this->EE->db->where('id', $id)->count_all_results(ADDON_DB_SETTINGS) > 0;
	}
}

// End File base_model.php
// File Source /system/expressionengine/third_party/addon/models/base_moddelADDON_.php