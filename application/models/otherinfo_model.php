<?php
	/**
	* 
	*/
	class Otherinfo_Model extends CI_Model
	{
		
		function __construct()
		{
			# code...
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

		function addOtherinfoData()
		{
			$otherinfo_data = array(
				'oth_name' => $this->input->post('other_info_name')
			);

			$this->db->insert('st_other_information', $otherinfo_data);
		}


		function edit($id = 0)
		{
		
            $otherinfo_data = array(
	            	'oth_name' => $this->input->post('other_info_name')
	        );

            $this->db->where('oth_id', $id)
            		 ->update('st_other_information', $otherinfo_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('oth_id', $id)
					 ->delete('st_other_information');
		}


		




	}// End Class


?>