<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Upload_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

	function show_albums()
	{
    $this->db->select('title');
    $query = $this->db->get('gallery_album');
		return $query->result();
	}

  function get_album_path($album)
  {
    $this->db->select('album_path');
    $this->db->like('title',  $album);
    $query = $this->db->get('gallery_album');
    return $query->result_array();

  }

    function insert_images($image_data, $select)
	{
    $this->db->select('ga.album_id');
    $this->db->select('ga.album_path');
    $this->db->like('ga.title',  $select);
    $this->db->from('gallery_album ga');
    $this->db->join('gallery_image gi', 'gi.album_id = ga.album_id');
    $query = $this->db->get();

    $info = $query->result_array();
    $data = array(
          'alt' => $image_data['raw_name'],
          'title' => ucfirst(str_replace("_", " ", $image_data['raw_name'])),
          'full_path' => $info[0]['album_path'].'/'.$image_data['file_name'],
          'album_id' => $info[0]['album_id']
    );
    $this->db->insert('gallery_image', $data);
	}
}
?>
