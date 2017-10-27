<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Search_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->from('gallery_image gi');
        $this->db->like('gi.pic_tags', $keyword, 'both');
        $this->db->join('gallery_album ga', 'ga.album_id = gi.album_id');
        $query = $this->db->get();
        return $query->result();
    }
}
?>
