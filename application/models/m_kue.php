<?php

class m_kue extends CI_Model{
    function tambah_kue($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_kue(){
        return $this->db->query("SELECT * FROM kue WHERE status ='1'");
    }
     function edit_kue($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_kue($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_kue($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>