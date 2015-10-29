<?php
	/**
	* 
	*/
	class Slider extends CI_Controller
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

	        $this->load->model('slider_model');
		    $data['sliderList'] = $this->slider_model->getSliderList();

			$data['main_content'] = 'admin/slider';
			$this->load->view('layouts/admin_template', $data);
		}


		function addSlider()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('slider_name', 'Name', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('slider_model');
					$this->slider_model->addSliderData();
					redirect('admin/slider');
	        	}
	        }

			$data['main_content'] = 'admin/add_slider';
			$this->load->view('layouts/admin_template', $data);

		}


		function editSlider($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('slider_model');
			if ($this->input->post()) {	
				$this->load->library('form_validation');
	        	$this->form_validation->set_rules('slider_name', 'Name', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		if ($result = $this->slider_model->edit($id)) {
						$this->session->set_flashdata('alert_text', 'Successfully update !');
					}
	        	}		
				
			}
			
			$result = $this->db->where('slide_id', $id)
	                            ->get('st_slider')->first_row('array');
	        $data['slider_data'] = $result;


			$data['main_content'] = 'admin/edit_slider';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteSlider($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('slider_model');
	        $this->slider_model->delete($id);

			redirect('admin/slider');
		}




	}// End Class


?>