<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class AdminContact extends CI_Controller
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

	        	$contact_address_data = array(
	            	'page_content' => $this->input->post('contactus_address')
	            );
        		$this->db->where('page_parent', 'contactus_address')
        				 ->update('st_pages', $contact_address_data);



        		$contact_tel_data = array(
	            	'page_content' => $this->input->post('contactus_tel')
	            );
        		$this->db->where('page_parent', 'contactus_tel')
        				 ->update('st_pages', $contact_tel_data);



        		$contact_fax_data = array(
	            	'page_content' => $this->input->post('contactus_fax')
	            );
        		$this->db->where('page_parent', 'contactus_fax')
        				 ->update('st_pages', $contact_fax_data);



        		$contact_email_data = array(
	            	'page_content' => $this->input->post('contactus_email')
	            );
        		$this->db->where('page_parent', 'contactus_email')
        				 ->update('st_pages', $contact_email_data);


        		$this->session->set_flashdata('alert_text', 'Successfully update !');


        	}

        	$data['contactus_address_data'] = $this->db->where('page_parent', 'contactus_address')
        										->get('st_pages')->first_row('array');

        	$data['contactus_tel_data'] = $this->db->where('page_parent', 'contactus_tel')
        										->get('st_pages')->first_row('array');

        	$data['contactus_fax_data'] = $this->db->where('page_parent', 'contactus_fax')
        										->get('st_pages')->first_row('array');

       		$data['contactus_email_data'] = $this->db->where('page_parent', 'contactus_email')
        										->get('st_pages')->first_row('array');


			$data['main_content'] = 'admin/contactus';
			$this->load->view('layouts/admin_template', $data);
		}


	}//End Class


?>