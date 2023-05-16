<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feora_home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
    }
    private function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public function Maxcode()
    {
        $query = "select max(code) from dealer";
        $code = $this->db->query($query)->result_array();
        return $code;
    }
    public function Max_dealercode()
    {
        $query = "select max(code) from dealer";
        $dealer_code = $this->db->query($query)->result_array();
        return $dealer_code;
    }
    public function getAllprovince()
    {
        $query = "select * from provinces";
        $province = $this->db->query($query)->result_array();
        return $province;
    }
    public function insert($data)
    {
        if ($this->db->insert("dealer", $data)) {
            return true;
        }
    }
}
