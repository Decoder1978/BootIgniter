<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comment_model');
    $this->load->library('session');
	}

	public function do_comment()
	{
		$post_data = $this->input->post();
		$album_path = $this->Comment_model->insert_comment($user_id, $comment);

/*		if ( ! $this->upload->do_upload('comment-input'))
		{

		}

		else
		{

		}*/
	}
}
?>
