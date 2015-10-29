<?php
	/**
	* 
	*/
	class Auth_Model extends CI_Model
	{
		
		function __construct()
		{
			 parent::__construct();
		}

		function validate()
		{
			$query = $this->db->where('username', $this->input->post('username'))
					->where('password', crypt($this->input->post('password'), SALT))
					->get('st_users');

			// $username = $this->input->post('username');
			// $password = crypt($this->input->post('password'), SALT);
			// $query = $this->db->query("SELECT * FROM users WHERE username='".$username."' AND password='".$password."' ");
			
			$row = $query->row();		
			
			//echo $query->num_rows();

			if($query->num_rows() != 1){
				return false;
			}
            $session_data = array(
            	'id' => $row->id,
            	'username' => $row->username,
            	'login_username' => $row->display_name,
            	'user_role' => $row->role
            );
			$this->session->set_userdata($session_data);

			return true;


		}
	}
?>