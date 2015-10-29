<?php
	/**
	* 
	*/
	class Marital extends CI_Controller
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

	        $this->load->model('marital_model');
		    $data['maritalList'] = $this->marital_model->getMaritalList();

			$data['main_content'] = 'admin/marital';
			$this->load->view('layouts/admin_template', $data);
		}


		function addMarital()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('marital_status', 'Marital Status', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('marital_model');
					$this->marital_model->addMaritalData();
					redirect('admin/marital');
	        	}
	        }

			$data['main_content'] = 'admin/add_marital';
			$this->load->view('layouts/admin_template', $data);

		}


		function editMarital($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('marital_model');
			if ($this->input->post()) {				
				if ($result = $this->marital_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('marital_id', $id)
	                            ->get('st_marital')->first_row('array');
	        $data['marital_data'] = $result;


			$data['main_content'] = 'admin/edit_marital';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteMarital($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('marital_model');
	        $this->marital_model->delete($id);

			redirect('admin/marital');
		}


	}//End Class


?>