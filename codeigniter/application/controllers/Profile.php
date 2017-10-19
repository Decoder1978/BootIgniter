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

		$data['title'] = ucfirst('profile');
		$js_list = array("upload_modal.js");
		$details = $this->User_model->get_user_by_id($this->session->userdata('uid'));
		if(!$details) redirect(base_url()); // if enter profile on new browser load
		$album_data = $this->Upload_model->show_albums();
		$this->session->set_flashdata('album_data', $album_data);
		$this->session->set_flashdata('details', $details);
		$sub_page = $this->session->flashdata('sub_page');
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/profile', 'sub_page' => $sub_page = 'pages/upload', 'album_data' => $album_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'error' => '');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}
