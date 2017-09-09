<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('image_model');
	}
	
	function index()
	{
		if ( ! file_exists(APPPATH.'views/pages/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = ucfirst('home');
		//$rand_img_data = $this->image_model->get_random_image();
		//$home_gal = $this->load->view('pages/home_gal');
		$page_body = array('page' => 'pages/home', 'nested_home_gal' => 'pages/home_gal');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
	
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('home/index');
	}
}


