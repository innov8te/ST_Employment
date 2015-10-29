<?php
	/**
	* 
	*/
	class Agegroup extends CI_Controller
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

	        $this->load->model('agegroup_model');
		    $data['ageList'] = $this->agegroup_model->getAgeList();

			$data['main_content'] = 'admin/agegroup';
			$this->load->view('layouts/admin_template', $data);
		}


		function addAge()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('start', 'Age group start', 'required');
	        	$this->form_validation->set_rules('end', 'Age group end', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('agegroup_model');
					$this->agegroup_model->addAgeData();
					redirect('admin/age');
	        	}
	        }

			$data['main_content'] = 'admin/add_age';
			$this->load->view('layouts/admin_template', $data);

		}


		function editAge($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('agegroup_model');
			if ($this->input->post()) {				
				if ($result = $this->agegroup_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('age_id', $id)
	                            ->get('st_age_group')->first_row('array');
	        $data['age_data'] = $result;


			$data['main_content'] = 'admin/edit_age';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteAge($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('agegroup_model');
	        $this->agegroup_model->delete($id);

			redirect('admin/age');
		}




	}// End Class


?>