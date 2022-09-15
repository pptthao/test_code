<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cxetmienmon extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mxetmienmon');
	}
	public function index()
	{

		$data['user'] = getSession()[0];
		$data['message'] = getMessages();
		$data['url'] = base_url();
		$temp['data'] = $data;
		// pr($data);
		$temp['template'] = "Vxetmienmon";
		$this->load->view('layout/VContent', $temp);
	}
}
?>