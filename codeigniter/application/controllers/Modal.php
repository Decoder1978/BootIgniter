<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comment_model');
		$this->load->model('Image_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		/******************* Make modal controller??? ****************/
		$album_data = $this->Image_model->get_album_info();
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

		$gal_data = array('album_data' => $album_data, 'modal_data' => $modal_data,	'comment_data' => $comment_data,	'comment_status' => $comment_status);
		$page_body = array('modal_carousel' => 'pages/modal_carousel', 'modal_comments' => 'pages/modal_comments', 'gal_data' => $gal_data);
	//	$this->load->view('templates/head', $data);
		$this->load->view('pages/modal', $page_body);
	}
}
?>
