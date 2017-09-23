<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Search Extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Search_model');
		$this->load->model('Image_model');
		$this->load->model('User_model');
		$this->load->model('Comment_model');
	}

	function search_keyword()
	{
		$data['title'] = ucfirst('search result');
		$keyword = $this->input->post('keyword');
		$search_result = $this->Search_model->search($keyword);
		$modal_data = $this->Image_model->get_album_images();
		/******************* Make comment controller??? ****************/
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

		$js_list = array("gallery_modal.js");
		$res_info = array('search_result' => $search_result, 'modal_data' => $modal_data, 'comment_data' => $comment_data,	'comment_status' => $comment_status);
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/result', 'res_info' => $res_info);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}
?>
