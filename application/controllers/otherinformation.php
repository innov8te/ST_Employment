<?php
	/**
	* 
	*/
	class Otherinformation extends CI_Controller
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

	        $this->load->model('otherinfo_model');
		    $data['otherinfoList'] = $this->otherinfo_model->getOtherinfoList();

			$data['main_content'] = 'admin/otherinformation';
			$this->load->view('layouts/admin_template', $data);
		}

		function addOtherinfo()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('other_info_name', 'Other Information Name', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('otherinfo_model');
					$this->otherinfo_model->addOtherinfoData();
					redirect('admin/other_information');
	        	}
	        }

			$data['main_content'] = 'admin/add_other_information';
			$this->load->view('layouts/admin_template', $data);

		}


		function editOtherinfo($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('otherinfo_model');
			if ($this->input->post()) {				
				if ($result = $this->otherinfo_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('oth_id', $id)
	                            ->get('st_other_information')->first_row('array');
	        $data['otherinfo_data'] = $result;


			$data['main_content'] = 'admin/edit_other_information';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteOtherinfo($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('otherinfo_model');
	        $this->otherinfo_model->delete($id);

			redirect('admin/other_information');
		}






	}// End Class


?>