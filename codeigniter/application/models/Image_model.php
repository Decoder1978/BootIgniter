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
		$category_info = array('rows' => $result, 'num_rows' => $query->num_rows());

		return $category_info;
	}

	function get_album_info()
	{
		$query = $this->db->get('gallery_album');
		$result = $query->result();
		$album_info = array('rows' => $result, 'num_rows' => $query->num_rows());

		return $album_info;
	}

	// get image

	function get_image($page)
	{
		$this->db->distinct();
		$this->db->group_by('album_id');
		//$this->db->order_by('album_id');
		if($page == 'home')
			$this->db->limit(4);
    $query = $this->db->get('gallery_image');
		$result = $query->result();
		$img_info = array('rows' => $result);
		return $img_info;

	}
	/* future update for "Recent Gallery"
	function get_random_image()
	{
		$this->db->distinct();
		$this->db->group_by('album_id', 'RANDOM');
		$this->db->limit(4);
		$query = $this->db->get('gallery_image');
		$result = $query->result();
		$rand_img_info = array('rows' => $result);
		return $rand_img_info;
	}
	*/
}?>
