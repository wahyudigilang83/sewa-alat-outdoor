<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
	}

	public function index()
	{
		$data['barang'] = $this->M_barang->getBarang();
		$this->load->view('widget/header');
		$this->load->view('barang/hlm_barang', $data);
		$this->load->view('widget/footer');
	}
	public function tambah()
	{
			
		$this->load->view('widget/header');
		$this->load->view('barang/hlm_tambah_barang');
		$this->load->view('widget/footer');
	}

	// fungsi untuk menampilkan halaman tambah barang
	public function add()
	{
		$rules = $this->M_barang->validation();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('barang/hlm_tambah_barang');
		}else{
			$this->M_barang->insertBarang();
			redirect('barang');
		}
		
	}

	// function untuk menampilkan halaman edit barang
	public function ubah($id)
	{
		$data['barang'] = $this->M_barang->getDetailBarang($id);
		$this->load->view('widget/header');
		$this->load->view('barang/hlm_edit_barang', $data);
		$this->load->view('widget/footer');
	}

	
	// function untuk memproses editBarang data barang
	public function edit($id)
	{
		$rules = $this->M_barang->validation();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$data['barang'] = $this->M_barang->getDetailBarang($id);
			$this->load->view('barang/hlm_edit_barang', $data);
		}else{
			$this->M_barang->editBarang();
			redirect('barang');
		}
		
	}

	// function untuk memproses delete data barang
	public function delete($id)
	{
		$this->M_barang->deletebarang($id);
		redirect('barang');
	}
	public function addcart($id)
	{
		$this->db->where('id_barang', $id);
		$barang = $this->db->get('barang') -> result_array();
		$data = array (
			'id' => $barang[0]['id_barang'],
			'qty' => 1,
			'price' => $barang[0]['harga'],
			'name' => $barang[0]['nama_barang'],
			'options' => array('descriptions' => $barang[0]['deskripsi'])
		);

		$qty = $barang[0]['qty'];

		$qtyUpdate = $qty-1;

		$edit = array(
			'qty' => $qtyUpdate,
		);
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $edit);
		$this->cart->insert($data);
		redirect('barang');			
	}

	
	public function deleteall()
	{
		$this->cart->destroy();
		redirect ('barang');
	}
	public function keranjang()
	{
			$this->load->view('widget/header');
		$this->load->view('keranjang');	
		$this->load->view('widget/footer');
	}
	public function checkout()
	{
			$this->load->view('widget/header');
		$this->load->view('checkout');
		$this->load->view('widget/footer');
		
	}
	public function pembeli()
	{
		$insert = array
		(
		'nama_pembeli' => $this->input->post('nama_pembeli'),
		'telp' => $this->input->post('telp'),
		'alamat' => $this->input->post('alamat'),
		'metode' => $this->input->post('metode'),
		'total' => $this->cart->total()
		);
		$this->db->insert('pembeli', $insert);
		$this->cart->destroy();
		redirect('barang');
	}
	public function logout()
	{
		session_destroy();
		redirect('loginn');
	}


}

/* End of file C_barang.php */
/* Location: ./application/controllers/C_barang.php */
