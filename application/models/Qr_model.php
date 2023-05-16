<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_model extends CI_model
{

    var $table = 'qr_code';

//	var $column_order = array('firstname','lastname','gender','address','dob',null); //set column field database for datatable orderable
    var $column_search = array('name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'desc'); // default order
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function form_insert($data)
    {

        $this->db->insert('qr_code', $data);
    }

    public function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function get_country()
    {
        $query = $this->db->get('country');
        return $query->result();
    }


    public function Maxtop()
    {
        $query = "select max(code_top) from qr_code";
        $top = $this->db->query($query)->result_array();
        return $top;
    }


    public function Maxcode()
    {
        $query = "select max(code) from qr_code";
        $code = $this->db->query($query)->result_array();
        return $code;
    }

    public function record_count($keyword)
    {
        $this->db->like('code_generate', $keyword);
        $this->db->from('qr_code');
        return $this->db->count_all_results();
    }

    public function fetch_document($limit, $start, $keryword)
    {

        $this->db->select('*');
        $this->db->from('qr_code');
        $this->db->like('code_generate', $keryword);
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function get_dealer_query()
    {
        $query = $this->db->get('qr_code');
        return $query->result();
    }

    public function getDealerById($id){
        $query = "SELECT * FROM qr_code where code_generate='$id'";
        $dealer = $this->db->query($query)->result_array();

        return $dealer;
    }


    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function qr_check($id)
    {

//        $this->db->select('*');
//        $this->db->from('qr_code');
//        $this->db->where('id', $id);
//        $this->db->where('status', '1');

        $query="SELECT * FROM qr_code where status='1' and code_generate='$id'";
//        $query = $this->db->get();
        $dealer = $this->db->query($query)->result_array();

        return $dealer;

//        if($query->num_rows()>0){
//            return false;
//        }else{
//            return true;
//        }
//
//    }
    }





    public function get_all_user()
    {
        $this->db->from('dealer');
        $this->db->join('provinces','dealer.province=provinces.PROVINCE_ID','left');
        $this->db->join('amphures','dealer.amphur=amphures.AMPHUR_ID','left');
        $this->db->join('districts','dealer.taboon=districts.DISTRICT_CODE','left');
        $query=$this->db->get();
        return $query->result();
    }


//    public function get_by_id($id)
//    {
//        $this->db->from($this->table);
//        $this->db->where('user_id',$id);
//        $query = $this->db->get();
//
//        return $query->row();
//    }

    public function book_add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function book_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }



    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->join('amphures','qr_code.amphur=amphures.AMPHUR_ID','left');
        $this->db->join('provinces','qr_code.province=provinces.PROVINCE_ID','left');
        $this->db->where('status',1);

//        $this->db->join('districts','dealer.taboon=districts.DISTRICT_CODE','left');
        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

//    public function update($where, $data)
//    {
//        $this->db->update($this->table, $data, $where);
//        return $this->db->affected_rows();
//    }

//    public function delete_by_id($id)
//    {
//        $this->db->where('serial', $id);
//        $this->db->delete($this->table);
//    }

    public function get_product()
    {
        $this->db->from('products');
        $query=$this->db->get();
        return $query->result();
    }















}

