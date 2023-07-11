<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rental_barang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_data($table){
		return $this->db->get($table);
	}

	public function get_where($where, $table){
		return $this->db->get_where($table, $where);
	}


	public function insert_data($data,$table){
		$this->db->insert($table, $data);
	}
	public function update_data($table, $data, $where){
		$this->db->update($table, $data, $where);
	}
	public function delete_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function ambil_id_barang($id){
		$hasil = $this->db->where('id_barang', $id)->get('barang');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}
	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db
							->where('username', $username)
							->where('password', md5($password))
							->limit(1)
							->get('customer');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function update_password($where,$data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function downloadPembayaran($id)
	{
		$query= $this->db->get_where('transaksi', array('id_rental' =>$id));
		return $query->row_array();	
	}
}

/* End of file rental_barang.php */
/* Location: ./application/models/rental_barang.php */