<?php

class m_supplier extends CI_Model{
    function tambah_supplier($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_supplier(){
        return $this->db->query("SELECT * FROM supplier WHERE status ='1'");
    }
    function edit_supplier($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_supplier($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_supplier($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>