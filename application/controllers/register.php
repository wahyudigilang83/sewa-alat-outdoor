<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){

		$this->load->view('template_admin/header');
		$this->load->view('register_form');
		$this->load->view('template_admin/footer');
		}else {
			$nama_customer 	= $this->input->post('nama_customer');
			$username 		= $this->input->post('username');
			$alamat 		= $this->input->post('alamat');
			$gender 		= $this->input->post('gender');
			$no_telp 		= $this->input->post('no_telp');
			$no_ktp 		= $this->input->post('no_ktp');
			$password 		= md5($this->input->post('password'));
			$role_id		= '2';

			$data  = array(
				'nama_customer'	=> $nama_customer,
				'username'		=> $username,
				'alamat'		=> $alamat,
				'gender'		=> $gender,
				'no_telp'		=> $no_telp,
				'no_ktp'		=> $no_ktp,
				'password'		=> $password,
				'role_id'		=> $role_id
			);

			$this->rental_barang->insert_data($data,'customer');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Register Success!
						  
						  </div>');
			redirect('auth/login');
		}
	}
	
	public function _rules()
	{
		$this->form_validation->set_rules('nama_customer','Nama Customer','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('no_telp','No. Telepon','required');
		$this->form_validation->set_rules('no_ktp','No. KTP','required');
		$this->form_validation->set_rules('password','Password','required');
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */