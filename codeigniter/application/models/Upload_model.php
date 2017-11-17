<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Upload_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

  function show_categories()
	{
    $this->db->from('gallery_category');
    $query = $this->db->get();
		return $query->result();
	}

	function show_albums()
	{
    $this->db->from('gallery_album');
    $query = $this->db->get();
		return $query->result();
	}

  function get_album_path($album)
  {
    $this->db->like('album_title',  $album);
    $this->db->from('gallery_album');
    $query = $this->db->get();
    return $query->result_array();
  }

    function insert_images($image_data, $thumb, $post)
	{
    $this->db->distinct();
    $this->db->select('ga.album_id');
    $this->db->select('ga.album_path');
    $this->db->like('ga.album_title',  $post['album_select']);
    $this->db->from('gallery_album ga');
    $query = $this->db->get();
    $info = $query->result();

    $alb_path_tags = str_replace("/", ",", $info[0]->album_path);
    $alb_name_len = strlen($post['album_select']);
    for($i = 0; $i < count($image_data); $i++)
    {
      $pic_name_tags = str_replace("_", ",", $image_data[$i]['raw_name'], $alb_name_len);
      $tags = substr($alb_path_tags, 8).",".$pic_name_tags;

      $data = array(
            'alt'         => $image_data[$i]['raw_name'],
            'image_title' => ucfirst(str_replace("_", " ", $image_data[$i]['raw_name'])),
            'full_path'   => $info[0]->album_path.'/'.$image_data[$i]['file_name'],
            'file_name'   => $image_data[$i]['file_name'],
            'thumb'       => $thumb,
            'pic_tags'    => $tags,
            'album_id'    => $info[0]->album_id
      );
    }
    $this->db->insert('gallery_image', $data);
	}
}
?>
