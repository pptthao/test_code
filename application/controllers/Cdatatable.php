<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cdatatable extends MY_Controller
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
		// $data['sinhvien'] = $this->Mmonctdt->getsv();

		if($this->input->post('action') == "getsv"){
			$this->ajaxGetSV();
		}
		
		if($this->input->post('action') == "addsv"){
			$this->ajaxAddSV();
		}
		
		if($this->input->post('action') == "editsv"){
			$this->ajaxEditSV();
		}
		
		if($this->input->post('action') == "deletesv"){
			$this->ajaxDeleteSV();
		}
		$temp['data'] = $data;
		// pr($data);
		$temp['template'] = "Vdatatable";
		$this->load->view('layout/VContent', $temp);
	}
	public function ajaxGetSV(){
		
		$sinhvien = $this->Mmonctdt->getsv();
		echo json_encode($sinhvien);
		exit();
	}
	public function ajaxAddSV(){
		$data['masv'] = $this->input->post("masv");
		$data['tensv'] = $this->input->post("tensv");
		$res = $this->Mmonctdt->insertSV($data);
		echo json_encode($res);
		exit();
	}
	public function ajaxEditSV(){
		$ma = $this->input->post("old_ma");
		$data['masv'] = $this->input->post("masv");
		$data['tensv'] = $this->input->post("tensv");
		$res = $this->Mmonctdt->updateSV($ma, $data);
		echo json_encode($res);
		exit();
	}
	public function ajaxDeleteSV(){
		$ma = $this->input->post("masv");
		$res = $this->Mmonctdt->deleteSV($ma);
		echo json_encode($res);
		exit();
		
	}
}
?>