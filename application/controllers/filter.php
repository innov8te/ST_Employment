<?php
	/**
	* 
	*/
	class Filter extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library("pagination");
		}


		function index()
		{
			
	        //$data['nat_key'] = (@$_REQUEST['nationality'])? $_REQUEST['nationality'] : '';
	        $key['nat_key'] = $this->input->post('nationality');
	      
			if($this->input->post('age')){
				$key['age_key'] = $this->input->post('age');

		        $key_str = $key['age_key'];
				$agekey = explode("-", $key_str);

				//echo "Start : " . $agekey[0];
				//echo "<br />End : " . $agekey[1];

				$key['start_age_key'] = $agekey[0];
				$key['end_age_key'] = $agekey[1];

			}else{
				$key['start_age_key'] = "";
				$key['end_age_key'] = "";
			}

			/********************************/

			$this->load->model('filter_model');

			/* pagination */
        	$config = array();
	        $config["base_url"] = base_url() . "maid/search_result";
	        $config["total_rows"] = $this->filter_model->filter_result_record_count($key);
	        $config["per_page"] = 6;
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

	        $key['limit'] = $config['per_page'];
        	$key['start'] = $offset;
	        $data["links"] = $this->pagination->create_links();


			// $this->load->model('filter_model');
		    $data['filter_result'] = $this->filter_model->filterMaid($key);



	        $this->load->model('agegroup_model');
		    $data['ageList'] = $this->agegroup_model->getAgeList();

		    $this->load->model('maids_model');
		    $data['countriesList'] = $this->maids_model->getCountriesData();



	        $this->load->model('type_model');
		    $data['typeList'] = $this->type_model->getTypeList();

			$data['main_content'] = 'filter';
			$this->load->view('layouts/template', $data);
		}




	}// End Class


?>