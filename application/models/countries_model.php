<?php
	/**
	* 
	*/
	class Countries_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function addCountryData()
		{
			$country_data = array(
				'country_name' => $this->input->post('country_name'),
				'country_citizen' => $this->input->post('nationality')
			);

			$this->db->insert('st_countries', $country_data);
		}

		function getCountriesList()
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


		function edit($id = 0)
		{
		
            $country_data = array(
	            	'country_name' => $this->input->post('country_name'),
	            	'country_citizen' => $this->input->post('nationality')
	        );

            $this->db->where('country_id', $id)
            		 ->update('st_countries', $country_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('country_id', $id)
					 ->delete('st_countries');
		}



	}//End Class


?>