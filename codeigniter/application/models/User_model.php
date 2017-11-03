<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
				$this->load->helper('date');
    }

	function get_user($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('password', md5($pwd));
    $query = $this->db->get('users');
		return $query->result();
	}

	function get_user_by_id($id)
	{
		$this->db->where('user_id', $id);
    $query = $this->db->get('users');
		return $query->result();
	}

	function insert_user($data)
  {
		return $this->db->insert('users', $data);
	}

	function change_user_info($new_name, $details)
  {
		$data = array(
				'name' => $new_name,
				'date_updated' => date('Y-m-d H:i:s')
		);

		$this->db->where('email', $details[0]->email);
		return $this->db->update('users', $data);
	}

}?>
