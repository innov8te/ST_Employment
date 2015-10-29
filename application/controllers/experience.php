<?php
	/**
	* 
	*/
	class Experience extends CI_Controller
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

	        $this->load->model('experience_model');
		    $data['experienceList'] = $this->experience_model->getExperienceList();

			$data['main_content'] = 'admin/experience';
			$this->load->view('layouts/admin_template', $data);
		}


		function addExperience()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('experience', 'Experience Name', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('experience_model');
					$this->experience_model->addExperienceData();
					redirect('admin/experience');
	        	}
	        }

			$data['main_content'] = 'admin/add_experience';
			$this->load->view('layouts/admin_template', $data);

		}


		function editExperience($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('experience_model');
			if ($this->input->post()) {				
				if ($result = $this->experience_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('exp_id', $id)
	                            ->get('st_experience')->first_row('array');
	        $data['experience_data'] = $result;


			$data['main_content'] = 'admin/edit_experience';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteExperience($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('experience_model');
	        $this->experience_model->delete($id);

			redirect('admin/experience');
		}




	}// End Class


?>