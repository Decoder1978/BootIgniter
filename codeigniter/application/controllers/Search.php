<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Search Extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Search_model');
	}


	function search_keyword()
	{
		$data['title'] = ucfirst('search result');
		$keyword = $this->input->post('keyword');
		$search_result = $this->Search_model->search($keyword);

		$page_body = array('page' => 'pages/result', 'search_result' => $search_result);
		$this->load->view('templates/head', $data);
		$this->load->view('templates/body', $page_body);
//		$this->load->view('pages/result',$data);
	}
}
?>
