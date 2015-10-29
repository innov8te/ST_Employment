<?php
	/**
	* 
	*/
	class Marital_Model extends CI_Model
	{
		
		function __construct()
		{
			# code...
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


		function addMaritalData()
		{
			$marital_data = array(
				'marital_name' => $this->input->post('marital_status')
			);

			$this->db->insert('st_marital', $marital_data);
		}


		function edit($id = 0)
		{
		
            $marital_data = array(
	            	'marital_name' => $this->input->post('marital_status')
	        );

            $this->db->where('marital_id', $id)
            		 ->update('st_marital', $marital_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('marital_id', $id)
					 ->delete('st_marital');
		}


	}//End Class


?>