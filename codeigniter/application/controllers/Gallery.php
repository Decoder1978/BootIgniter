<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Image_model');
	}

	function index()
	{
		if ( ! file_exists(APPPATH.'views/pages/gallery.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst('gallery');
	//	$pagination = $this->pagination->create_links();
		$category_data = $this->Image_model->get_category_info();
		$album_data = $this->Image_model->get_album_info();
		$img_data = $this->Image_model->get_image('gallery');

		$gal_data = array('category_data' => $category_data, 'album_data' => $album_data, 'img_data' => $img_data);
		$page_body = array('page' => 'pages/gallery', 'img_gal' => 'pages/img_gallery', 'gal_data' => $gal_data,/*'pic_modal' => 'pages/modal'*/);
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
?>
