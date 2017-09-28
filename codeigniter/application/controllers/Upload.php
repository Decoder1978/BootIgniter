<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Upload_model');
	}

	public function do_upload()
	{
		$post_data = $this->input->post();
		$album_path = $this->Upload_model->get_album_path($post_data['album_select']);

		$config['upload_path']   = './'.$album_path[0]['album_path'].'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 1000;
		$config['max_width']     = 1024;
		$config['max_height']    = 768;
		$this->load->library('upload', $config);

		$data['title'] = ucfirst('upload');
		$this->load->view('templates/head', $data);


		if ( ! $this->upload->do_upload('userfile'))
		{
			$js_list = array("upload_modal.js");
      $album_data = $this->session->flashdata('album_data');
      $details = $this->session->flashdata('details');
      $this->session->set_flashdata('sub_page', 'pages/upload');
			$page_body = array('page' => 'pages/profile', 'sub_page' => 'pages/upload', 'js_to_load' => $js_list,
			'album_data' => $album_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'error' => $this->upload->display_errors());
			$this->load->view('templates/body', $page_body);
		}

		else
		{
      $details = $this->session->flashdata('details');
			$this->Upload_model->insert_images($this->upload->data(), $post_data['album_select']);
      $this->session->set_flashdata('sub_page', 'pages/upload_success');
			$page_body = array('page' => 'pages/profile', 'sub_page' => 'pages/upload_success',
												'album_data' => $this->upload->data(), 'uname' => $details[0]->name, 'uemail' => $details[0]->email );
			$this->load->view('templates/body', $page_body);
		}
	}
}
?>
