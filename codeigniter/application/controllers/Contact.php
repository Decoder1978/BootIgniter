<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{
	public function __construct() 
	{ 
		parent::__construct();
	}
	
	public function index() 
	{
		$data['title'] = ucfirst('contact');
		$page_body = array('page' => 'pages/contact');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	} 
}