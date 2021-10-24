<?php

class User Extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();
        if (!isset($_SESSION['user_logged']))

           { $this->session->set_flashdata("error","Please login first");
            redirect(base_url('account/login'));
           }
      
        $this->load->model('update');
        $this->load->model('account_model');
    
    }


    public function profile()
    {
        
        $uname = $_SESSION['username'];
        $user_email = $this->account_model->email_display($uname);
        $data['user_email'] = $user_email;
        $this->load->view('head');
        $this->load->view('profile',$data);
    }


    public function update()
    {   
        $this->load->view('head');
        $this->load->view('update');
        $user_name = $_SESSION['username'];
        
        $n_email = $this->input->post('n_email');
        $new_email = $this->update->new_email($n_email,$user_name);
        
    }

    public function e_update(){
        $user_name = $_SESSION['username'];
        $email = $this->input->post('email');
        if(!empty($email)){
            $new_email = $this->update->new_email($email,$user_name);
            if ($new_email == true){
                echo json_encode('Email update success');
            }
            else{
                echo json_encode('Database failure');
            }
        }
        else{
            echo json_encode('Empty email');
        }
    }

    // public function comments(){
    //     $this->load->view('head');
    //     $this->load->view('comments');
        
    //     $topic = $this->input->post('topic');
    //     $description = $this->input->post('description');

    //     if ($topic!= NULL && $description != NULL){
    //         $data = array(
    //             'topic' => $topic,
    //             'description' => $description
    //         );

    //         $this->db->insert('Comments',$data);
    //         $this->load->view('comments_success');
    //     }
    //     else{
    //         $this->load->view('comments_fail');
    //     }
    //     $this->load->view('all_comments');
    //     }
     }
