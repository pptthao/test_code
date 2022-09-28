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

		if($this->input->post('action') == "addmon"){
			$this->addmon();
		}
		if($this->input->post('action') == "luuctdt"){
			$this->luuctdt();
		}
		
		//lấy danh sác môn học
		//mặc định lấy ds theo 
		if($mactdt = $this->input->get('ma_ctdt')){
			//lấy ds môn học (trái) phải trừ đi các môn học đã đc lấy bên phải (not in ctdt)
			//lấy ds các môn học phải trừ đi
			$mon = $this->Mmonctdt->getMonLoaiTru($mactdt);
			$data['monhoc'] = $this->Mmonctdt->getMon($mon);

			$data['monctdt'] = $this->Mmonctdt->getMonctdt($mactdt);
		}else{
			$data['monhoc'] = $this->Mmonctdt->dmmonhoc($mactdt);
		}
		// pr($mactdt);
		$data['ctdt'] = $this->Mmonctdt->getctdt_ma($mactdt);

		// pr($data['ctdt']);
		$temp['data'] = $data;
		// pr($data);
		$temp['template'] = "Vmonctdt";
		$this->load->view('layout/VContent', $temp);
	}
	public function addmon()
 	{
		$name = $this->input->post('tenmon');
		$data = array(
			'mamon' => preg_replace("/[^a-zA-Z0-9]+/", "", $name).rand(10,99),
			'tenmon' => $this->input->post('tenmon'),
			'khoiluong' => $this->input->post('khoiluong'),
			'donvitinh' => $this->input->post('donvitinh'),
			'cbthem' => 1
		);
		$check = $this->Mmonctdt->check($data['mamon']);
		$mon = $this->Mmonctdt->check_name_mon($data['tenmon'],$data['khoiluong'],$data['donvitinh']);
		
		if(empty($mon) && empty($check)){
			$row = $this->Mmonctdt->insert_dm_mh($data);
			if ($row > 0){
				echo json_encode($data);
			}else{
				echo 'loi 1';
			}
		}else {
			echo 'loi 2';
		}
		exit();
	}
	public function luuctdt(){
		// $maCanbo = $this->Mmonctdt->getIdcanbo($this->_session['userName']);
		$maCanbo = 1;
		$matruong = $this->input->post('matruong');
		$matrinhdo = $this->input->post('matrinhdo');
		$namhoc = $this->input->post('namhoc');
		$manganh = $this->input->post('manganh');
		$mon = $this->input->post('mamon');
		
		$arrayMon = explode(',', $mon);  // mảng những môn sau khi xếp
		$arrayCtdt = array( 
				'ma_ctdt' => $matruong.'_'.$matrinhdo.'_'.$manganh.'_'.$namhoc,
				'matrinhdo' => $matrinhdo,
				'manganh' => $manganh,
				'matruong' => $matruong, 
				'namhoc' => $namhoc,
		);
// pr($arrayCtdt);
		//kiểm tra và lấy mã ctdt
		$getCtdt = $this->Mmonctdt->getCtdt($arrayCtdt);
		// pr($getCtdt);
	    // lấy ra ctdt
	    if($matruong == $getCtdt['matruong'] && $manganh == $getCtdt['manganh'] && $matrinhdo == $getCtdt['matrinhdo'] && $namhoc == $getCtdt['namhoc']){
	    	$kt = $arrayCtdt['ma_ctdt'];
			// pr(1);
	    }else{
			// pr(2);
	    	$res = $this->Mmonctdt->themCtdt($arrayCtdt);
			if($res > 0) $kt = $arrayCtdt['ma_ctdt'];
	    }
		//thêm môn ctdt với điều kiện : ctdt và môn đã lấy
		for($i=0;$i<count($arrayMon)-1;$i++){ 
			//check cac mon đã xếp -> điều kiện: ma_monctdt
			$checkmon = $this->Mmonctdt->checkMonDaXep($arrayCtdt['ma_ctdt'].'_'.$arrayMon[$i]);
			if($checkmon < 1){
				$monctdt[] = array(
					'ma_monctdt' => $arrayCtdt['ma_ctdt'].'_'.$arrayMon[$i],
					'mamon' => $arrayMon[$i], 
					'ma_ctdt' => $arrayCtdt['ma_ctdt'], 
					'macanbo' => $maCanbo, 
				); 
			}
		}
		if($checkmon > 0){
			echo ('loi');
			exit();
		}
		$row = $this->Mmonctdt->themmonctdt($monctdt);
		echo json_encode($row);
		exit();
	}
}
