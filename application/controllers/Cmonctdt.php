<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmonctdt extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mmonctdt');
	}
	public function index()
	{

		$data['user'] = getSession();
		$data['message'] = getMessages();
		$data['url'] = base_url();
		$temp['data'] = $data;
		// pr($data);
		$temp['template'] = "Vmonctdt";
		$this->load->view('layout/VContent', $temp);
	}
}
?>