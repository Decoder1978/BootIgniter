<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Upload_model');
	}

	function index()
	{
		if ( ! file_exists(APPPATH.'views/pages/profile.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$details = $this->User_model->get_user_by_id($this->session->userdata('uid'));
		$album_data = $this->Upload_model->show_albums();
		$data['title'] = ucfirst('profile');
		$page_body = array('page' => 'pages/profile', 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'album_data' => $album_data);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}

	public function do_upload()
	{
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 100;
		$config['max_width']     = 1024;
		$config['max_height']    = 768;
		$this->load->library('upload', $config);

		$data['title'] = ucfirst('profile');
		$this->load->view('templates/head', $data);


		if ( ! $this->upload->do_upload('userfile'))
		{
				$details = $this->User_model->get_user_by_id($this->session->userdata('uid'));
				$album_data = $this->Upload_model->show_albums();
				$error = array('error' => $this->upload->display_errors());
				$page_body = array('page' => 'pages/profile', 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'album_data' => $album_data, 'error' => $error);
				$this->load->view('templates/body', $page_body);
		}
		else
		{
				$page_body = array('page' => 'pages/upload_success', 'album_data' => $this->upload->data());
				$this->load->view('templates/body', $page_body);
		}
	}
}
