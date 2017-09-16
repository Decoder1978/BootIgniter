<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('user_model');
		$this->load->helper('date');
	}

	function index()
	{
		// set form validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

		// submit
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$data['title'] = ucfirst('signup');
			$page_body = array('page' => 'pages/signup');
			$this->load->view('templates/head', $data);
			$this->load->view('templates/body', $page_body);
        }
		else
		{
			//insert user details into db
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'date_created' => date('Y-m-d H:i:s')
			);

			if ($this->user_model->insert_user($data))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('signup/index');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('signup/index');
			}
		}
	}
}
