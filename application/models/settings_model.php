<?php
	if (!defined('BASEPATH')) exit ('No direct script access allowed');

	/**
	* 
	*/
	class Settings_Model extends CI_Model
	{
		
		function __construct()
		{
			# code...
		}

		function getSettingsData()
		{
			$query = $this->db->get('st_pages');
			// foreach ($query->result() as $row) {
			// 	$settingsData[] = array(

			// 	);
			// }

			// $site_name = $this->db->where('page_parent','site_name')->get('st_pages');

		}


		function updateSettingsData()
		{
			$this->db->where('page_parent', 'site_name')
					 ->update('st_pages', array("page_name" => $site_name));

		}


	}//End Class
?>