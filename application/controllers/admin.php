<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->login();
		}
		
		public function login()
		{
			$data = array();

			if($this->input->post()){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Please enter username!', 'required');
				$this->form_validation->set_rules('password', 'Please enter password!', 'required');

				if ($this->form_validation->run() == FALSE)
                {
	                // $validation_errors = validation_errors();
	            }else{
	                $this->load->model('auth_model');
	                $result = $this->auth_model->validate();
	                if ($result) {
	                    $this->session->set_flashdata('alert_text', 'Welcome!.');
	                    redirect('admin/settings');
	                } else {
	                    //$data['alert']['text'] = 'Invalid Email (or) Password.Please try again.';
	                    $this->session->set_flashdata('alert_text', 'Invalid Username (or) Password.Please try again.');
	           		}
            	}

			}//end if

			$this->load->view('login', $data);

		}


		function logout()
		{
			$this->session->sess_destroy();
        	redirect('admin', 'refresh');
		}


	}//End Class

?>