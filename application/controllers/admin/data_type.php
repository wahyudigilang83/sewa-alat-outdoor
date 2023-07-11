<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_type extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rental_barang');
	}

	public function index()
	{
		$data['type'] = $this->rental_barang->get_data('type')->result();

		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/data_type',$data);
		$this->load->view('template_admin/footer');	
	}

	public function tambah_type()
	{
		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/form_tambah_type');
		$this->load->view('template_admin/footer');	
	}

	public function tambah_type_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)	{
			$this->tambah_type();
		}else{
			$kode_type 			= $this->input->post('kode_type');
			$nama_type 			= $this->input->post('nama_type');
			
			$data = array (
				'kode_type'	=> $kode_type,
				'nama_type'	=> $nama_type
			);
			
		$this->rental_barang->insert_data($data,'type');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Barang Berhasil Ditambahkan!.
						  
						  </div>');
		redirect('admin/data_type');
		
		
		}
	}

	public function update_type($id)
	{
		$where = array('id_type' => $id);
		$data ['type']	= $this->db->query("SELECT * FROM type WHERE id_type = '$id'")->result();
		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/form_update_type',$data);
		$this->load->view('template_admin/footer');	
	}

	public function update_type_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE)
		{
			$this->update_type($this->input->post('id_type'));
		}else{
			$id 		= $this->input->post('id_type');
			$kode_type 	= $this->input->post('kode_type');
			$nama_type 	= $this->input->post('nama_type');

			$data = array (
				'kode_type' => $kode_type,
				'nama_type' => $nama_type
			);
			$where = array (
				'id_type' => $id
			);
			$this->rental_barang->update_data('type', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Type Berhasil Diupdate!
						  
						  </div>');
			redirect('admin/data_type');
		}
	}

	public function delete_type($id)
	{
		$where = array('id_type' => $id);
		$this->rental_barang->delete_data($where, 'type');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Type Berhasil Dihapus!
						  
						  </div>');
		redirect('admin/data_type');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_type','Kode Type','required');
		$this->form_validation->set_rules('nama_type','Nama Type','required');
	}

}

/* End of file data_type.php */
/* Location: ./application/controllers/data_type.php */