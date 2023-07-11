<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rental_barang');
	}

	public function index()
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, barang br, customer cs WHERE tr.id_barang = br.id_barang 
			AND tr.id_customer = cs.id_customer")->result();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_transaksi', $data);
		$this->load->view('template_admin/footer');
	}
	
	public function pembayaran($id)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_rental', $id);
		$data['pembayaran'] = $this->db->get()->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/konfirmasi_pembayaran', $data);

		
	}
	
	public function cek_pembayaran()
	{
		$id 				= $this->input->post('id_rental');
		$status_pembayaran	= $this->input->post('status_pembayaran');
		$data = array(
			'status_pembayaran' => $status_pembayaran,

		);
		$where = array(
			'id_rental' => $id
		);

		$this->rental_barang->update_data('transaksi', $data, $where);
		redirect('admin/transaksi');
	}

	public function download_pembayaran($id)
	{
		
		$this->load->helper('download');
		$filePembayaran = $this->rental_barang->downloadPembayaran($id);
		$file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
		force_download($file, NULL);
		
	}

	public function transaksi_selesai($id)
	{
		$data1 = $this->db->get_where('transaksi', array('id_rental' => $id))->row();
		$id_barang = $data1->id_barang;

		$data_barang = $this->db->get_where('barang', array('id_barang'=>$id_barang))->row();
		$stok = $data_barang->stok;

		$data2 = array('stok' => $stok+1);

		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $data2);

		$where = array('id_rental' => $id);
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/transaksi_selesai', $data);
		$this->load->view('template_admin/footer');
		
	}

	public function transaksi_selesai_aksi()
	{
		
		$id 					= $this->input->post('id_rental');
		$tanggal_pengembalian 	= $this->input->post('tanggal_pengembalian');
		$status_rental 			= $this->input->post('status_rental');
		$status_pengembalian 	= $this->input->post('status_pengembalian');
		$tanggal_kembali 		= $this->input->post('tanggal_kembali');
		$denda 					= $this->input->post('denda');


		$x 						= strtotime($tanggal_pengembalian);
		$y						= strtotime($tanggal_kembali);
		$selisih				= abs($x - $y)/(60*60*24);
		$total_denda			= $selisih * $denda;

		$data = array(
			'tanggal_pengembalian' => $tanggal_pengembalian,
			'status_rental'		   => $status_rental,
			'status_pengembalian'  => $status_pengembalian,
			'total_denda'			=> $total_denda
			
		);

		$where = array(
			'id_rental' => $id
		);

		$this->rental_barang->update_data('transaksi', $data, $where);
		redirect('admin/transaksi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Transaksi Berhasil Diupdate!.
						  
						  </div>');

	}

	public function transaksi_batal($id)
	{
		
		$where =array('id_rental' => $id);
		$data = $this->rental_barang->get_where($where, 'transaksi')->row();
		$data_barang = $this->db->get_where('barang', array('id_barang'=>$data->id_barang))->row();
		$stok = $data_barang->stok;

		$where2 = array('id_barang' => $data->id_barang);
		$data2 = array(
			'status' => '1',
			'stok' => $stok+1,
		);

		$this->rental_barang->update_data('barang', $data2, $where2);
		$this->rental_barang->delete_data($where, 'transaksi');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Transaksi berhasil dibatalkan!
						  
						  </div>');
					redirect('admin/transaksi');
		
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */