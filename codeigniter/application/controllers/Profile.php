<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('upload_model');
	}
	
	function index()
	{
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$data['title'] = ucfirst('profile');
		$page_body = array('page' => 'pages/profile', 'uname' => $details[0]->name, 'uemail' => $details[0]->email);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}