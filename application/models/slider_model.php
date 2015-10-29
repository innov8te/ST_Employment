<?php
	/**
	* 
	*/
	class Slider_Model extends CI_Model
	{
		
		function __construct()
		{
			// parent::__construct();
		}


		function getSliderList()
		{
			$query = $this->db->get('st_slider');
			$sliderList = array();

			foreach ($query->result() as $row) {
	            $sliderList[] = array(
	            	'slide_id' => $row->slide_id,
	            	'slide_name' => $row->slide_name,
	  				'slide_img' => $row->slide_img,
	  				'slide_page' => $row->slide_page,
	  				'slide_text' => $row->slide_text,
	  				'slide_link' => $row->slide_link
	            );
			}
			return $sliderList;
		}


		function addSliderData()
		{
			if (isset($_FILES["sliderimg"]['name']) && !empty($_FILES["sliderimg"]["name"])) {
	            // upload slider image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/slider/";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("sliderimg")) {
	                return false;
	            } else {
	                $uploadedImage_sliderImg = $this->upload->data();
	            }
	          
	        }else{
	        	 $uploadedImage_sliderImg = "";
	        }

	        $sl_img = $uploadedImage_sliderImg["file_name"];

	        if($uploadedImage_sliderImg = ""){
	        	$slider_data = array(
					'slide_name' => $this->input->post('slider_name'),
					'slide_text' => $this->input->post('slider_text'),
					'slide_link' => $this->input->post('slider_link')
				);
	        }else{
	        	$slider_data = array(
					'slide_name' => $this->input->post('slider_name'),
					'slide_img' => $sl_img,
					'slide_text' => $this->input->post('slider_text'),
					'slide_link' => $this->input->post('slider_link')
				);
	        }
			

			$this->db->insert('st_slider', $slider_data);
		}



		function edit($id = 0)
		{
		
            if (isset($_FILES["sliderimg"]['name']) && !empty($_FILES["sliderimg"]["name"])) {
	            // upload slider image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/slider/";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("sliderimg")) {
	                return false;
	            } else {
	                $uploadedImage_sliderImg = $this->upload->data();
	            }
	          
	        }else{
	        	 $uploadedImage_sliderImg = "no";
	        }

	        //$sl_img = $uploadedImage_sliderImg["file_name"];

	        if($uploadedImage_sliderImg == "no"){
	        	$slider_data = array(
					'slide_name' => $this->input->post('slider_name'),
					'slide_text' => $this->input->post('slider_text'),
					'slide_link' => $this->input->post('slider_link')
				);
	        }else{
	        	$slider_data = array(
					'slide_name' => $this->input->post('slider_name'),
					'slide_img' => $uploadedImage_sliderImg["file_name"],
					'slide_text' => $this->input->post('slider_text'),
					'slide_link' => $this->input->post('slider_link')
				);
	        }

            $this->db->where('slide_id', $id)
            		 ->update('st_slider', $slider_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('slide_id', $id)
					 ->delete('st_slider');
		}


	}// End class


?>