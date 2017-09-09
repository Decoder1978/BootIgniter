<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Search_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('title',$keyword);
        $query = $this->db->get('gallery_image');
        return $query->result();
    }
}   
?>