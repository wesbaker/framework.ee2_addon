<?php

require_once PATH_THIRD.'addon/config.php';

class Theme_utility
{	
	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	/**
	 * Theme URL
	 */
	function theme_url()
	{
		if (! isset($this->cache['theme_url']))
		{
			$theme_folder_url = $this->EE->config->item('theme_folder_url');
			if (substr($theme_folder_url, -1) != '/') $theme_folder_url .= '/';
			$this->cache['theme_url'] = $theme_folder_url.'third_party/'.strtolower(ADDON_NAME).'/';
		}

		return $this->cache['theme_url'];
	}

	/**
	 * Include Theme CSS
	 */
	function include_theme_css($file)
	{
		$this->EE->cp->add_to_head('<link rel="stylesheet" type="text/css" href="'.$this->theme_url().$file.'" />');
	}

	/**
	 * Include Theme JS
	 */
	function include_theme_js($file)
	{
		$this->EE->cp->add_to_foot('<script type="text/javascript" src="'.$this->theme_url().$file.'"></script>');
	}

	/**
	 * Insert JS
	 */
	function insert_js($js, $document_ready = FALSE)
	{
		$snippet = '<script type="text/javascript">'.$js.'</script>';
		if ($document_ready === TRUE) {
			$snippet = '<script type="text/javascript">$(document).ready(function() {'.$js.'});</script>';
		}
		$this->EE->cp->add_to_foot($snippet);
	}
}

// End File theme_utility.php
// File Source /system/expressionengine/third_party/addon/libraries/theme_utility.php