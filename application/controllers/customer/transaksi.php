<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$customer = $this->session->userdata('nama_customer');
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, barang br, customer cs WHERE tr.id_barang = br.id_barang 
			AND tr.id_customer = cs.id_customer AND cs.nama_customer='$customer' ORDER BY id_rental DESC")->result();

		$this->load->view('template_customer/header');
		$this->load->view('customer/dashboard' ,$data);
		$this->load->view('customer/transaksi' ,$data);
		$this->load->view('template_customer/footer');
	}
	public function pembayaran($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, barang br, customer cs WHERE tr.id_barang = br.id_barang 
			AND tr.id_customer = cs.id_customer AND tr.id_rental='$id' ORDER BY id_rental DESC")->result();
		$this->load->view('template_customer/header');
		$this->load->view('customer/dashboard' ,$data);
		$this->load->view('customer/pembayaran' ,$data);
		$this->load->view('template_customer/footer');
	}

	public function pembayaran_aksi($id)
	{
		$id = $this->input->post('id_rental');

		$bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
			if($bukti_pembayaran){
				$config ['upload_path']	= './assets/upload';
				$config ['allowed_types']	= 'pdf|jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('bukti_pembayaran')){
					$bukti_pembayaran=$this->upload->data('file_name');
					$this->db->set('bukti_pembayaran', $bukti_pembayaran);
				}else{
					echo $this->upload->display_errors();
				}
			} 
		$data = array(
			'bukti_pembayaran' => $bukti_pembayaran,
		);

		$where = array(
			'id_rental' => $id
		);

		$this->rental_barang->update_data('transaksi',$data, $where);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Bukti Pembayaran berhasil di upload!
						  
						  </div>');
					redirect('customer/transaksi');
	}

		public function cetak_invoice($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, barang br, customer cs WHERE tr.id_barang = br.id_barang 
			AND tr.id_customer = cs.id_customer AND tr.id_rental='$id'")->result();
		
		$this->load->view('customer/cetak_invoice' ,$data);
		
	}

	public function batal_transaksi($id)
	{

		
		$data = $this->db->get_where('transaksi', array('id_rental' => $id))->row();
		$id_barang = $data->id_barang;

		$data_barang = $this->db->get_where('barang', array('id_barang'=>$id_barang))->row();
		$stok = $data_barang->stok;

		$data2 = array('stok' => $stok+1);

		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $data2);
		$this->db->where('id_rental', $id);
		$this->db->delete('transaksi');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Transaksi berhasil dibatalkan!
						  
						  </div>');
					redirect('customer/transaksi');

	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */