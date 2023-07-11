<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginn extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	$this->load->view('lsess');
	}

	public function cek()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		if ($username=="admin" && $password=="admin123") {
			$this->session->set_userdata(array('username'=>$username));
			$this->session->set_userdata(array('password'=>$password));
			$this->load->view('dashboard');
		}else{
			redirect('loginn');
		}
	}
	public function cek2()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		if ($username=="pembeli" && $password=="pembeli123") {
			$this->session->set_userdata(array('username'=>$username));
			$this->session->set_userdata(array('password'=>$password));
			$this->load->view('dashboard');
		}else{
			redirect('loginn');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('loginn');
	}
}

/* End of file sess.php */
/* Location: ./application/controllers/sess.php */