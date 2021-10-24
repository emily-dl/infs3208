<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  public function __construct(){
    parent ::__construct();
   
    $this->load->model('video_upload');
}

  public function index(){

        $this->load->view('head');

    if($this->input->post('upload') != NULL ){
 
      $data = array();

      // Count total files
      $countfiles = count($_FILES['files']['name']);
 
      // Looping all files
      for($i=0;$i<$countfiles;$i++){
 
        if(!empty($_FILES['files']['name'][$i])){
 
          $_FILES['files[]']['name'] = $_FILES['files']['name'][$i];
          $_FILES['files[]']['type'] = $_FILES['files']['type'][$i];
          $_FILES['files[]']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['files[]']['error'] = $_FILES['files']['error'][$i];
          $_FILES['files[]']['size'] = $_FILES['files']['size'][$i];

          $config['upload_path'] = './uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov';
          $config['max_size'] = '500000'; 
          $config['file_name'] = $_FILES['files']['name'][$i];

          $this->load->library('upload',$config); 
          
          $this->upload->initialize($config);

          // File upload
          if($this->upload->do_upload('files[]')){
            // Get data about the file
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $data['filenames'][] = $filename;

            $this->video_upload->insert($filename);
          }
        }
 
      }

      $this->load->view('upload_form',$data);
    }else{

   
      $this->load->view('upload_form');
    } 
 
  }

}