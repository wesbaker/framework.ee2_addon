<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'addon/config.php';

$plugin_info = array(
	'pi_name'        => ADDON_NAME,
	'pi_version'     => ADDON_VER,
	'pi_author'      => ADDON_AUTHOR,
	'pi_author_url'  => ADDON_URL,
	'pi_description' => ADDON_DESC,
	'pi_usage'       => Plugin::usage()
);

/**
 * 
 */
class Plugin {
	var $return_data;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		$this->return_data = $this->EE->TMPL->tagdata;
	}
		
	public function usage()
	{
		ob_start(); 
		?>
		
		
		
		<?php
		$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}
}

// End File pi.addon.php
// File Source /system/expressionengine/third_party/addon/pi.addon.php