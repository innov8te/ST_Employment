<?php
	/**
	* 
	*/
	class Filter_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		function filterMaid($key = array())
		{
			$check_list = $this->input->post('nationality');
			//$where = "";

			 $this->db->select("*");

			/* checked checklist and age choosed */
			if(!empty($check_list) && !empty($key['start_age_key'] && $key['start_age_key'])) {
			    foreach($check_list as $check) {
			        $checklist[] = $check; 
			        //echo $check;
			    }
			    $chlenght = count($checklist);
				if($chlenght > 1){
					//$where = "WHERE maid_from = '".$checklist[0]."' ";
					for($i=0; $i<$chlenght; $i++)
					{					
						if($i == 0){
							//$where = "WHERE maid_from = '".$checklist[0]."' ";
							$this->db->where("maid_from", $checklist[0]);
						}else{
							//$where .= "OR maid_from = '".$checklist[$i]."' ";
							$this->db->or_where("maid_from", $checklist[$i]);
						}
					}
				}else{
					//$where = "WHERE maid_from='".$checklist[0]."' ";
					$this->db->where("maid_from", $checklist[0]);
				}
					$this->db->where("maid_age >=", $key['start_age_key']);
					$this->db->where("maid_age <=", $key['end_age_key']);
			}//end if for checked checklist && age choosed


			//checked checklist && age unchoosed
			if(!empty($check_list) && empty($key['start_age_key'] && $key['start_age_key'])) {
				foreach($check_list as $check) {
				        $checklist[] = $check; 
				}
				    $chlenght = count($checklist);
					if($chlenght > 1){
						for($i=0; $i<$chlenght; $i++)
						{					
							if($i == 0){
								$this->db->where("maid_from", $checklist[0]);
							}else{
								$this->db->or_where("maid_from", $checklist[$i]);
							}
						}
					}else{
						$this->db->where("maid_from", $checklist[0]);
					}


			}//end if for checked checklist && age unchoosed


			//unchecked checklist && age choosed
			if(empty($check_list) && !empty($key['start_age_key'] && $key['start_age_key'])) {
				$this->db->where("maid_age >=", $key['start_age_key']);
				$this->db->where("maid_age <=", $key['end_age_key']);
			}//end if for unchecked checklist && age choosed


			//unchecked checklist && age unchoosed
			if(empty($check_list) && empty($key['start_age_key'] && $key['start_age_key'])) {
				
			}//end if for unchecked checklist && age unchoosed


			$this->db->from("st_maids");


			if(array_key_exists("limit", $key) && array_key_exists("start", $key)) {				
	            $this->db->limit($key['limit'], $key['start']);
	        }

	        $this->db->order_by("maid_id","desc");

	        $query = $this->db->get();

	        //echo $this->db->queries[1];

	        //print_r($query);

			$filterResultList = array();

			foreach ($query->result() as $row) {
	            $filterResultList[] = array(
	            	'maid_id' => $row->maid_id,
	            	'maid_image' => $row->maid_image,
	            	'maid_name' => $row->maid_name,
	  				'maid_ref_code' => $row->maid_ref_code,
	  				'maid_age' => $row->maid_age,
	  				'maid_from' => $row->maid_from,
	  				'maid_type' => $row->maid_type,
	  				'maid_dob' => $row->maid_dob,
	  				'maid_salary' => $row->maid_salary,
	  				'maid_day_off' => $row->maid_day_off
	            );
			}
			return $filterResultList;

		}


		function filter_result_record_count($key = array())
		{
			$check_list = $this->input->post('nationality');
			//$where = "";

			 $this->db->select("*");

			/* checked checklist and age choosed */
			if(!empty($check_list) && !empty($key['start_age_key'] && $key['start_age_key'])) {
			    foreach($check_list as $check) {
			        $checklist[] = $check; 
			        //echo $check;
			    }
			    $chlenght = count($checklist);
				if($chlenght > 1){
					//$where = "WHERE maid_from = '".$checklist[0]."' ";
					for($i=0; $i<$chlenght; $i++)
					{					
						if($i == 0){
							//$where = "WHERE maid_from = '".$checklist[0]."' ";
							$this->db->where("maid_from", $checklist[0]);
						}else{
							//$where .= "OR maid_from = '".$checklist[$i]."' ";
							$this->db->or_where("maid_from", $checklist[$i]);
						}
					}
				}else{
					//$where = "WHERE maid_from='".$checklist[0]."' ";
					$this->db->where("maid_from", $checklist[0]);
				}
					$this->db->where("maid_age >=", $key['start_age_key']);
					$this->db->where("maid_age <=", $key['end_age_key']);
			}//end if for checked checklist && age choosed


			//checked checklist && age unchoosed
			if(!empty($check_list) && empty($key['start_age_key'] && $key['start_age_key'])) {
				foreach($check_list as $check) {
				        $checklist[] = $check; 
				}
				    $chlenght = count($checklist);
					if($chlenght > 1){
						for($i=0; $i<$chlenght; $i++)
						{					
							if($i == 0){
								$this->db->where("maid_from", $checklist[0]);
							}else{
								$this->db->or_where("maid_from", $checklist[$i]);
							}
						}
					}else{
						$this->db->where("maid_from", $checklist[0]);
					}


			}//end if for checked checklist && age unchoosed


			//unchecked checklist && age choosed
			if(empty($check_list) && !empty($key['start_age_key'] && $key['start_age_key'])) {
				$this->db->where("maid_age >=", $key['start_age_key']);
				$this->db->where("maid_age <=", $key['end_age_key']);
			}//end if for unchecked checklist && age choosed


			//unchecked checklist && age unchoosed
			if(empty($check_list) && empty($key['start_age_key'] && $key['start_age_key'])) {
				
			}//end if for unchecked checklist && age unchoosed


			$this->db->from("st_maids");


			if(array_key_exists("limit", $key) && array_key_exists("start", $key)) {				
	            $this->db->limit($key['limit'], $key['start']);
	        }else{
	        }


	        $query = $this->db->get();		

			//return $this->db->count_all("st_maids");

			return $query->num_rows();		

		}


	}// End class


?>