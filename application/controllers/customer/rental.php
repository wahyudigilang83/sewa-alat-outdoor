<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rental extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function tambah_rental($id)
	{
		$data['detail'] = $this->rental_barang->ambil_id_barang($id);
		$this->load->view('template_customer/header');
		$this->load->view('customer/dashboard' ,$data);
		$this->load->view('customer/tambah_rental' ,$data);
		$this->load->view('template_customer/footer');
	}

	public function tambah_rental_aksi()
	{
		$id_customer 		= $this->session->userdata('id_customer');
		$id_barang 			= $this->input->post('id_barang');
		$tanggal_rental 	= $this->input->post('tanggal_rental');
		$tanggal_kembali 	= $this->input->post('tanggal_kembali');
		$harga 				= $this->input->post('harga');
		$denda 				= $this->input->post('denda');
		$stok 				= $this->input->post('stok');

		$data = array(
			'id_customer'			=> $id_customer,
			'id_barang' 			=> $id_barang,
			'tanggal_rental' 		=> $tanggal_rental,
			'tanggal_kembali'		=> $tanggal_kembali,
			'harga' 				=> $harga,
			'denda' 				=> $denda,
			'tanggal_pengembalian' 	=> '-',
			'status_rental' 		=> 'Belum Selesai',
			'status_pengembalian' 	=> 'Belum Kembali',
		);

		$this->rental_barang->insert_data($data, 'transaksi');
	
		if($stok >= 2){
			$status = array(
			'stok' => $stok-1
		);
		}
		elseif($stok >= 1){
			$status = array(
			'stok' => $stok-1,
			'status' => '0'
		);
		
		}
		

		$id = array(
			'id_barang' => $id_barang
		);

		$this->rental_barang->update_data('barang', $status, $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Transaksi Success, Silahkan Checkout !
						  
						  </div>');
			redirect('customer/data_barang');
	}

}

/*
'id_customer' => $id_customer
'id_customer' => $id_customer
'id_customer' => $id_customer
'id_customer' => $id_customer End of file rental.php */
/* Location: ./application/controllers/rental.php */