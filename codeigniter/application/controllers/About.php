<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!file_exists(APPPATH.'views/pages/about.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = ucfirst($this->uri->segment(1));
		$page_body = array('page' => 'pages/about');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}
