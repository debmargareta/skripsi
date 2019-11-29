<?php

class m_pembayaran_hutang extends CI_Model{
    function tambah_pelanggan($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_pelanggan(){
        return $this->db->query("SELECT * FROM pelanggan WHERE status ='1'");
    }
     function edit_pelanggan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_pelanggan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_pelanggan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>