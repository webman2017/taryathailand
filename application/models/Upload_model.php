<?php

class Upload_model extends CI_Model
{
    function save_upload($code, $dealer_code, $advisor, $password, $id_card, $name, $lastname,$avatar, $country, $province, $amphur, $taboon, $zipcode, $mobile, $line, $facebook,$link_facebook, $instagram,$gender)
    {
        $data = array(
            'code' => $code,
            'dealer_code' => $dealer_code,
            'advisor' => $advisor,
            'username' => $dealer_code,
            'password' => $password,
            'id_card' => $id_card,
            'name' => $name,
            'lastname' => $lastname,
            'avatar' => $avatar,
            'country' => $country,
            'province' => $province,
            'amphur' => $amphur,
            'taboon' => $taboon,
            'zipcode' => $zipcode,
            'mobile' => $mobile,
            'line' => $line,
            'facebook' => $facebook,
            'link_facebook' => $link_facebook,
            'instagram' => $instagram,
            'gender' => $gender,
        );
        $result = $this->db->insert('mb_dealer', $data);
        return $result;
    }
}