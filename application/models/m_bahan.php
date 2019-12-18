<?php

class m_bahan extends CI_Model{
    function tambah_bahan($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    function tampil_bahan(){
        $this->db->select('bahan.id_bahan, bahan.nama_bahan, bahan.satuan_bahan, bahan.status, stok_bahan.id_stok, stok_bahan.id_bahan, stok_bahan.stok, stok_bahan.satuan')
        ->from('bahan')
        ->join('stok_bahan','stok_bahan.id_bahan = bahan.id_bahan','inner');
        $query = $this->db->get();
        return $query;
    }
    function tampil_bahan1(){
        return $this->db->query("SELECT * from bahan where status=1");
    }
    function edit_bahan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_bahan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_bahan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>