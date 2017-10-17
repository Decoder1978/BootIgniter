<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller
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
		if ( ! file_exists(APPPATH.'views/pages/gallery.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($this->uri->segment(1));
		$category_data = $this->Image_model->get_category_info();
		$album_data = $this->Image_model->get_album_info();
		$img_data = $this->Image_model->get_image($this->uri->segment(1));
		/**************************************/
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
/* ??!!?? */
		else
		{
			$comment_status = "hidden";
		}

/***********************************************/
		$js_list = array("gallery_filter.js", "gallery_modal.js", "comment_pagination.js");
		$gal_data = array('category_data' => $category_data, 'album_data' => $album_data, 'img_data' => $img_data, 'modal_data' => $modal_data,
											'modal_page' => 'pages/modal', 'modal_carousel' => 'pages/modal_carousel', 'modal_comments' => 'pages/modal_comments',
											'comment_data' => $comment_data, 'comment_status' => $comment_status);
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/gallery', 'img_gal' => 'pages/img_gallery', 'gal_data' => $gal_data);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}
?>
