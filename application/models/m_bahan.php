<?php

class m_bahan extends CI_Model{
    function tambah_bahan($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    function tampil_bahan(){
        $this->db->select('bahan.id_bahan, bahan.nama_bahan, bahan.golongan_biaya, bahan.stok, bahan.id_satuan, bahan.status, satuan.id_satuan, satuan.nama_satuan')
        ->from('bahan')
        ->join('satuan','satuan.id_satuan = bahan.id_satuan','inner')
        ->where('bahan.status=1');
        $query = $this->db->get();
        return $query;
    }//view data
    function edit_satuan(){
        return $this->db->query("SELECT * FROM satuan where status = 1 ");

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