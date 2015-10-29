<?php
	/**
	* 
	*/
	class Religious extends CI_Controller
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

	        $this->load->model('religious_model');
		    $data['religiousList'] = $this->religious_model->getReligiousList();

			$data['main_content'] = 'admin/religious';
			$this->load->view('layouts/admin_template', $data);
		}

		function addReligious()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('religious_name', 'Religious Name', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('religious_model');
					$this->religious_model->addReligiousData();
					redirect('admin/religious');
	        	}
	        }

			$data['main_content'] = 'admin/add_religious';
			$this->load->view('layouts/admin_template', $data);

		}


		function editReligious($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }
	        

	        $this->load->model('religious_model');
			if ($this->input->post()) {				
				if ($result = $this->religious_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('reli_id', $id)
	                            ->get('st_religious')->first_row('array');
	        $data['religious_data'] = $result;


			$data['main_content'] = 'admin/edit_religious';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteReligious($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('religious_model');
	        $this->religious_model->delete($id);

			redirect('admin/religious');
		}




	}//End Class


?>