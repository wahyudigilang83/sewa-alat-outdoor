<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sesi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	$this->load->view('vsesi');	
	}

	//set data session dalam bentuk array
	public function set()
	{
		$array = array(
			'username'=>$this->input->post('username'),
			'role'=>$this->input->post('role'),
			'nama'=>$this->input->post('nama'),
		);
		$this->session->set_userdata($array);
		redirect ('sesi');
	}
	public function deleteall()
	{
		session_destroy();
		redirect('sesi');
	}
	public function deleteone()
	{
		$this->session->unset_userdata('role');
		redirect('sesi');
	}


}

/* End of file sesi.php */
/* Location: ./application/controllers/sesi.php */