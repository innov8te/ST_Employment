<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class AdminHome extends CI_Controller
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

        	//$this->load->model('pages_model');
        	//$data['welcome_data'] = $this->pages_model->getAdminhomeWelcomeData();


        	if ($this->input->post()) {

	        	$hm_welcome_data = array(
	            	'page_title' => $this->input->post('welcome_tit'),
	            	'page_content' => $this->input->post('welcome_content')
	            );

        		$this->db->where('page_parent', 'welcome_heading')
        				 ->update('st_pages', $hm_welcome_data);
        				 
				$this->session->set_flashdata('alert_text', 'Successfully update !');


        	}

        	$data['hm_welcome_data'] = $this->db->where('page_parent', 'welcome_heading')
        										->get('st_pages')->first_row('array');


			$data['main_content'] = 'admin/home';
			$this->load->view('layouts/admin_template', $data);
		}


	}//End Class


?>