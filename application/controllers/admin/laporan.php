<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rental_barang');
	}

	public function index()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->load->view('template_admin/header');	
			$this->load->view('template_admin/sidebar');	
			$this->load->view('admin/filter_laporan');
			$this->load->view('template_admin/footer');
		}else{
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, barang br, customer cs WHERE tr.id_barang = br.id_barang AND tr.id_customer = cs.id_customer AND date (tanggal_rental) >= '$dari' AND date (tanggal_rental) <= '$sampai'")->result();
			$this->load->view('template_admin/header');	
			$this->load->view('template_admin/sidebar');	
			$this->load->view('admin/tampilkan_laporan',$data);
			$this->load->view('template_admin/footer');

		}

			
	}
	public function print_laporan()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['title'] = "Print Laporan Transaksi";
		$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, barang br, customer cs WHERE tr.id_barang = br.id_barang AND tr.id_customer = cs.id_customer AND date (tanggal_rental) >= '$dari' AND date (tanggal_rental) <= '$sampai'")->result();
		$this->load->view('template_admin/header', $data);	
		
		$this->load->view('admin/print_laporan',$data);
		
	}
	public function _rules()
	{
		$this->form_validation->set_rules('dari','Dari Tanggal','required');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */