<?php
	/**
	* 
	*/
	class Religious_Model extends CI_Model
	{
		
		function __construct()
		{
			# code...
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


		function addReligiousData()
		{
			$religious_data = array(
				'reli_name' => $this->input->post('religious_name')
			);

			$this->db->insert('st_religious', $religious_data);
		}


		function edit($id = 0)
		{
		
            $country_data = array(
	            	'reli_name' => $this->input->post('religious_name')
	        );

            $this->db->where('reli_id', $id)
            		 ->update('st_religious', $country_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('reli_id', $id)
					 ->delete('st_religious');
		}

		

	}//End Class



?>