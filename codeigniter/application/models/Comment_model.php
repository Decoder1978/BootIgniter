<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

    function get_comments()
    {
      $this->db->from('comments');
      $this->db->join('users', 'comments.user_id = users.user_id', 'right');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    function insert_comment($insert_data)
    {
      $this->db->select('u.user_id');
      $this->db->where('u.name', $insert_data['name']);
      $this->db->from('users u');
      $query = $this->db->get();

      $info = $query->result_array();

      $data = [];
      if($insert_data['comment'] || $insert_data['album'] !== NULL)
      {
        $data = array(
              'comment_text' => $insert_data['comment'],
              'date' => date('Y-m-d H:i:s'),
              'user_id' => $info[0]['user_id'],
              'album_id' => $insert_data['album']
        );
        $this->db->insert('comments', $data);
      }
  //    $this->db->set('comments', $data);

//      $this->db->query('INSERT INTO comments (comment_id) VALUES ('$data['comment_text']') ON DUPLICATE KEY UPDATE (unicode = '$data["unicode"]')');
    }
}

?>
