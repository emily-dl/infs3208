<?php

class Update extends CI_Model{


    function new_email($n_email,$user_name){
        // $this->db->select('email');
        // $this->db->from('users');
        // $this->db->where('username',$user_name);
        // $query = $this->db->get();

        // if ($query->num_rows()>0){
        //     $data = array(
        //         'email' => $n_email
        //     );
        //     $this->db->where ('username',$user_name);
        //     $this->db->update ('users',$data);
        // }

        $query = "SELECT email FROM users WHERE username = '$user_name'";
       
        $res = $this->db->conn_id->query($query);
       
        if ($res && $res->num_rows>0){
            $data = array(
                'email' => $n_email
            );
            $this->db->where('username',$user_name);
             $this->db->update('users',$data);

             return true;
            
        } else {
            return false;
        }
        
    }
}