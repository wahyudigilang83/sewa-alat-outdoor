<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rental_barang');
	}

	public function index()
	{
		$data['barang'] = $this->rental_barang->get_data('barang')->result();
		$data['type'] = $this->rental_barang->get_data('type')->result();

		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/data_barang',$data);
		$this->load->view('template_admin/footer');	

	}
	public function tambah_barang()
	{
		$data['type'] = $this->rental_barang->get_data('type')->result();

		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/form_tambah_barang',$data);
		$this->load->view('template_admin/footer');	
	}
	public function tambah_barang_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)	{
			$this->tambah_barang();
		}else{
			$kode_type 			= $this->input->post('kode_type');
			$nama_barang 		= $this->input->post('nama_barang');
			$deskripsi 			= $this->input->post('deskripsi');
			$status 			= $this->input->post('status');
			$harga 			= $this->input->post('harga');
			$denda 			= $this->input->post('denda');
			$stok 			= $this->input->post('stok');

			$config['upload_path']		= './assets/upload/';
			$config['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar Barang Gagal Diupload!";
				}else{
					$gambar = $this->upload->data('file_name');
					$data = array(
						'kode_type' 	=>$kode_type,
						'nama_barang'	=>$nama_barang,
						'deskripsi' 	=>$deskripsi,
						'status'  		=>$status,
						'harga'  		=>$harga,
						'denda'  		=>$denda,
						'gambar'  		=>$gambar,
						'stok'  		=>$stok
					);

					$this->rental_barang->insert_data($data,'barang');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Barang Berhasil Ditambahkan!
						  
						  </div>');
					redirect('admin/data_barang');
				}
		
		}
	}
	public function update_barang($id){

		$where = array('id_barang' => $id);
		$data ['barang'] = $this->db->query("SELECT * FROM barang br, type ty where br.kode_type
			=ty.kode_type and br.id_barang='$id' ") ->result();
		$data['type'] = $this->rental_barang->get_data('type')->result();

		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/form_update_barang',$data);
		$this->load->view('template_admin/footer');	
	}

	public function update_barang_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->update_barang($this->input->post('id_barang'));
		}else{
			$id 				= $this->input->post('id_barang');
			$kode_type 			= $this->input->post('kode_type');
			$nama_barang 		= $this->input->post('nama_barang');
			$deskripsi 			= $this->input->post('deskripsi');
			$status 			= $this->input->post('status');
			$harga 			= $this->input->post('harga');
			$denda 			= $this->input->post('denda');
			$stok 			= $this->input->post('stok');

			$config['upload_path']		= './assets/upload/';
			$config['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){
					$gambar = $this->input->post('gambarlama');
					$data = array(
						'kode_type' 	=>$kode_type,
						'nama_barang'	=>$nama_barang,
						'deskripsi' 	=>$deskripsi,
						'status'  		=>$status,
						'harga'  		=>$harga,
						'denda'  		=>$denda,

						'gambar'  		=>$gambar,
						'stok'  		=>$stok
					);
					$this->db->where('id_barang', $this->input->post('id_barang'));
					$this->db->update('barang',$data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Barang Berhasil Diupdate!
						  
						  </div>');
					redirect('admin/data_barang');
				}else{
					$gambar = $this->upload->data('file_name');
					$data = array(
						'kode_type' 	=>$kode_type,
						'nama_barang'	=>$nama_barang,
						'deskripsi' 	=>$deskripsi,
						'status'  		=>$status,
						'harga'  		=>$harga,
						'denda'  		=>$denda,
						'gambar'  		=>$gambar,
						'stok'  		=>$stok
					);
					$this->db->where('id_barang', $this->input->post('id_barang'));
					$this->db->update('barang',$data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Barang Berhasil Ditambahkan!
						  
						  </div>');
					redirect('admin/data_barang');
				}
			}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_type','Kode Type','required');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('harga','Harga Sewa','required');
		$this->form_validation->set_rules('denda','Denda','required');
	}
	public function detail_barang($id)
	{
		$data['detail'] = $this->rental_barang->ambil_id_barang($id);
		$this->load->view('template_admin/header');	
		$this->load->view('template_admin/sidebar');	
		$this->load->view('admin/detail_barang',$data);
		$this->load->view('template_admin/footer');	
	}

	public function delete_barang($id)
	{
			$where = array('id_barang' => $id);
			$this->rental_barang->delete_data($where, 'barang');
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				   Data Barang Berhasil Dihapus!
				   </div>');
					redirect('admin/data_barang');
	}

}

/* End of file data_barang.php */
/* Location: ./application/controllers/data_barang.php */