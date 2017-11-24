<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Image_model');
		$this->load->model('Comment_model');
	}

	public function index($album_title)
	{
		if (!file_exists(APPPATH.'views/pages/album.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = ucfirst($album_title);

		/*******************  MODAL SECTION  ****************/
		$album_info = $this->Image_model->get_album_id($album_title);
		$modal_data = $this->Image_model->get_album_images($album_info[0]->album_id);
		$alb_tags_arr = explode(",", $modal_data[0]->alb_tags);

		$comment_data = $this->Comment_model->get_comments_by_id($album_info[0]->album_id);
		$comment_status = '';
		/*******************  COMMENT SECTION  ****************/
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
				redirect(base_url()."album/".$this->uri->segment(2));
			}
		}
		else
			$comment_status = "hidden";
		/******************************************************************/

		$js_list = array("album_carousel.js");
		$gal_data = array('modal_data' => $modal_data, 'album_title' => $album_title, 'album_tags' => $alb_tags_arr, 'comment_data' => $comment_data, 'comment_status' => $comment_status);
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/album', 'page_com' => 'pages/album_coms', 'gal_data' => $gal_data);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}
