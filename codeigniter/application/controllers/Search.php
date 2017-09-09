<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Search Extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('search_model');
	}

	function search_keyword()
	{
		$keyword = $this->input->post('keyword');
		$data['results'] = $this->search_model->search($keyword);
		$this->load->view('pages/result',$data);
	}
}
?>