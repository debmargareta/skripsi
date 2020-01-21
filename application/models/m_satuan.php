<?php

class m_satuan extends CI_Model{
    function tambah_satuan($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_satuan(){
        return $this->db->query("SELECT * from satuan where status=1");
    }
    function edit_satuan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_satuan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_satuan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>