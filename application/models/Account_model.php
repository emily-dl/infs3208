<?php

class Account_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //hash password
    public function password($username,$password){
        if(!empty($username) && !empty($password)){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username',$username);
            $result = $this->db->get();
    
            if($result->result_id->num_rows > 0){

                $row= $result->row();
                
                $c_password = password_verify (  $password ,  $row->password ) ;
                return $c_password;
            } else {
                return false;
            }


        }
    }

    public function uname_check($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);

        $result = $this->db->get();

        if($result->result_id->num_rows > 0){

            return true;
        } else {
            return false;
        }

    }

    // public function get_id_by_email($email){
    //     $this->db->select('id');
    //     $this->db->from('users');
    //     $this->db->where('email',$email);
    //     $result = $this->db->get();
    //     $row= $result->row();

    //     return $row->id;

    // }

    public function token($email,$token){

        $data = array(
            'forget_password' => $token
        );

        $this->db->where('email',$email);
        $this->db->update('users',$data);

    }

    public function get_id($token){
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('forget_password',$token);
        $result = $this->db->get();
        $row= $result->row();
        return $row->id;
    }


    public function password_update($data){
        $new = array(
            'password' => $data['password']
        );
        $this->db->where('id',$data['id']);
        $var = $this->db->update('users',$new);
        
        if($var){
            //update successfully
            return true;
        } else {
            // fail to update 
            return false;
        }
    }

    //display user's email on profile
    public function email_display($uname){
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('username',$uname);
        $result = $this->db->get();
        $row= $result->row();

        return $row->email;
    }
}
?>