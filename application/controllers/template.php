<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class template extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('body');
		$this->load->view('widget/footer');
	}

}

/* End of file template.php */
/* Location: ./application/controllers/template.php */