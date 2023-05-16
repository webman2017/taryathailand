<?php
class Excel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function fetch_data($province,$start,$end)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
  
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_dealer()
    {
        $this->db->select('*');
        $this->db->from('dealer');
        $this->db->join('provinces', 'dealer.province = provinces.PROVINCE_ID', 'left');
        $this->db->join('amphures', 'dealer.amphur = amphures.AMPHUR_ID', 'left');
        $this->db->where('status',1);
//        $this->db->like('datetime', "2018-03");
//        $this->db->order_by("scan_at", "asc");
        $query = $this->db->get();
        return $query->result();
    }
}
