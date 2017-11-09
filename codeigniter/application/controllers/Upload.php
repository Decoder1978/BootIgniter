<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Upload_model');
	}

	function multi_upload()
	{
		if (!file_exists(APPPATH.'views/pages/upload.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->library('upload');
		$post_data = $this->input->post();
		$album_path = $this->Upload_model->get_album_path($post_data['album_select']);

		$cat_data = $this->session->flashdata('cat_data');
		$album_data = $this->session->flashdata('album_data');
		$details = $this->session->flashdata('details');
		$this->session->set_flashdata('cat_data', $cat_data);
		$this->session->set_flashdata('album_data', $album_data);
		$this->session->set_flashdata('details', $details);

    $number_of_files_uploaded = count($_FILES['usr_files']['name']);
		$uploaded_files = $_FILES['usr_files'];
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded; $i++)
		{
      $_FILES['userfile']['name']     = $uploaded_files['name'][$i];
      $_FILES['userfile']['type']     = $uploaded_files['type'][$i];
      $_FILES['userfile']['tmp_name'] = $uploaded_files['tmp_name'][$i];
      $_FILES['userfile']['error']    = $uploaded_files['error'][$i];
      $_FILES['userfile']['size']     = $uploaded_files['size'][$i];

      $config = array(
        'file_name'     => $uploaded_files['name'][$i],
        'allowed_types' => 'jpg|jpeg|png|gif',
        'max_size'      => 3000,
        'overwrite'     => FALSE,
        'upload_path'   => './'.$album_path[0]['album_path'].'/'
      );
      $this->upload->initialize($config);

			if ( ! $this->upload->do_upload()) {
				$this->session->set_flashdata('sub_page', 'pages/upload');
				$js_list = array("upload_modal.js");
				$page_body = array('js_to_load' => $js_list, 'page' => 'pages/profile', 'sub_page' => 'pages/upload',
				'album_data' => $album_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email, 'error' => $this->upload->display_errors());
			}
			else {
				$this->load->library('image_lib');
				// Continue processing the uploaded data
				$details = $this->session->flashdata('details');
				$img_data[$i] = $this->upload->data();

				$config1 = array(
					'image_library' 	=> 'gd2',
					'source_image' 		=> $_SERVER['DOCUMENT_ROOT'].'/'.$album_path[0]['album_path'].'/'.$img_data[$i]["file_name"],
					'new_image' 			=> $_SERVER['DOCUMENT_ROOT'].'/'.$album_path[0]['album_path']."/thumbs".'/',
					'maintain_ratio' 	=> TRUE,
					'width' 					=> 400,
					'create_thumb' 		=> TRUE
				);

				if (!is_dir($config1['new_image'])) {
				    mkdir($config1['new_image'], 0755, TRUE);
				}

				$this->image_lib->initialize($config1);
		    if ( ! $this->image_lib->resize()) {
		        echo $this->image_lib->display_errors();
		        return;
		    }

				$search = array(".gif", ".jpg", ".png");
				$replace = array("_thumb.gif", "_thumb.jpg", "_thumb.png");
				$thumb = str_replace($search, $replace, $img_data[$i]["file_name"]);
				$this->Upload_model->insert_images($img_data, $thumb, $post_data);
				$this->image_lib->clear();

				$js_list = array("upload_modal.js");
				$this->session->set_flashdata('sub_page', 'pages/upload_success');
				$page_body = array('js_to_load' => $js_list, 'page' => 'pages/profile', 'sub_page' => 'pages/upload_success',
													'album_data' => $img_data, 'uname' => $details[0]->name, 'uemail' => $details[0]->email );
			}
    }

		$data['title'] = ucfirst('upload');
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
	}
}
?>
