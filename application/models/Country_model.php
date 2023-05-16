<?php
class Country_model extends CI_model
{


    public function country()
    {
        $this->db->select('*');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result();
    }
}