<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmonctdt extends MY_Model
{
	public function dmmonhoc(){
		$this->db->order_by('tenmon');
		return $this->db->get('dm_monhoc')->result_array();
	}
    public function getMon($ma_mon)
    {
        $this->db->select("*");
        $this->db->join('dm_monhoc as mon', 'mon.mamon = monctdt.mamon','right');
		// $this->db->where('monctdt.ma_ctdt',NULL);
		$this->db->where_not_in('mon.mamon', $ma_mon);
		$this->db->group_by('mon.mamon');
        return $this->db->get("tbl_monctdt as monctdt")->result_array();
    }
    public function getMonLoaiTru($ma_ctdt){
        $this->db->select("mon.mamon");
        $this->db->join('dm_monhoc as mon', 'mon.mamon = monctdt.mamon');
		$this->db->where('monctdt.ma_ctdt',$ma_ctdt);
        $res = $this->db->get("tbl_monctdt as monctdt")->result_array();
        
        foreach($res as $k => $v){
            $res[$k] = $v['mamon'];
        }
        return $res;

    }
    public function getctdt_ma($ma_ctdt){
        $this->db->select("*");
		$this->db->where('ctdt.ma_ctdt',$ma_ctdt);
        return $this->db->get("tbl_ctdt as ctdt")->result_array();

    }
    public function getMonctdt($ma_ctdt)
    {
        $this->db->select("*");
        $this->db->join('dm_monhoc as mon', 'mon.mamon = monctdt.mamon');
		$this->db->where('monctdt.ma_ctdt',$ma_ctdt);
        return $this->db->get("tbl_monctdt as monctdt")->result_array();
    }
    public function check($mamon)
    {
        $this->db->where('mamon', $mamon);
        $this->db->from('dm_monhoc');
        return $this->db->get()->row_array();
    }
    public function check_name_mon($ten, $kl, $donvitinh)
    {
        $this->db->where('tenmon', trim($ten));
        $this->db->where('khoiluong', trim($kl));
        $this->db->where('donvitinh', trim($donvitinh));
        $this->db->from('dm_monhoc');
        return $this->db->get()->row_array();
    }
    
    function insert_dm_mh($data){
        $this->db->insert('dm_monhoc', $data);
        return $this->db->affected_rows();
    }
    public function getCtdt($array){
		$this->db->where('manganh',$array['manganh']);
		$this->db->where('matruong',$array['matruong']);
		$this->db->where('matrinhdo',$array['matrinhdo']);
		$this->db->where('namhoc',$array['namhoc']);
		return $this->db->get('tbl_ctdt')->row_array();
	}
	public function themCtdt($array){
		$this->db->insert('tbl_ctdt',$array);
		return $this->db->affected_rows();
	}
    
	public function themmonctdt($array){
		$this->db->insert_batch('tbl_monctdt',$array);
		return $this->db->affected_rows();
	}
    
}
