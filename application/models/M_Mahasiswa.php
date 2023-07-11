<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getMahasiswa()
	{
		$result = $this->db->get('mahasiswa');
		return $result;
		
	}

	public function insertMahasiswa()
	{
		$insert = array ( 
			'nim'=>$this->input->post('nim'),
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jurusan'=>$this->input->post('jurusan'),
			'tlp'=>$this->input->post('tlp'),
			'alamat'=>$this->input->post('alamat'),
		);
		$result = $this->db->insert('mahasiswa', $insert);
		return $result;
	}
	public function getDetailMahasiswa($id)
	{
		$this->db->where('id_mahasiswa',$id);
		$result = $this->db->get('mahasiswa') -> result_array();
		return $result[0];
	}

	public function editMahasiswa()
	{
		$edit = array(
			'nim' => $this->input->post('nim'),
			'nama_mahasiswa' => $this->input->post('nama'),
			'jurusan' => $this->input->post('jurusan'),
			'tlp' => $this->input->post('tlp'),
			'alamat' => $this->input->post('alamat'), 
		);
		$this->db->where('id_mahasiswa', $this->input->post('id'));
		$result = $this->db->update('mahasiswa', $edit);
		return $result;
	}

	public function deleteMahasiswa($id)
	{
		$this->db->where('id_mahasiswa', $id);
		$result = $this->db->delete('mahasiswa');
		return $result;
	}

}

/* End of file M_Mahasiswa.php */
/* Location: ./application/models/M_Mahasiswa.php */