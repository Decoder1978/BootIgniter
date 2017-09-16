<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_comments()
    {
      $this->db->from('comments');
      $this->db->join('users', 'comments.user_id == users.user_id', 'right');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
}

?>
