<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmonctdt extends MY_Model {
	public function getsv(){
        $this->db->select("masv, tensv")
                ->limit(10);
        return $this->db->get("tbl_sinhvien")->result_array();
    }
    public function getslsv(){
        return $this->db->get("tbl_sinhvien")->result_array();
    }
    public function insertSV($data){
        $this->db->insert("tbl_sinhvien", $data);
        return $this->db->affected_rows();
    }
    public function updateSV($ma, $data){
        
        $this->db->where("masv", $ma);
        $this->db->delete("tbl_sinhvien");

        $this->db->insert("tbl_sinhvien", $data);
        return $this->db->affected_rows();
    }
    public function deleteSV($ma){
        
        $this->db->where("masv", $ma);
        $this->db->delete("tbl_sinhvien");

        return $this->db->affected_rows();
    }
}