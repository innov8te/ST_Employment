<?php
	/**
	* 
	*/
	class Experience_Model extends CI_Model
	{
		
		function __construct()
		{
			// parent::__construct();
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


		function addExperienceData()
		{
			$experience_data = array(
				'exp_name' => $this->input->post('experience')
			);

			$this->db->insert('st_experience', $experience_data);
		}



		function edit($id = 0)
		{
		
            $experience_data = array(
	            	'exp_name' => $this->input->post('experience')
	        );

            $this->db->where('exp_id', $id)
            		 ->update('st_experience', $experience_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('exp_id', $id)
					 ->delete('st_experience');
		}


	}// End class


?>