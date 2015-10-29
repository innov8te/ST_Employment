<?php
	/**
	* 
	*/
	class Countries extends CI_Controller
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
	        $this->load->model('countries_model');
		    $data['countriesList'] = $this->countries_model->getCountriesList();

			$data['main_content'] = 'admin/countries';
			$this->load->view('layouts/admin_template', $data);
		}


		function addCountry()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('country_name', 'Country Name', 'required');
	        	$this->form_validation->set_rules('nationality', 'Nationality', 'required');

	        	if ($this->form_validation->run() == FALSE) {
	        		//$this->session->set_flashdata('alert_text', validation_errors());
	        	}else{
	        		$this->load->model('countries_model');
					$this->countries_model->addCountryData();
					redirect('admin/countries');
	        	}

	        }

			$data['main_content'] = 'admin/add_country';
			$this->load->view('layouts/admin_template', $data);
		}


		function editCountry($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }
	        
	        $this->load->model('countries_model');
			if ($this->input->post()) {				
				//$data['country_data'] = $this->countries_model->edit($id);
				if ($result = $this->countries_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}

			}
			
			$result = $this->db->where('country_id', $id)
	                            ->get('st_countries')->first_row('array');
	        $data['country_data'] = $result;


			$data['main_content'] = 'admin/edit_country';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteCountry($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('countries_model');
	        $this->countries_model->delete($id);

			redirect('admin/countries');
		}




	}//End Class


?>