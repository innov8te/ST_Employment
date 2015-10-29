<?php
/**
* 
*/
class Users extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (!isLogin()) {
            redirect('admin');
        }

		$this->load->model('users_model');

		$data['usersList'] = $this->users_model->getUsersList();

		$data['main_content'] = 'admin/users';
		$this->load->view('layouts/admin_template', $data);
	}
	
	
	public function role_check()
    {
        echo $this->input->post('role');
        if ($this->input->post('role') == 0)  {
	        $this->form_validation->set_message('role_check', 'Please choose your role.');
	        return FALSE;
	    }
	    else {
	        return TRUE;
	    }
    }

	function addUser()
	{
		if (!isLogin()) {
            redirect('admin');
        }

		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('display_username', 'Display Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required|callback_role_check');

			if ($this->form_validation->run() == FALSE)
			{
				//$data['alert']['error'] = validation_errors();
				//$this->session->set_flashdata('alert_text', validation_errors());
			}else{
				$this->load->model('users_model');
				$this->users_model->createUser();
				redirect('admin/users');

			}
		}

		$data['main_content'] = 'admin/add_user';

		$this->load->view('layouts/admin_template',$data);
	}


	function usersList()
	{
		if (!isLogin()) {
            redirect('admin');
        }

		// $this->load->model('users_model');

		// $data['usersList'] = $this->create_model->getUsersList();

		// $data['main_content'] = 'admin/users';
		// $this->load->view('layouts/admin_template', $data);

	}
	
	function editUser($id=0)
	{
		if (!isLogin()) {
            redirect('admin');
        }
        
		if ($this->input->post()) {
			$this->load->model('users_model');
			$data['user_data'] = $this->users_model->edit($id);
			$this->session->set_flashdata('alert_text', 'Successfully update !');
		}
		$result = $this->db->where('id', $id)
                            ->get('st_users')->first_row('array');

        $data['user_data'] = $result;


		$data['main_content'] = 'admin/edit_user';
		$this->load->view('layouts/admin_template', $data);
	}


	function deleteUser($id=0)
	{
		if (!isLogin()) {
            redirect('admin');
        }


        $this->load->model('users_model');
        $this->users_model->delete($id);

		redirect('admin/users');

	}


	function viewProfile()
	{
    	if (!isLogin()) {
            redirect('admin');
        }

        $id = $this->session->userdata('id');

    	if ($this->input->post()) {
			$this->load->model('users_model');
			$data['profile_data'] = $this->users_model->editProfile($id);
			$this->session->set_flashdata('alert_text', 'Successfully update !');
		}		

		$result = $this->db->where('id', $id)
                            ->get('st_users')->first_row('array');

        $data['profile_data'] = $result;
        //echo $this->db->queries[1];

		$data['main_content'] = 'admin/profile';
		$this->load->view('layouts/admin_template', $data);
	}



}// End Class
?>