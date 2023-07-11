<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function temp()
	{
		$template = 'Hello, {title} {firstname} {lastname}';
		$data = array(
			'title' => 'Mr',
			'firstname' => 'Rah',
			'lastname' => 'Smith'
		);
	$this->parser->parse_string($template, $data);
	}

	public function temp2()
	{
		$template = 'Hello, {degrees} {firstname} {lastname} {titles} {degree} {/titles}';
		$data = array(
			'degrees' => 'Mr',
			'firstname' => 'Bean',
			'lastname' => '',
			'titles' => array(
				array('degree' => 'S.Kom'),
				array('degree' => 'M.Kom')
			)
		);
	$this->parser->parse_string($template, $data);
	}
	public function temp3()
	{
			$data = array(
			'blog_title' => 'My blog title',
			'blog_heading' => 'my blog heading',
			
		);
		$string=$this->parser->parse('tes', $data);
	}

	public function temp4()
	{
			$data = array(
			'blog_title' => 'Web lanjut',
			'blog_heading' => 'belajar we lanjut ',
			'blog_entries' => array(
				array('title' =>'materi 1', 'body' => 'crud')
			)
			
		);
		$string=$this->parser->parse('tes', $data);
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */