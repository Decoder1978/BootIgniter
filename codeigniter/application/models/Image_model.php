<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

	function get_category_info()
	{
		$query = $this->db->get('gallery_category');
		$result = $query->result();

		return $result;
	}

	function get_album_info()
	{
		$query = $this->db->get('gallery_album');
		$result = $query->result();

		return $result;
	}

	// get image

	function get_image($page)
	{
		$this->db->distinct();
		$this->db->group_by('album_id');
		if($page == 'home')
			$this->db->limit(4);
    $query = $this->db->get('gallery_image');
		$result = $query->result();

		return $result;
	}

	function get_album_images()
	{
		$query = $this->db->get('gallery_image');
		$result = $query->result();

		return $result;
	}

}?>
