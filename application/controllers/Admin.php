<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	

	function __construct()
	{
		 parent::__construct();
        // TODO: check if admin, else redirect to login
        if(!isset($_SESSION['username'])){
        	$url = base_url('login/');
        	header("Location: $url");
        	exit();
        }
        if ($_SESSION['usertype']!="admin") {
        	$url = base_url('login/');
        	header("Location: $url");
        	exit();
        }

    }

	public function index()
	{
		$this->load->view('admin/home');
	}
}
