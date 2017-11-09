<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Upload_model');
	}

	function index()
	{
		if (!file_exists(APPPATH.'views/pages/profile.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[14]');

		$data['title'] = ucfirst($this->uri->segment(1));

		$details = $this->User_model->get_user_by_id($this->session->userdata('uid'));
		if(!$details) redirect(base_url()); // if enter profile on new browser load

		if ($this->form_validation->run() != FALSE)
    {
			if($this->input->post('name') != "" && $this->input->post('name') != $details[0]->name)
			{
				$new_name = $this->input->post('name');
				$this->User_model->change_user_info($new_name, $details);
				$this->session->set_userdata('uname', $new_name);
				$details[0]->name = $new_name;
			}
		}

		$cat_data = $this->Upload_model->show_categories();
		$album_data = $this->Upload_model->show_albums();

		$this->session->set_flashdata('cat_data', $cat_data);
		$this->session->set_flashdata('album_data', $album_data);
		$this->session->set_flashdata('details', $details);

		$js_list = array("upload_modal.js");
		$sub_page = $this->session->flashdata('sub_page');
		$page_body = array('js_to_load' => $js_list, 'page' => 'pages/profile', 'sub_page' => $sub_page = 'pages/upload', 'cat_data' => $cat_data, 'album_data' => $album_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'error' => '');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}


}
