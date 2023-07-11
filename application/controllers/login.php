<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	$this->load->view('vlogin');	
	}

	//set data session dalam bentuk array
	public function set()
	{
		$array = array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			
		);
		$this->session->set_userdata($array);
		redirect ('login');
	}
	public function deleteall()
	{
		session_destroy();
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */