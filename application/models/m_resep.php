<?php

class m_resep extends CI_Model{
    function pilihkue(){
        return $this->db->query('select * from kue where status_resep=1');
    }
    function pilihbahan(){
        return $this->db->get('bahan');
    }
    function pilihsatuan(){
        return $this->db->query('select * from satuan where status=1');;
    }
    function tampil_resep(){
        $this->db->select('resep.id_resep, resep.id_kue, resep.id_bahan, resep.takaran, resep.id_satuan, bahan.id_bahan, bahan.nama_bahan, kue.id_kue, kue.nama_kue, kue.jenis_kue, satuan.id_satuan, satuan.nama_satuan')
        ->from('resep')
        ->join('kue','resep.id_kue = kue.id_kue','inner')
        ->join('bahan','resep.id_bahan = bahan.id_bahan','inner')
        ->join('satuan','resep.id_satuan = satuan.id_satuan','inner')
        ->where('resep.status=1');
        
        return $this->db->get();
    }
    function tambah_resep($data,$table){
        $this->db->insert($table,$data);
    }
    
    function edit_resep($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_resep($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_resep($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}
?>