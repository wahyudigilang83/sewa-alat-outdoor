<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tampilan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan');
	}

	public function index()
	{
		$data['tampilan'] = $this->M_karyawan->getKaryawan();
		$this->load->view('barang/hlm_tampilan',$data);
	}
	public function tambah()
	{
		
		$this->load->view('tampilan/hlm_tambah_tampilan');
	}

	// fungsi untuk menampilkan halaman tambah barang
	public function add()
	{
		
		$this->M_barang->insertKaryawan();
		redirect('tampilan');
	}

	// function untuk menampilkan halaman edit barang
	public function ubah($id)
	{
		$data['tampilan'] = $this->M_karyawan->getDetailKaryawan($id);
		$this->load->view('tampilan/hlm_edit_karyawan', $data);
	}

	
	// function untuk memproses editMahasiswa data barang
	public function edit()
	{
		$this->M_karyawan->editKaryawan();
		redirect('tampilan');
	}

	// function untuk memproses delete data barang
	public function delete($id)
	{
		$this->M_karyawan->deleteKaryawan($id);
		redirect('tampilan');
	}



}

/* End of file C_barang.php */
/* Location: ./application/controllers/C_barang.php */
