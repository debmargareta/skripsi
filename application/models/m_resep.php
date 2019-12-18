<?php

class m_resep extends CI_Model{
    function pilihkue(){
        return $this->db->query('select * from kue where status_resep=0');
    }
    function pilihbahan(){
        return $this->db->get('bahan');
    }
    function tampil_resep(){
        $this->db->select('resep.id_resep, resep.id_kue, resep.id_bahan, resep.takaran, resep.satuan, bahan.id_bahan, bahan.nama_bahan, kue.id_kue, kue.nama_kue, kue.jenis_kue')
        ->from('resep')
        ->join('kue','resep.id_kue = kue.id_kue','inner')
        ->join('bahan','resep.id_bahan = bahan.id_bahan','inner')
        ->where('resep.status=1');
        
        return $this->db->get();
    }
    function tambah_resep($data,$table){
        $this->db->insert($table,$data);
    }
    
    function edit_kasbon($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_kasbon($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_resep($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}
?>