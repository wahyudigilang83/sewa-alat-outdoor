<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class valid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Form');
	}

	public function index()
	{
		$this->load->view('form');

	}
	public function input()
	{
		$rules = $this->M_Form->validation();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('form');
		}else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
			);
			$this->load->view('hasil', $data);
		}
	}

}

/* End of file valid.php */
/* Location: ./application/controllers/valid.php */