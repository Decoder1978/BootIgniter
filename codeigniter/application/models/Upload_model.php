<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Upload_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	function show_albums()
	{
		return $this->db->get('gallery_album')->result();
	}
	
    function insert_images($image_data = array())
	{
      $data = array(
          'title' => $image_data['raw_name'],
		  'image_title' => $image_data['file_name'],
          'full_path' => $image_data['full_path'],
		  'date_created' => date('Y-m-d H:i:s');
      );
      $this->db->insert('gallery_image', $data);
	}
}   
?>