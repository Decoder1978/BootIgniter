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
		$data['title'] = ucfirst($this->uri->segment(1));
		$keyword = $this->input->post('keyword');
		$search_result = $this->Search_model->search($keyword);
		/*******************  MODAL SECTION  ****************/
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
			if($this->input->post('comment'))
			{
				$this->session->set_flashdata('msg',"Your message has been sent!");
				$this->Comment_model->insert_comment($insert_data);
			}
		}
		else /* ??!!?? */
		{
			$comment_status = "hidden";
		}

		$js_list = array("gallery_modal.js", "comment_pagination.js");
		$gal_data = array('search_result' => $search_result, 'modal_data' => $modal_data,
											'modal_page' => 'pages/modal', 'modal_carousel' => 'pages/modal_carousel', 'modal_comments' => 'pages/modal_comments',
											'comment_data' => $comment_data,	'comment_status' => $comment_status);
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/result', 'gal_data' => $gal_data);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}

	function download_album()
	{
		$album_id = $this->uri->segment(3);
		$modal_data = $this->Image_model->get_album_images();
		$album_title = '';
		foreach ($modal_data as $value) {
			if($value->album_id == $album_id){
				$album_title = $value->album_title;
				$this->zip->read_file($value->full_path);
			}

		}
		$this->zip->compression_level = 5;
		$this->zip->archive('backup/archives/'.$album_title.'.zip');
		$this->zip->download($album_title.'.zip');
	}
}
?>
