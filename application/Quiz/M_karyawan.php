<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

		
	}
	public function getkaryawan()
	{
		$result = $this->db->get('tampilan');
		return $result;
		
	}

	public function insertKaryawan()
	{
		$insert = array ( 
			'karyawan'=>$this->input->post('karyawan'),
			'tunjangan'=>$this->input->post('tunjangan'),
			'uangmakan'=>$this->input->post('uangmakan'),
			'bonus'=>$this->input->post('bonus'),
			'jumlahharikerja'=>$this->input->post('jumlahharikerja'),
		);
		$result = $this->db->insert('barang', $insert);
		return $result;
	}

	public function getDetailKaryawan($id){
		$this->db->where('id_karyawan',$id);
		$result = $this->db->get('tampilan')->result_array();
		return $result[0];
	}
	public function editKaryawan()
	{
		$edit = array(
			'karyawan'=>$this->input->post('karyawan'),
			'tunjangan'=>$this->input->post('tunjangan'),
			'uangmakan'=>$this->input->post('uangmakan'),
			'bonus'=>$this->input->post('bonus'),
			'jumlahharikerja'=>$this->input->post('jumlahharikerja'),
		);
		$this->db->where('id_karyawan', $this->input->post('id'));
		$result = $this->db->update('tampilan', $edit);
		return $result;
	}

	public function deleteKaryawan($id)
	{
		$this->db->where('id_karyawan', $id);
		$result = $this->db->delete('tampilan');
		return $result;
	}


}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */