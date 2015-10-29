<?php
	/**
	* 
	*/
	class Testimonial extends CI_Controller
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

	        $this->load->model('testimonial_model');

	        /* pagination */
        	$config = array();
	        $config["base_url"] = base_url() . "admin/testimonials";
	        $config["total_rows"] = $this->testimonial_model->testimonials_record_count();
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


		    $data['testimonialList'] = $this->testimonial_model->getTestimonialList($param);

			$data['main_content'] = 'admin/testimonials';
			$this->load->view('layouts/admin_template', $data);
		}


		function addTestimonial()
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

			if($this->input->post()){
	        	$this->load->library('form_validation');
	        	$this->form_validation->set_rules('testi_name', 'Name', 'required');
	        	$this->form_validation->set_rules('testi_content', 'Content', 'required');

	        	if ($this->form_validation->run() == FALSE) {

	        	}else{
	        		$this->load->model('testimonial_model');
					$this->testimonial_model->addTestimonialData();
					redirect('admin/testimonials');
	        	}
	        }

			$data['main_content'] = 'admin/add_testimonial';
			$this->load->view('layouts/admin_template', $data);

		}


		function editTestimonial($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }	        
	        
	        $this->load->model('testimonial_model');
			if ($this->input->post()) {				
				if ($result = $this->testimonial_model->edit($id)) {
					$this->session->set_flashdata('alert_text', 'Successfully update !');
				}
			}
			
			$result = $this->db->where('testi_id', $id)
	                            ->get('st_testimonials')->first_row('array');
	        $data['testimonial_data'] = $result;


			$data['main_content'] = 'admin/edit_testimonial';
			$this->load->view('layouts/admin_template', $data);
		}



		function deleteTestimonial($id=0)
		{
			if (!isLogin()) {
	            redirect('admin');
	        }

	        $this->load->model('testimonial_model');
	        $this->testimonial_model->delete($id);

			redirect('admin/testimonials');
		}

		

	}//End Class


?>