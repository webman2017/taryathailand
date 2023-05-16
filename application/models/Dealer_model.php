<?php
class Dealer_model extends CI_model{

    var $table = 'products';
//	var $column_order = array('firstname','lastname','gender','address','dob',null); //set column field database for datatable orderable
    var $column_search = array('name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('serial' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register_user($user){


        $this->db->insert('dealer', $user);

    }

    public function login_user($email,$pass){

        $this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('user_email',$email);
        $this->db->where('user_password',$pass);

        if($query=$this->db->get())
        {
            return $query->row_array();
        }
        else{
            return false;
        }


    }
    public function email_check($email){

        $this->db->select('*');
        $this->db->from('dealer');
        $this->db->where('username',$email);
        $query=$this->db->get();

        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }

    }


    public function province()
    {
        $this->db->select('*');
        $this->db->from('provinces');
        $query=$this->db->get();
        return $query->result();
    }

    public function get_dealer($PROVINCE_ID)
    {

        $query = $this->db->get_where('dealer', array('province' => $PROVINCE_ID));
//        $this->db->order_by('name=','desc');
        return $query->result();
    }

    public function get_dealer_am($PROVINCE_ID,$AMPHURE_ID)
    {

        $query = $this->db->get_where('dealer', array('province' => $PROVINCE_ID,'amphur'=>$AMPHURE_ID));
//        $this->db->order_by('name=','desc');
        return $query->result();
    }


    public function get_province_query($PROVINCE_ID)
    {
        $query = $this->db->get_where('amphures', array('PROVINCE_ID' => $PROVINCE_ID));
        $this->db->order_by('province=','desc');
        return $query->result();
    }

    public function get_taboon_query($AMPHUR_ID)
    {
        $query = $this->db->get_where('districts', array('AMPHUR_ID' => $AMPHUR_ID));
        return $query->result();
    }





    private function _get_datatables_query()
    {

        $this->db->from($this->table);

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
        $this->db->where('serial',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('serial', $id);
        $this->db->delete($this->table);
    }

    public function get_product()
    {
        $this->db->from('products');
        $query=$this->db->get();
        return $query->result();
    }

    public function Get_advisor($keyword)

    {

        $this->db->select('*');

        $this->db->from('dealer');

        $this->db->where("dealer_code", $keyword);

        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();

        return $query->result();



    }






}


?>