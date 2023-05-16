<?php
class Admin_model extends CI_model{



    public function register_user($user){


        $this->db->insert('admin', $user);

    }

    public function login_user($email,$pass){

        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('user_name',$email);
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
        $this->db->from('admin');
        $this->db->where('user_email',$email);
        $query=$this->db->get();

        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }

    }


}


?>