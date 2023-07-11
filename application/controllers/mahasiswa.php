<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Mahasiswa');

	}

	public function index()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->getMahasiswa();
		$this->load->view('mahasiswa/hlm_mahasiswa',$data);
	}

	// fungsi untuk menampilkan halaman tambah mahasiswa
	public function tambah()
	{
		
		$this->load->view('mahasiswa/hlm_tambah_mahasiswa');
	}

	// fungsi untuk menampilkan halaman tambah mahasiswa
	public function add()
	{
		
		$this->M_Mahasiswa->insertMahasiswa();
		redirect('mahasiswa');
	}


	// function untuk menampilkan halaman edit mahasiswa
	public function ubah($id)
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->getDetailMahasiswa($id);
		$this->load->view('mahasiswa/hlm_edit_mahasiswa', $data);
	}

	
	// function untuk memproses editMahasiswa data mahasiswa
	public function edit()
	{
		$this->M_Mahasiswa->editMahasiswa();
		redirect('mahasiswa');
	}

	// function untuk memproses delete data mahasiswa
	public function delete($id)
	{
		$this->M_Mahasiswa->deleteMahasiswa($id);
		redirect('mahasiswa');
	}


}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */

