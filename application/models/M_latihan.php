<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_latihan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

		public function inputMhs()
		{
					$mhs = array(
						'nim' => '2015354033',
						'nama' => 'Gilang',
						'alamat' => 'Canggu',
						'id_jurusan' => 1, 
					);
					$result = $this->db->insert('tb_mhs', $mhs);
					return $result;
		}

			public function getAllMhs()
			{
				$result = $this->db->get('tb_mhs');
				return $result;
			}

		public function getMhs($id)
		{
			$this->db->where('id_jurusan',$id);
			$result = $this->db->get('tb_mhs');
			return $result;
		}
		public function getMhss($id)
	{
		$this->db->where('id_mhs', $id);
		$result = $this ->db->get('tb_mhs');
		return $result;
	}
		

		public function joinMhs()
		{
			$this->db->join('tb_jurusan', 'tb_mhs.id_jurusan = tb_jurusan.id_jurusan');
			$result = $this->db->get('tb_mhs');
			return $result;
		}

	public function updateMhs($id)
	{
				$mhs = array(
					'nim' => '2015354033',
					'nama' => 'Gilang',
					'alamat' => 'Canggu',
					'id_jurusan' => 1, 
				);
				$this->db->where('id_mhs', $id);
				$result = $this->db->update('tb_mhs', $mhs);
				return $result;	
	}

			public function deleteMhs($id)
			{
				$this->db->where('id_mhs', $id);
				$result = $this->db->delete('tb_mhs');
				return $result;
			}

}

/* End of file M_latihan.php */
/* Location: ./application/models/M_latihan.php */