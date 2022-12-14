<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cdatatable extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdatatable');
	}
	public function index()
	{

		$data['user'] = getSession();
		$data['message'] = getMessages();
		$data['url'] = base_url();
		
		if($this->input->post('action') == "addsv"){
			$this->ajaxAddSV();
		}
		
		if($this->input->post('action') == "editsv"){
			$this->ajaxEditSV();
		}
		
		if($this->input->post('action') == "deletesv"){
			$this->ajaxDeleteSV();
		}
		$data['sinhvien'] = $this->Mdatatable->getsv();
        $this->parser->parse('Vdatatable', $data);
    }
	
	public function ajaxAddSV(){
		$data['masv'] = $this->input->post("masv");
		$data['tensv'] = $this->input->post("tensv");
		$res = $this->Mdatatable->insertSV($data);
		echo json_encode($res);
		exit();
	}
	public function ajaxEditSV(){
		$data['id'] = $this->input->post("id");
		$data['masv'] = $this->input->post("masv");
		$data['tensv'] = $this->input->post("tensv");
		$res = $this->Mdatatable->updateSV($data['id'], $data);
		echo json_encode($res);
		exit();
	}
	public function ajaxDeleteSV(){
		$ma = $this->input->post("id");
		$res = $this->Mdatatable->deleteSV($ma);
		echo json_encode($res);
		exit();
		
	}
}
?>
