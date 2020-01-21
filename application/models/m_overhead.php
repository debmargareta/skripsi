<?php

class m_overhead extends CI_Model{
    function tambah_overhead($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_overhead(){
        return $this->db->query("SELECT * from biaya_overhead inner join satuan on biaya_overhead.id_satuan = satuan.id_satuan where biaya_overhead.status = 1");
    }//view data
    function satuan(){
        return $this->db->query("SELECT * FROM satuan where status = 1 and golongan_satuan='Overhead' ");
    }//dropdown
    function edit_overhead($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_overhead($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_overhead($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>