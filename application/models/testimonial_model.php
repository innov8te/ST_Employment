<?php
	/**
	* 
	*/
	class Testimonial_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		function getTestimonialList($param = array())
		{
			//$this->db->order_by("testi_id","desc");
			
			if(array_key_exists("limit", $param) && array_key_exists("start", $param)) {				
	            $this->db->limit($param['limit'], $param['start']);
	            $query = $this->db->get('st_testimonials');
	        }else{
	        	$query = $this->db->get('st_testimonials');
	        }

			$testimonialList = array();

			foreach ($query->result() as $row) {
	            $testimonialList[] = array(
	            	'testi_id' => $row->testi_id,
	  				'testi_name' => $row->testi_name,
	  				'testi_content' => $row->testi_content,
	  				'testi_image' => $row->testi_image
	            );
			}
			return $testimonialList;
		}

		function testimonials_record_count()
		{
			return $this->db->count_all("st_testimonials");
		}


		function addTestimonialData()
		{
			if (isset($_FILES["testi_image"]['name']) && !empty($_FILES["testi_image"]["name"])) {
	            // upload maid image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/testimonial_images";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("testi_image")) {	            	
	                return false;
	            } else {
	                $uploadedImage_testiImg = $this->upload->data();
	            }

	        }else{
	        	$uploadedImage_testiImg = "";
	        }


	        if($uploadedImage_testiImg == ""){
	        	$testimonial_data = array(
					'testi_name' => $this->input->post('testi_name'),
					'testi_content' => $this->input->post('testi_content')
				);
	        }else{
	        	$testimonial_data = array(
					'testi_name' => $this->input->post('testi_name'),
					'testi_content' => $this->input->post('testi_content'),
					'testi_image' => $uploadedImage_testiImg["file_name"]
				);
	        }

			

			$this->db->insert('st_testimonials', $testimonial_data);
		}



		function edit($id = 0)
		{
		
            if (isset($_FILES["testi_image"]['name']) && !empty($_FILES["testi_image"]["name"])) {
	            // upload maid image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/testimonial_images";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("testi_image")) {
	                return false;
	            } else {
	                $uploadedImage_testiImg = $this->upload->data();
	            }

	        }else{
	        	$uploadedImage_testiImg = "";
	        }

	        if($uploadedImage_testiImg == ""){
	        	$testimonial_data = array(
	            	'testi_name' => $this->input->post('testi_name'),
	            	'testi_content' => $this->input->post('testi_content')
		        );
	        }else{
	        	$testimonial_data = array(
	            	'testi_name' => $this->input->post('testi_name'),
	            	'testi_content' => $this->input->post('testi_content'),
	            	'testi_image' => $uploadedImage_testiImg["file_name"]
		        );
	        }

            

            $this->db->where('testi_id', $id)
            		 ->update('st_testimonials', $testimonial_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}

		

		function delete($id = 0)
		{
			$this->db->where('testi_id', $id)
					 ->delete('st_testimonials');
		}



	}// End class


?>