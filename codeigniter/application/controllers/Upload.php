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
		$config['max_size']      = 5000;
		$config['max_width']     = 1920;
		$config['max_height']    = 1080;
		$this->load->library('upload', $config);

		$data['title'] = ucfirst('upload');
		$this->load->view('templates/head', $data);

		if ( ! $this->upload->do_upload('userfile'))
		{
      $album_data = $this->session->flashdata('album_data');
      $details = $this->session->flashdata('details');
      $this->session->set_flashdata('sub_page', 'pages/upload');
			$page_body = array('page' => 'pages/profile', 'sub_page' => 'pages/upload',
			'album_data' => $album_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'error' => $this->upload->display_errors());
			$this->load->view('templates/body', $page_body);
		}

		else
		{
      $details = $this->session->flashdata('details');
			$img_data = $this->upload->data();


			$this->load->library('image_lib');

			$config1['image_library'] 	= 'ImageMagick';
			$config1['source_image'] 		= $img_data["file_name"];
			$config1['new_image']				= 'assets/thumbs/'."thumb_".$img_data["file_name"];
			$config1['maintain_ratio'] 	= TRUE;
			$config1['width']         	= 400;
			$config1['create_thumb'] = TRUE;

			$this->load->library('image_lib', $config1);
	    if ( ! $this->image_lib->resize())
	    {
					echo "1";
	        echo $this->image_lib->display_errors();
	        return;
	    }
			
			$this->Upload_model->insert_images($img_data, "thumb_".$img_data["file_name"], $post_data['album_select']);
			$js_list = array("upload_modal.js");
      $this->session->set_flashdata('sub_page', 'pages/upload_success');
			$page_body = array('js_to_load' => $js_list, 'page' => 'pages/profile', 'sub_page' => 'pages/upload_success',
												'album_data' => $img_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email );
			$this->load->view('templates/body', $page_body);
		}
	}
}
?>
