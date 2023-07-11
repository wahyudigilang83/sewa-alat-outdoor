<?php if ( ! defined('BASEPATH')) exit('No direct script
access allowed');
class m_mhs extends CI_Model {
    
    function getArrayMhs()
    {
        $mhs =  array(
			'nama' => 'Rizky Gilang Dwi Wahyudi',
			'nim' => '2015354033',
			'alamat' => 'Canggu',
            'telp' => '08970274763'
		);
		return $mhs;
    }
}