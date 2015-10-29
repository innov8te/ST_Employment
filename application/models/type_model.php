<?php
	/**
	* 
	*/
	class Type_Model extends CI_Model
	{
		
		function __construct()
		{
			// parent::__construct();
		}


		function getTypeList()
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


		function addTypeData()
		{
			$type_data = array(
				'type_name' => $this->input->post('type_name')
			);

			$this->db->insert('st_type', $type_data);
		}



		function edit($id = 0)
		{
		
            $type_data = array(
	            	'type_name' => $this->input->post('type_name')
	        );

            $this->db->where('type_id', $id)
            		 ->update('st_type', $type_data);

            return $this->db->affected_rows() > 0 ? true : false;

		}


		function delete($id = 0)
		{
			$this->db->where('type_id', $id)
					 ->delete('st_type');
		}


	}// End class


?>