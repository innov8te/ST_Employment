<?php
	/**
	* 
	*/
	class Pages extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library("pagination");
		}


		function index()
		{
			
			$this->load->model('pages_model');
		    $data['homeWelcomeData'] = $this->pages_model->getHomeWelcomeData();


		    $data['featureMaidsList'] = $this->pages_model->getFeatureMaidsList();

		    // $this->load->model('slider_model');
		    // $data['sliderData'] = $this->slider_model->getSliderList();


			$data['main_content'] = 'home';
			$this->load->view('layouts/template', $data);
		}


		function aboutus()
		{
			$this->load->model('pages_model');
		    $data['aboutusData'] = $this->pages_model->getAboutusData();

			$data['main_content'] = 'aboutus';
			$this->load->view('layouts/template', $data);
		}
		

		function contactus()
		{
			$this->load->model('pages_model');
		    $data['contactusData'] = $this->pages_model->getContactusData();

			$data['main_content'] = 'contactus';
			$this->load->view('layouts/template', $data);
		}


		function contactusFormEmail()
		{
			$this->input->post('cnt_name');

			if ($this->input->post()) {
				$this->load->model('pages_model');
				$this->pages_model->contactusFormEmailSend();
			}
			
			$data['main_content'] = 'contactus';
			$this->load->view('layouts/template', $data);

		}

		
		function testimonials()
		{
			
			$this->load->model('pages_model');

			/* pagination */
        	$config = array();
	        $config["base_url"] = base_url() . "testimonials";
	        $config["total_rows"] = $this->pages_model->testimonials_record_count();
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 2;
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

	        $page_no = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        if (empty($page_no))
            $page_no = 1;
        	$offset = ($page_no - 1) * $config['per_page'];

	        $param['limit'] = $config['per_page'];
        	$param['start'] = $offset;
	        $data["links"] = $this->pagination->create_links();

        	/**************************************/


		    $data['testimonialList'] = $this->pages_model->getTestimonialList($param);

			$data['main_content'] = 'testimonials';
			$this->load->view('layouts/template', $data);
		}

		

	}// End Class
?>
