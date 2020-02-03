<?php

class m_resep extends CI_Model{
    function pilihkue(){
        return $this->db->query('select * from kue where status_resep=0');
    }//dropdown nama kue di v_tambah_resep
    function pilihbahan(){
        return $this->db->query('select * from bahan where status=1 and golongan_biaya = "Biaya Bahan Baku"');;
    }//dropdown nama bahan di v_tambah_resep
    function pilihsatuan(){
        return $this->db->query('select * from satuan where status=1 and golongan_satuan = "Bahan Baku"');;
    }//dropdown nama satuan di v_tambah_resep
    function pilihkueedit(){
        return $this->db->query('select * from kue where status_resep=1 ');
    }//dropdown nama kue yg ud ada resepnya di edit resep
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
    function distincnama(){
        return $this->db->query("SELECT DISTINCT kue.nama_kue, kue.id_kue, kue.jenis_kue FROM resep INNER JOIN kue on kue.id_kue = resep.id_kue where resep.status = 1");
    }

}
?>