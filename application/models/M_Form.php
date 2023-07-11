<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Form extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function validation()
	{
		return[
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required|max_length[62]'
			],
				[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[62]'
			],
				[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'
			],

			];
	}

}

/* End of file M_Form.php */
/* Location: ./application/models/M_Form.php */