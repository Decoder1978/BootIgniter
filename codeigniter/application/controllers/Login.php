<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('user_model');
	}

  public function index()
  {
		if (!file_exists(APPPATH.'views/pages/login.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		// form validation
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if ($this->form_validation->run() == FALSE)
    {
			// validation fail
			$data['title'] = ucfirst($this->uri->segment(1));
			$page_body = array('page' => 'pages/login');
			$this->load->view('templates/head', $data);
			$this->load->view('templates/body', $page_body);
		}
		else
		{
			// get form input
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			// check for user credentials
			$uresult = $this->user_model->get_user($email, $password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'uname' => $uresult[0]->name, 'uid' => $uresult[0]->user_id);
				$this->session->set_userdata($sess_data);
				redirect(base_url().'home');
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email or Password!</div>');
				redirect(base_url().'login');
			}
		}
  }
}
