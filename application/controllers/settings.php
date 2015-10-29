<?php
	/**
	* 
	*/
	class Settings extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('upload');
		}

		function index()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }
	        
			$data = array();
			
			/*$this->load->model('settings_model');
			if($this->input->post()){
				$this->settings_model->updateSettingsData();
			}
			
			$data['settings_data'] = $this->settings_model->getSettingsData();*/


			/********************************************/
			$uploadedImage = array();     

			if (isset($_FILES["faviconimg"]['name']) && !empty($_FILES["faviconimg"]["name"])) {
	            // upload favicon image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("faviconimg")) {
	                return false;
	            } else {
	                $uploadedImage_favicon = $this->upload->data();
	            }


	            $this->db->where('page_parent', 'favicon')
					 ->update('st_pages', array("page_image" => $uploadedImage_favicon["file_name"]));

	        }
	        

	        if (isset($_FILES["sitelogoimg"]['name']) && !empty($_FILES["sitelogoimg"]["name"])) {
	            // upload site logo image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/";
	            //$config['max_width'] = 150;
            	//$config['max_height'] = 150;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("sitelogoimg")) {
	                return false;
	            } else {
	                $uploadedImage_sitelogo = $this->upload->data();
	            }

	            $this->db->where('page_parent', 'site_logo')
					 ->update('st_pages', array("page_image" => $uploadedImage_sitelogo["file_name"]));
	        }


			/*********************************************/

			if($this->input->post()){
				$this->db->where('page_parent', 'site_name')
					 ->update('st_pages', array("page_name" => $this->input->post('sitename')));

			}			

			$data['sitename'] = $this->db->where('page_parent','site_name')->get('st_pages')->first_row('array');			
			$data['faviconimg'] = $this->db->where('page_parent','favicon')->get('st_pages')->first_row('array');
			$data['sitelogoimg'] = $this->db->where('page_parent','site_logo')->get('st_pages')->first_row('array');						

			$data['main_content'] = 'admin/settings';
			$this->load->view('layouts/admin_template', $data);

		}




	}//End Class
?>