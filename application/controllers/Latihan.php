<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Latihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_latihan');
	}

	public function input()
	{
		$data = $this->M_latihan->inputMhs();
		if($data){
			echo "berhasil";
		}
		else{
			echo "gagal";
		}
			}

			public function readAll()
			{
				$data = $this->M_latihan->getAllMhs();
				echo "<pre>";
				print_r ($data->result_array());
				echo "</pre>";
			}

				public function readMhs()
				{
					$id = 1;
					$data = $this->M_latihan->getMhs($id);
					echo "<pre>";
					print_r ($data->result_array());
					echo "</pre>";
				}

						public function readMhss()
			{
				//$id=1;
				$data = $this ->M_latihan->getallMhs(1);
				echo "<pre>";
				print_r($data->result_array());
				echo "</pre>";
			}

					public function join()
					{
						$data = $this->M_latihan->joinMhs();
						echo "<pre>";
						print_r ($data->result_array());
						echo "</pre>";
					}

				public function update()
		{
			$id = 1;
			$data = $this->M_latihan->updateMhs($id);
			if($data){
				echo "berhasil";
			}
			else{
				echo "gagal";
			}
	}

			public function delete()
	{
		$id = 1;
		$data = $this->M_latihan->deleteMhs($id);
		if($data){
			echo "berhasil";
		}
		else{
			echo "gagal";
		}
	

	}

}

/* End of file Latihan.php */
/* Location: ./application/controllers/Latihan.php */