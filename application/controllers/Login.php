<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		# code...
	}

	public function admin()
	{
			// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		 
		if ($this->form_validation->run() == TRUE){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$res = $this->db->get('user');

			if($res->num_rows() == 1){
				$adminid=$res->result()[0]->id;
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('usertype', 'admin');
					$this->session->set_userdata('adminid', $adminid);
					$url = base_url('admin');
					header("Location: $url");
			}
		}
	
			$this->load->view('admin/login');
			
	}



		
	public function logout()
	{
		unset ($_SESSION['username']);
		$this->session->sess_destroy();
		//if ($this->uri->segment(3)) $url = base_url($this->uri->segment(3));
		 $url = base_url();

		header("Location: $url");
	}


}
