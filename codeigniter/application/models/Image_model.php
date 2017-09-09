<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class image_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	// get image
	function get_image()
	{
		$this->db->order_by('image_id');
	//	$this->db->limit(1);
        $query = $this->db->get('gallery_image');
		return $query->result();
	}
	function get_random_image()
	{
		$this->db->order_by('image_id', 'RANDOM');
		$this->db->limit(4);
		$query = $this->db->get('gallery_image');
		return $query->result();

	}
	
}?>