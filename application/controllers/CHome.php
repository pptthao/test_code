<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CHome extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MHome');
	}
	public function index()
	{
		if ($_FILES) {
			$this->upload();
		}
		$data['anh'] = $this->MHome->get_anh();

		$data['user'] = getSession();
		$data['message'] = getMessages();
		$data['url'] = base_url();
		$temp['data'] = $data;
		// pr($data);
		$temp['template'] = "VHome";
		$this->load->view('layout/VContent', $temp);
	}
	public function upload()
	{
        $data   = [];
		$count  = count($_FILES['files']['name']);
		// pr($count);
		$result = 0;
		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['files']['name'][$i])) {

				$_FILES['file']['name']    = $_FILES['files']['name'][$i];
				$_FILES['file']['type']    = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name']= $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']   = $_FILES['files']['error'][$i];
				$_FILES['file']['size']    = $_FILES['files']['size'][$i];

				$config = array(
					'allowed_types' => 'jpg|gif|png',
					'max_size'      => '5000',
				);

				$duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
				$duoi = $duoi[(count($duoi) - 1)];
				$config['file_name'] = time().$i.'.'.$duoi;
				
				$duongdan = 'public/img/';
				if (move_uploaded_file($_FILES['file']['tmp_name'], $duongdan.$config['file_name'])) {

					$data['file_name'] = $config['file_name'];
					$anh = array(
						'PK_iMaAnh' => time().rand(999, 9999),
						'tLink'		=> $data['file_name']
					);
					$result = $this->MHome->save_upload($anh);
				}
			}
		}
		// pr($anh);
		echo json_encode($result);
		exit();
	}
}
?>