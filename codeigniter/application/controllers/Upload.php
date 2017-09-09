<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Upload extends CI_Controller 
{
	
	public function __construct() 
	{ 
		parent::__construct();
		$this->load->model('upload_model');
	}
		
	public function index() 
	{ 
		if ( ! file_exists(APPPATH.'views/pages/gallery.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = ucfirst('upload');
		$page_body = array('page' => 'pages/upload', 'error' => ' ');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	} 
		
	public function do_upload() 
	{ 
		$config['upload_path']   = './uploads/'; 
		$config['allowed_types'] = 'gif|jpg|png'; 
		$config['max_size']      = 100; 
		$config['max_width']     = 1024; 
		$config['max_height']    = 768;  
		$this->load->library('upload', $config);
		
		$data['title'] = ucfirst('upload');
		$this->load->view('templates/head', $data);
			
		if ( ! $this->upload->do_upload('userfile')) 
		{
			$album_data = $this->upload_model->show_albums();
			$page_body = array('page' => 'pages/upload', 'upload_album_data' => $album_data, 'error' => $this->upload->display_errors());
			$this->load->view('templates/body', $page_body);
		}

		else 
		{
			$this->upload_model->insert_images($this->upload->data());
			$page_body = array('page' => 'pages/upload_success', 'upload_image_data' => $this->upload->data());
			$this->load->view('templates/body', $page_body);
		} 
	} 
} 
?>