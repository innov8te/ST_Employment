<?php
	/**
	* 
	*/
	class Searchmaids extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library("pagination");
		}

		function index()
		{
			$this->load->model('searchmaids_model');

        	/* pagination */
        	$config = array();
	        $config["base_url"] = base_url() . "searchmaids";
	        $config["total_rows"] = $this->searchmaids_model->record_count();
	        $config["per_page"] = 6;
	        $config["uri_segment"] = 2;
	        $config['use_page_numbers'] = TRUE;
	     	//$choice = $config["total_rows"] / $config["per_page"];
    		//$config["num_links"] = round($choice);

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

	        $page_no = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        if (empty($page_no))
            $page_no = 1;
        	$offset = ($page_no - 1) * $config['per_page'];

	        $param['limit'] = $config['per_page'];
        	$param['start'] = $offset;
	        $data["links"] = $this->pagination->create_links();

        	/**************************************/

        	$this->load->model('agegroup_model');
		    $data['ageList'] = $this->agegroup_model->getAgeList();

		    $this->load->model('maids_model');
		    $data['countriesList'] = $this->maids_model->getCountriesData();

		    

		    $data['searchmaidsList'] = $this->searchmaids_model->getMaidsList($param);

			$data['main_content'] = 'searchmaids';
			$this->load->view('layouts/template', $data);

		}


	}// End Class


?>