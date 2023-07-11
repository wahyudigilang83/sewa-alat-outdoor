<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

		
	}
	public function getBarang()
	{
		$result = $this->db->get('barang');
		return $result;
		
	}

	public function insertBarang()
	{

		$insert = array ( 
			'nama_barang'=>$this->input->post('nama_barang'),
			'jenis_barang'=>$this->input->post('jenis_barang'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'qty'=>$this->input->post('qty'),
			'harga'=>$this->input->post('harga'),
		);
		$result = $this->db->insert('barang', $insert);
		return $result;
	}

	public function getDetailBarang($id){
		$this->db->where('id_barang',$id);
		$result = $this->db->get('barang')->result_array();
		return $result[0];
	}
	public function editBarang()
	{
		$edit = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'deskripsi' => $this->input->post('deskripsi'),
			'qty' => $this->input->post('qty'),
			'harga' => $this->input->post('harga'), 
		);
		$this->db->where('id_barang', $this->input->post('id'));
		$result = $this->db->update('barang', $edit);
		return $result;
	}

	public function deleteBarang($id)
	{
		$this->db->where('id_barang', $id);
		$result = $this->db->delete('barang');
		return $result;
	}
		public function validation()
	{
		return[
			[
				'field' => 'nama_barang',
				'label' => 'Nama Barang',
				'rules' => 'required|max_length[62]'
			],
				[
				'field' => 'jenis_barang',
				'label' => 'Email',
				'rules' => 'required|max_length[62]'
			],
				[
				'field' => 'deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required'
			],

				[
				'field' => 'qty',
				'label' => 'Qty',
				'rules' => 'required'
			],
				[
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required'
			],

			];
	}


}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */