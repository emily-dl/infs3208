<?php

class Search extends CI_Controller {

public function __construct(){
  parent ::__construct();
  $this->load->model('video_upload');
}
  
public function search_name(){
    $search_valiue = $this->input->post('search');
    $result_filename = $this->video_upload->get_filename($search_valiue);

    $data = array('videos' => $result_filename );

    $this->load->view('head');
    $this->load->view('search_result',$data);
}


}