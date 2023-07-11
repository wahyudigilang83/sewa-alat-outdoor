<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['barang'] = $this->rental_barang->get_data('barang')->result();
		$this->load->view('template_customer/header');
		$this->load->view('customer/dashboard' ,$data);
		$this->load->view('template_customer/footer');
		
	}

	public function detail_barang($id)
	{
		$data['detail'] = $this->rental_barang->ambil_id_barang($id);
		$this->load->view('template_customer/header');
		$this->load->view('customer/detail_barang' ,$data);
		$this->load->view('template_customer/footer');
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */