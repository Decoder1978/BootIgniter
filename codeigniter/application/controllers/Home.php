<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Image_model');
		$this->load->model('Comment_model');
	}

	function index()
	{
		if ( ! file_exists(APPPATH.'views/pages/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = ucfirst($this->uri->segment(1));
		$img_data = $this->Image_model->get_image($this->uri->segment(1));
		$album_data = $this->Image_model->get_album_info();
		/******************* Make modal controller??? ****************/
		$modal_data = $this->Image_model->get_album_images();
		$comment_data = $this->Comment_model->get_comments();
		$comment_status = '';
		if($this->session->userdata('uid') !== NULL)
		{
			$details = $this->User_model->get_user_by_id($this->session->userdata('uid'));

				$insert_data = array(
					'album' => $this->input->post('album'),
					'name' => $details[0]->name,
					'comment' => $this->input->post('comment')
				);
				$this->Comment_model->insert_comment($insert_data);
		}
/* ??!!?? */
		else
		{
			$comment_status = "hidden";
		}
/******************************************************************/
		$js_list = array("home-carousel.js", "gallery_modal.js", "comment_pagination.js");
		$gal_data = array('album_data' => $album_data, 'img_data' => $img_data,	'modal_data' => $modal_data,
											'modal_page' => 'pages/modal', 'modal_carousel' => 'pages/modal_carousel', 'modal_comments' => 'pages/modal_comments',
											'comment_data' => $comment_data,	'comment_status' => $comment_status);
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/home', 'home_gal' => 'pages/home_gal', 'gal_data' => $gal_data);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}

	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect(base_url().'home');
	}
}
