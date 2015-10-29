<?php
	/**
	* 
	*/
	class Agegroup_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		function getAgeList()
		{
			$query = $this->db->get('st_age_group');
			$ageList = array();

			foreach ($query->result() as $row) {
	            $ageList[] = array(
	            	'age_id' => $row->age_id,
	            	'age_start' => $row->age_start,
	  				'age_end' => $row->age_end
	            );
			}
			return $ageList;
		}


		function addAgeData()
		{
			$age_data = array(
				'age_start' => $this->input->post('start'),
				'age_end' => $this->input->post('end')
			);

			$this->db->insert('st_age_group', $age_data);
		}



		function edit($id = 0)
		{
		
            $age_data = array(
	            	'age_start' => $this->input->post('start'),
					'age_end' => $this->input->post('end')
	        );

            $this->db->where('age_id', $id)
            		 ->update('st_age_group', $age_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('age_id', $id)
					 ->delete('st_age_group');
		}


	}// End class


?>