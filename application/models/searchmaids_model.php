<?php
	/**
	* 
	*/
	class Searchmaids_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		function getMaidsList($param = array())
		{
			$this->db->order_by("maid_id","desc");
			
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
	  				'maid_image' => $row->maid_image,
	  				'maid_age' => $row->maid_age,
	  				'maid_from' => $row->maid_from,
	  				'maid_type' => $row->maid_type,
	  				'maid_salary' => $row->maid_salary,
	  				'maid_day_off' => $row->maid_day_off
	            );
			}
			return $maidsList;
		}


		public function record_count() {
	        return $this->db->count_all("st_maids");
	    }



		function getMaidDetailData($id=0)
		{
			$maidDetail = array();

			$maidDetail = $this->db->where('maid_id', $id)
    										->get('st_maids')->first_row('array');

			return $maidDetail;
		}



		function getMaidInfoDetailData($id=0)
		{
			$maidInfoDetail = array();

			$maidInfoDetail = $this->db->where('info_maid_id', $id)
    										->get('st_maid_info')->first_row('array');

			return $maidInfoDetail;
		}

		

	}// End class


?>