<?php
class GetLatLong extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    function get()
    {

        $query="SELECT latitude,longitude,status FROM qr_code where status='1'";
//        $query = $this->db->get();
        $dealer = $this->db->query($query);

        return $dealer;



//        $query = $this->db->get('qr_code');
//        return $query;
    }
}
?>