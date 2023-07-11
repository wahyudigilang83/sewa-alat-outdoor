<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->load->view('template_admin/header');	
			$this->load->view('form_login');
			$this->load->view('template_admin/footer');	

		}else {
				
				$username 		= $this->input->post('username');
				$password 		= md5($this->input->post('password'));

				$cek = $this->rental_barang->cek_login($username, $password);


				if($cek == FALSE)
				{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Username atau Password salah !
						  
						  </div>');
					redirect('auth/login');

				}else{
					$this->session->set_userdata('username', $cek->username);
					$this->session->set_userdata('role_id', $cek->role_id);
					$this->session->set_userdata('nama_customer', $cek->nama_customer);
					$this->session->set_userdata('id_customer', $cek->id_customer);

					switch ($cek->role_id) {
						case 1 : 	redirect('admin/dashboard');
									break;
						case 2 : 	redirect('customer/dashboard');
									break;
						
						default:	break;
					}
				}
			}
	}
	public function _rules()
	{		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
	}

	public function logout()
	{		
		$this->session->sess_destroy();
		redirect('customer/dashboard');
	}

	public function ganti_password()
	{		
		$this->load->view('template_admin/header');	
		$this->load->view('ganti_password');
		$this->load->view('template_admin/footer');	
	}

	public function ganti_password_aksi()
	{		
		$password_baru = $this->input->post('password_baru');
		$ulangi_password = $this->input->post('ulangi_password');

		$this->form_validation->set_rules('password_baru','Password Baru','required|matches[ulangi_password]');
		$this->form_validation->set_rules('ulangi_password','Ulangi Password','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('template_admin/header');	
			$this->load->view('ganti_password');
			$this->load->view('template_admin/footer');	
		}else{
			$data = array('password'=>md5($password_baru));
			$id = array('id_customer' => $this->session->userdata('id_customer'));

			$this->rental_barang->update_password($id, $data,'customer');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Password Diupdate !
						  
						  </div>');
			redirect('auth/login');

		}
		
	}

	

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */