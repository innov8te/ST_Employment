<?php
	/**
	* 
	*/
	class Maids_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('upload');
		}



		function getMaidsList($param = array())
		{
			//$this->db->order_by("maid_id","desc");
			
			if(array_key_exists("limit", $param) && array_key_exists("start", $param)) {				
	            $this->db->limit($param['limit'], $param['start']);
	            $query = $this->db->get('st_maids');
	        }else{
	        	$query = $this->db->get('st_maids');
	        }


			$maidsList = array();

			foreach ($query->result() as $row) {
	            $maidsList[] = array(
	            	'maid_id' => $row->maid_id,
	            	'maid_name' => $row->maid_name,
	  				'maid_ref_code' => $row->maid_ref_code,
	  				'maid_from' => $row->maid_from,
	  				'maid_type' => $row->maid_type,
	  				'maid_dob' => $row->maid_dob,
	  				'maid_salary' => $row->maid_salary,
	  				'maid_day_off' => $row->maid_day_off
	            );
			}
			return $maidsList;
		}

		function maids_record_count()
		{
			return $this->db->count_all("st_maids");
		}


		function getMaidsData()
		{
			$query = $this->db->get('st_marital');
			$maritalList = array();

			foreach ($query->result() as $row) {
	            $maritalList[] = array(
	            	'marital_id' => $row->marital_id,
	  				'marital_name' => $row->marital_name
	            );
			}
			return $maritalList;
		}


		function addMaidData()
		{
			$year = $this->input->post('year');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$maid_dob = $year . '-' . $month . '-' . $day;

			date_default_timezone_set('Asia/Singapore');
			$date = date('Y-m-d h:i:s', time());

			if (isset($_FILES["maid_img"]['name']) && !empty($_FILES["maid_img"]["name"])) {
	            // upload maid image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/maids_images";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("maid_img")) {
	                return false;
	            } else {
	                $uploadedImage_maidimg = $this->upload->data();
	            }

	        }else{
	        	$uploadedImage_maidimg = "";
	        }


	        if($uploadedImage_maidimg == ""){
	        	$maid_data = array(
					'maid_name' => $this->input->post('maid_name'),
					'maid_feature' => $this->input->post('feature'),
					'maid_ref_code' => $this->input->post('ref_code'),
					'maid_salary' => $this->input->post('salary'),
					'maid_day_off' => $this->input->post('day_off'),
					'maid_type' => $this->input->post('type'),
					'maid_from' => $this->input->post('from'),
					'maid_dob' => $maid_dob,
					'maid_age' => $this->input->post('age'),
					'maid_created_on' => $date,
					'maid_updated_on' => $date,
					'maid_created_by' => $this->session->userdata('id'),
					'maid_updated_by' => $this->session->userdata('id')
				);
	        }else{
	        	$maid_data = array(
					'maid_name' => $this->input->post('maid_name'),
					'maid_feature' => $this->input->post('feature'),
					'maid_image' => $uploadedImage_maidimg["file_name"],
					'maid_ref_code' => $this->input->post('ref_code'),
					'maid_salary' => $this->input->post('salary'),
					'maid_day_off' => $this->input->post('day_off'),
					'maid_type' => $this->input->post('type'),
					'maid_from' => $this->input->post('from'),
					'maid_dob' => $maid_dob,
					'maid_age' => $this->input->post('age'),
					'maid_created_on' => $date,
					'maid_updated_on' => $date,
					'maid_created_by' => $this->session->userdata('id'),
					'maid_updated_by' => $this->session->userdata('id')
				);
	        }


			$this->db->insert('st_maids', $maid_data);


			/* Maid Info Data */
			// $data['maid_id_data'] = $this->db->where('maid_ref_code', $this->input->post('ref_code'))
			// 		 ->get('st_maids')->first_row('array');

			$maid_query = $this->db->where('maid_ref_code', $this->input->post('ref_code'))
					 ->get('st_maids');
			foreach ($maid_query->result() as $row) {
				$maid_id = $row->maid_id;
			}

			$maid_info_data = array(
				'info_maid_id' => $maid_id,
				'info_agency' => $this->input->post('maid_agency'),
				'info_available' => $this->input->post('available'),
				'info_pob' => $this->input->post('place_of_birth'),
				'info_sibling' => $this->input->post('sibling'),
				'info_height' => $this->input->post('height'),
				'info_weight' => $this->input->post('weight'),
				'info_religion' => $this->input->post('religious'),
				'info_marital' => $this->input->post('marital'),
				'info_child' => $this->input->post('children'),
				'info_education' => $this->input->post('education'),
				'info_language' => $this->input->post('language_skill'),
				'info_working_experience' => $this->input->post('working_experience'),
				'info_introduce' => $this->input->post('info_introduce')
			);

			$this->db->insert('st_maid_info', $maid_info_data);


			/* Maid Experiences Data */

			$exp_query = $this->db->get('st_experience');

			foreach ($exp_query->result() as $row) {     
				$exp_name = 'exp' . $row->exp_id;
				$mexp_status = $this->input->post($exp_name);
	            $maid_exp_data = array(
					'mexp_maid_id' => $maid_id,
					'mexp_exp_id' => $row->exp_id,
					'mexp_status' => $mexp_status
				);

	            $this->db->insert('st_maid_exp', $maid_exp_data);
			}


			/* Maid Other Data */
			
			$otherinfo_query = $this->db->get('st_other_information');

			foreach ($otherinfo_query->result() as $row) {     
				$otherinfo_name = 'otherinfo' . $row->oth_id;
				$moth_status = $this->input->post($otherinfo_name);
				// $test = $this->input->post('otherinfo2');
				// echo $test;
				//echo "Tsst" . $this->input->post('otherinfo2');

				if ($moth_status == NULL) {
					$moth_status = 'NA';
				}else{
					$moth_status = $moth_status = $this->input->post($otherinfo_name);
				}
				//$moth_status = '0';

	            $maid_other_data = array(
					'moth_maid_id' => $maid_id,
					'moth_oth_id' => $row->oth_id,
					'moth_status' => $moth_status
				);

	            $this->db->insert('st_maid_oth', $maid_other_data);
			}


		}
		
		

		function getTypeData()
		{
			$query = $this->db->get('st_type');
			$typeList = array();

			foreach ($query->result() as $row) {
	            $typeList[] = array(
	            	'type_id' => $row->type_id,
	  				'type_name' => $row->type_name
	            );
			}
			return $typeList;
		}

		function getCountriesData()
		{
			$query = $this->db->get('st_countries');
			$countriesList = array();

			foreach ($query->result() as $row) {
	            $countriesList[] = array(
	            	'country_id' => $row->country_id,
	  				'country_name' => $row->country_name,
	  				'country_citizen' => $row->country_citizen
	            );
			}
			return $countriesList;
		}

		function getReligiousList()
		{
			$query = $this->db->get('st_religious');
			$religiousList = array();

			foreach ($query->result() as $row) {
	            $religiousList[] = array(
	            	'religious_id' => $row->reli_id,
	  				'religious_name' => $row->reli_name
	            );
			}
			return $religiousList;
		}


		function getMaritalList()
		{
			$query = $this->db->get('st_marital');
			$maritalList = array();

			foreach ($query->result() as $row) {
	            $maritalList[] = array(
	            	'marital_id' => $row->marital_id,
	  				'marital_name' => $row->marital_name
	            );
			}
			return $maritalList;
		}

		function getExperienceList()
		{
			$query = $this->db->get('st_experience');
			$experienceList = array();

			foreach ($query->result() as $row) {
	            $experienceList[] = array(
	            	'experience_id' => $row->exp_id,
	  				'experience_name' => $row->exp_name
	            );
			}
			return $experienceList;
		}

		function getOtherinfoList()
		{
			$query = $this->db->get('st_other_information');
			$otherinfoList = array();

			foreach ($query->result() as $row) {
	            $otherinfoList[] = array(
	            	'other_info_id' => $row->oth_id,
	  				'other_info_name' => $row->oth_name
	            );
			}
			return $otherinfoList;
		}

		function edit($id = 0)
		{
						
			if (isset($_FILES["maid_img"]['name']) && !empty($_FILES["maid_img"]["name"])) {
	            // upload maid image
	            $this->load->library('upload');
	            $config['max_size'] = 5000;
	            $config['allowed_types'] = "jpg|gif|jpeg|png";
	            $config['encrypt_name'] = true;
	            $config['upload_path'] = "uploads/maids_images";
	            // $config['max_width'] = 32;
            	// $config['max_height'] = 32;	            
	            $this->upload->initialize($config);
	            if (!$this->upload->do_upload("maid_img")) {
	                return false;
	            } else {
	                $uploadedImage_maidimg = $this->upload->data();
	            }

	        }else{
	        	$uploadedImage_maidimg = "";
	        }

            $year = $this->input->post('year');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$maid_dob = $year . '-' . $month . '-' . $day;

			date_default_timezone_set('Asia/Singapore');
			$date = date('Y-m-d h:i:s', time());

			if($uploadedImage_maidimg == ""){
				$maid_data = array(
	            	'maid_name' => $this->input->post('maid_name'),
	            	'maid_feature' => $this->input->post('feature'),
	            	'maid_ref_code' => $this->input->post('ref_code'),          	
	            	'maid_salary' => $this->input->post('salary'),
	            	'maid_day_off' => $this->input->post('day_off'),
	            	'maid_type' => $this->input->post('type'),
	            	'maid_from' => $this->input->post('from'),
	            	'maid_dob' => $maid_dob,
					'maid_age' => $this->input->post('age'),
					'maid_updated_on' => $date,
					'maid_updated_by' => $this->session->userdata('id')
	        	);
			}else{
				$maid_data = array(
	            	'maid_name' => $this->input->post('maid_name'),
	            	'maid_feature' => $this->input->post('feature'),
	            	'maid_image' => $uploadedImage_maidimg["file_name"],	  
	            	'maid_ref_code' => $this->input->post('ref_code'),          	
	            	'maid_salary' => $this->input->post('salary'),
	            	'maid_day_off' => $this->input->post('day_off'),
	            	'maid_type' => $this->input->post('type'),
	            	'maid_from' => $this->input->post('from'),
	            	'maid_dob' => $maid_dob,
					'maid_age' => $this->input->post('age'),
					'maid_updated_on' => $date,
					'maid_updated_by' => $this->session->userdata('id')
	        	);
			}
            

            $this->db->where('maid_id', $id)
            		 ->update('st_maids', $maid_data);



            $maid_info_data = array(
	            	'info_agency' => $this->input->post('maid_agency'),
	            	'info_available' => $this->input->post('available'),	            	
	            	'info_pob' => $this->input->post('place_of_birth'),
	            	'info_sibling' => $this->input->post('sibling'),
	            	'info_height' => $this->input->post('height'),
	            	'info_weight' => $this->input->post('weight'),
	            	'info_religion' => $this->input->post('religious'),
	            	'info_marital' => $this->input->post('marital'),
	            	'info_child' => $this->input->post('children'),
	            	'info_education' => $this->input->post('education'),
	            	'info_language' => $this->input->post('language_skill'),
	            	'info_working_experience' => $this->input->post('working_experience'),
					'info_introduce' => $this->input->post('info_introduce')
	        );

	        $this->db->where('info_maid_id', $id)
            		 ->update('st_maid_info', $maid_info_data);


            /* Maid Experiences Data */
			$exp_query = $this->db->get('st_experience');
			foreach ($exp_query->result() as $row) {     
				$exp_name = 'exp' . $row->exp_id;
				$mexp_status = $this->input->post($exp_name);

	            $maid_exp_data = array(					
					'mexp_status' => $mexp_status
				);

	            $this->db->where('mexp_maid_id', $id)
	            		->where('mexp_exp_id', $row->exp_id)
            		 ->update('st_maid_exp', $maid_exp_data);

			}


			/* Maid Other Data */			
			$otherinfo_query = $this->db->get('st_other_information');
			foreach ($otherinfo_query->result() as $row) {     
				$otherinfo_name = 'otherinfo' . $row->oth_id;
				//echo "Name : " . $otherinfo_name;
				$moth_status = $this->input->post($otherinfo_name);				

				// if ($moth_status == "") {
				// 	$moth_status = 0;
				// 	echo "Space" . $moth_status;
				// }else{
				// 	$moth_status = $this->input->post($otherinfo_name);
				// 	echo "<br />H" . $moth_status;
				// }
				
				if ($moth_status == NULL) {
					$moth_status = 'NA';
				}else{
					$moth_status = $moth_status = $this->input->post($otherinfo_name);
				}



	            $maid_other_data = array(
					'moth_status' => $moth_status
				);

	            $this->db->where('moth_maid_id', $id)
	            		 ->where('moth_oth_id', $row->oth_id)
            		     ->update('st_maid_oth', $maid_other_data);
			}

			

            //return $this->db->affected_rows() > 0 ? true : false;
            return true;

		}

		function getMiadExpData()
		{
			$query = $this->db->get('st_maid_exp');
			$maidExpDataList = array();

			foreach ($query->result() as $row) {
	            $maidExpDataList[] = array(
	            	'mexp_id' => $row->mexp_id,
	            	'mexp_maid_id' => $row->mexp_maid_id,
	  				'mexp_exp_id' => $row->mexp_exp_id,
	  				'mexp_status' => $row->mexp_status
	            );
			}
			return $maidExpDataList;
		}


		function getMiadOthData()
		{
			$query = $this->db->get('st_maid_oth');
			$maidOthDataList = array();

			foreach ($query->result() as $row) {
	            $maidOthDataList[] = array(
	            	'moth_id' => $row->moth_id,
	            	'moth_maid_id' => $row->moth_maid_id,
	  				'moth_oth_id' => $row->moth_oth_id,
	  				'moth_status' => $row->moth_status
	            );
			}
			return $maidOthDataList;
		}



		function delete($id = 0)
		{
			$this->db->where('maid_id', $id)
					 ->delete('st_maids');


			$this->db->where('info_maid_id', $id)
					 ->delete('st_maid_info');

		

			$exp_query = $this->db->get('st_experience');
			foreach ($exp_query->result() as $row) {     
	            $this->db->where('mexp_maid_id', $id)
	                     ->where('mexp_exp_id', $row->exp_id)
					     ->delete('st_maid_exp');
			}


			$otherinfo_query = $this->db->get('st_other_information');
			foreach ($otherinfo_query->result() as $row) {     
	            $this->db->where('moth_maid_id', $id)
	                     ->where('moth_oth_id', $row->oth_id)
					     ->delete('st_maid_oth');
			}


		}


	}//End Class


?>