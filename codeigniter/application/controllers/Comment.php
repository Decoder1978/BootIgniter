<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comment_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		/******************* Make comment controller??? ****************/
		$comment_data = $this->Comment_model->get_comments();
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

		$comm_data = array('comment_data' => $comment_data, 'comment_status' => $comment_status);
		$page_body = array('page' => 'pages/album_coms', 'comm_data' => $comm_data);
		$this->load->view('templates/body', $page_body);
	}
}
?>
