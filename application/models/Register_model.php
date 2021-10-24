<?php

class Register_model extends CI_Model{

    function insert($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    function email_verify($verification_key){
        // $this->db->where('verification_key', $verification_key);
        // $this->db->where('is_email_verified', 'no');
        // $query = $this->db->get('users');
        $query = "SELECT * FROM users WHERE verification_key = $verification_key AND is_email_verified = 'no'";
        $res = $this->db->conn_id->query($query);
       
        if ($res->num_rows>0){
            $data = array(
                'is_email_verified' => 'yes'
            );
            $this->db->where('verification_key',$verification_key);
            $this->db->update('users',$data);
            return true;
            
        } else {
            return false;
        }
        
    }

}
