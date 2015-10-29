<?php
	/**
	* 
	*/
	class Maids extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library("pagination");
		}


		function index()
		{			
			if (!isLogin()) {
	            redirect('admin');
	        }

			$this->load->model('maids_model');

			/* pagination */
        	$config = array();
	        $config["base_url"] = base_url() . "admin/maids";
	        $config["total_rows"] = $this->maids_model->maids_record_count();
	        $config["per_page"] = 15;
	        $config["uri_segment"] = 3;
	        $config['use_page_numbers'] = TRUE;

    		//config for bootstrap pagination class integration
	        $config['full_tag_open'] = '<ul class="pagination">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = '&laquo';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = '&raquo';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';

	        $this->pagination->initialize($config);

	        $page_no = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        if (empty($page_no))
            $page_no = 1;
        	$offset = ($page_no - 1) * $config['per_page'];

	        $param['limit'] = $config['per_page'];
        	$param['start'] = $offset;
	        $data["links"] = $this->pagination->create_links();

        	/**************************************/

			$data['maidsList'] = $this->maids_model->getMaidsList($param);

			$data['main_content'] = 'admin/maids';
			$this->load->view('layouts/admin_template', $data);
		}

		function addMaid()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('maids_model');

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('maid_name', 'Name', 'required');
	        	$this->form_validation->set_rules('ref_code', 'REF.CODE', 'required');
	        	$this->form_validation->set_rules('salary', 'Salary', 'required');
	        	$this->form_validation->set_rules('maid_agency', 'Maid Agency', 'required');
	        	$this->form_validation->set_rules('working_experience', 'Working Experience', 'required');

	        	if ($this->form_validation->run() == FALSE) { 

	        	}else{	        		
					$this->maids_model->addMaidData();
					redirect('admin/maids');
	        	}
	        }

	        $data['typeList'] = $this->maids_model->getTypeData();
	        $data['countriesList'] = $this->maids_model->getCountriesData();
	        $data['religiousList'] = $this->maids_model->getReligiousList();
	        $data['maritalList'] = $this->maids_model->getMaritalList();
	        $data['experienceList'] = $this->maids_model->getExperienceList();
	        $data['otherinfoList'] = $this->maids_model->getOtherinfoList();


			$data['main_content'] = 'admin/add_maid';
			$this->load->view('layouts/admin_template', $data);
		}


		function editMaid($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('maids_model');
			if ($this->input->post()) {				
				if ($result = $this->maids_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('maid_id', $id)
	                            ->get('st_maids')->first_row('array');

	        $result1 = $this->db->where('info_maid_id', $id)
	                            ->get('st_maid_info')->first_row('array');

	        $data['maid_data'] = $result;

	        $data['maid_info_data'] = $result1;


	        $result2 = $this->db->where('mexp_maid_id', $id)
	                            ->get('st_maid_exp');

	        $data['maid_exp_data'] = $result2;


	        $data['typeList'] = $this->maids_model->getTypeData();
	        $data['countriesList'] = $this->maids_model->getCountriesData();
	        $data['religiousList'] = $this->maids_model->getReligiousList();
	        $data['maritalList'] = $this->maids_model->getMaritalList();
	        $data['experienceList'] = $this->maids_model->getExperienceList();
	        $data['otherinfoList'] = $this->maids_model->getOtherinfoList();


	        $data['maidExpDataList'] = $this->maids_model->getMiadExpData();

	        $data['maidOthDataList'] = $this->maids_model->getMiadOthData();

			$data['main_content'] = 'admin/edit_maid';
			$this->load->view('layouts/admin_template', $data);
		}



		function pageSetting()
		{
			$data['main_content'] = 'admin/maid_page_setting';
			$this->load->view('layouts/admin_template', $data);
		}


		function deleteMaid($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('maids_model');
	        $this->maids_model->delete($id);

			redirect('admin/maids');
		}




	}//End Class

?>