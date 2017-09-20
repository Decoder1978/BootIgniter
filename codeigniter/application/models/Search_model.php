<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Search_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->from('gallery_album ga');
        $this->db->like('ga.title',$keyword, 'both');
        $this->db->or_like('gi.title',$keyword, 'both');
        $this->db->join('gallery_image gi', 'gi.album_id = ga.album_id');
        $query = $this->db->get();
        return $query->result();
    }
}
?>
