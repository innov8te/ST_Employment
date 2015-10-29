<?php
	/**
	* 
	*/
	class Type extends CI_Controller
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

	        $this->load->model('type_model');
		    $data['typeList'] = $this->type_model->getTypeList();

			$data['main_content'] = 'admin/type';
			$this->load->view('layouts/admin_template', $data);
		}


		function addType()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('type_name', 'Type Name', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('type_model');
					$this->type_model->addTypeData();
					redirect('admin/type');
	        	}
	        }

			$data['main_content'] = 'admin/add_type';
			$this->load->view('layouts/admin_template', $data);

		}


		function editType($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('type_model');
			if ($this->input->post()) {				
				if ($result = $this->type_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('type_id', $id)
	                            ->get('st_type')->first_row('array');
	        $data['type_data'] = $result;


			$data['main_content'] = 'admin/edit_type';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteType($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('type_model');
	        $this->type_model->delete($id);

			redirect('admin/type');
		}




	}// End Class


?>