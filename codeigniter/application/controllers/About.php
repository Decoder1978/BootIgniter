<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller 
{
	public function __construct() 
	{ 
		parent::__construct();
	}
	
	public function index() 
	{
		$data['title'] = ucfirst('about');
		$page_body = array('page' => 'pages/about');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	} 
}