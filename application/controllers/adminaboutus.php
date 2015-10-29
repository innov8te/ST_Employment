<?php
/**
* 
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminAboutus extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (!isLogin()) {
            redirect('admin');
        }

        if ($this->input->post()) {

        	if (isset($_FILES["aboutus_img"]['name']) && !empty($_FILES["aboutus_img"]["name"])) {
	            // upload favicon image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("aboutus_img")) {
	                return false;
	            } else {
	                $uploadedImage_aboutusImg = $this->upload->data();
	            }


	        }else{
	        	$uploadedImage_aboutusImg = "";
	        }

	        if($uploadedImage_aboutusImg == ""){
	        	$about_data = array(
	            	'page_title' => $this->input->post('about_tit'),
	            	'page_content' => $this->input->post('about_content')
	            );
	        }else{
	        	$about_data = array(
	            	'page_title' => $this->input->post('about_tit'),
	            	'page_content' => $this->input->post('about_content'),
	            	'page_image' => $uploadedImage_aboutusImg["file_name"]
	            );

	        }

        	
    		$this->db->where('page_parent', 'aboutus')
    				 ->update('st_pages', $about_data);


    		$this->session->set_flashdata('alert_text', 'Successfully update !');

    	}

    	$data['about_data'] = $this->db->where('page_parent', 'aboutus')
    										->get('st_pages')->first_row('array');


		$data['main_content'] = 'admin/aboutus';
		$this->load->view('layouts/admin_template',$data);
	}

}
?>