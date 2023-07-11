<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_mhs extends CI_Controller {

    public function index()
    {
    $this->load->model('m_mhs');
    $mhs = $this->m_mhs->getArrayMhs();
    $this->load->view('viewmhs',$mhs);
    }

}