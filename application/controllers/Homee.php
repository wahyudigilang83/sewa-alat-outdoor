<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data1['judul']= 'halaman home';
		$data2['text']= 'ini halaman login';
		$data3['bawah']= 'ini bawah';
		$this->load->view('template/header', $data1);
		$this->load->view('home',$data2);
		$this->load->view('template/footer',$data3);

	}
		public function tempt()
	{
		$data1['judul']= 'halaman help';
		$data2['text']= 'ini halaman help';
		$data3['bawah']= 'ini bawah';
		$this->load->view('template/header', $data1);
		$this->load->view('home',$data2);
		$this->load->view('template/footer',$data3);

	}


}

/* End of file Homee.php */
/* Location: ./application/controllers/Homee.php */