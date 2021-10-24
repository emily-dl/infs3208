<?php

class Video_upload extends CI_Model
{
    function insert($filename){
        $data = array(
            'filename' => $filename
        );
        $this->db->insert('upload_table',$data);
        return $this->db->insert_id();
    }

    function get_filename($filename=''){
        $search_where = "";
        if(!empty($filename)){
            $search_where = " WHERE filename LIKE '".$filename."%'";
        }

        $query = $this->db->query("SELECT * FROM upload_table".$search_where);
        $result = $query->result();
        return $result;
    }

    
}
