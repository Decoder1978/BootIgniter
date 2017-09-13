<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Image_model');
	}

	function index()
	{
		if ( ! file_exists(APPPATH.'views/pages/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = ucfirst('home');
		$img_data = $this->Image_model->get_image('home');
		$album_data = $this->Image_model->get_album_info();

		$gal_data = array('album_data' => $album_data, 'img_data' => $img_data);
		$page_body = array('page' => 'pages/home', 'nested_home_gal' => 'pages/home_gal', 'gal_data' => $gal_data, /*'pic_modal' => 'pages/modal'*/);
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
