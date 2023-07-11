<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rental_barang');
	}

	public function index()
	{
		$data['customer']	= $this->rental_barang->get_data('customer')->result();
		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/data_customer',$data);
		$this->load->view('template_admin/footer');	
	}
	public function tambah_customer()
	{
		$data['customer']	= $this->rental_barang->get_data('customer')->result();
		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/form_tambah_customer');
		$this->load->view('template_admin/footer');	
	}
	public function tambah_customer_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_customer();
		}else{
			$nama_customer 	= $this->input->post('nama_customer');
			$username 		= $this->input->post('username');
			$alamat 		= $this->input->post('alamat');
			$gender 		= $this->input->post('gender');
			$no_telp 		= $this->input->post('no_telp');
			$no_ktp 		= $this->input->post('no_ktp');
			$password 		= md5($this->input->post('password'));
			$role_id 		= $this->input->post('role_id');

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
						  Data Customer Berhasil Ditambahkan!
						  
						  </div>');
			redirect('admin/data_customer');
		}
	}

	public function update_customer($id)
	{
		$where = array('id_customer' => $id);
		$data['customer']	= $this->db->query("SELECT * FROM customer WHERE id_customer = '$id'")->result();
		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/form_update_customer',$data);
		$this->load->view('template_admin/footer');	
	}
	public function update_customer_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->update_customer($this->input->post('id_customer'));
		}else{
			$id 			= $this->input->post('id_customer');
			$nama_customer 	= $this->input->post('nama_customer');
			$username 		= $this->input->post('username');
			$alamat 		= $this->input->post('alamat');
			$gender 		= $this->input->post('gender');
			$no_telp 		= $this->input->post('no_telp');
			$no_ktp 		= $this->input->post('no_ktp');
			$password 		= md5($this->input->post('password'));
			$role_id 		= $this->input->post('role_id');


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
			$where = array(
				'id_customer' => $id
			);

			$this->rental_barang->update_data('customer',$data,$where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Customer Berhasil Diupdate!
						  
						  </div>');
			redirect('admin/data_customer');
		}
	}
	public function delete_customer($id)
	{
		$where = array('id_customer' => $id);
		$this->rental_barang->delete_data($where, 'customer');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Type Berhasil Dihapus!
						  
						  </div>');
		redirect('admin/data_customer');
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

/* End of file data_customer.php */
/* Location: ./application/controllers/data_customer.php */