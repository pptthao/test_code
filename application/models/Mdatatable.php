<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdatatable extends MY_Model {
	public function getsv(){
        $this->db->select("id, masv, tensv");
        return $this->db->get("tbl_sinhvien")->result_array();
    }
    public function getslsv(){
        return $this->db->get("tbl_sinhvien")->result_array();
    }
    public function insertSV($data){
        $this->db->insert("tbl_sinhvien", $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function updateSV($ma, $data){
        
        $this->db->where("id", $ma);
        $this->db->update("tbl_sinhvien", $data);
        return $this->db->affected_rows();
    }
    public function deleteSV($ma){
        
        $this->db->where("id", $ma);
        $this->db->delete("tbl_sinhvien");

        return $this->db->affected_rows();
    }
}