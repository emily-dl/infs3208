<?php

class Comments Extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();

    }

  
    public function comments(){
        $this->load->view('head');
        $this->load->view('comments');
        
        $topic = $this->input->post('topic');
        $description = $this->input->post('description');

        if ($topic!= NULL && $description != NULL){
            $data = array(
                'topic' => $topic,
                'description' => $description
            );

            $this->db->insert('Comments',$data);
            $this->load->view('comments_success');
        }
        else{
            $this->load->view('comments_fail');
        }
        }
    }
