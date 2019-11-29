<?php

class m_resep extends CI_Model{
    function pilihkue(){
        return $this->db->get('kue');
    }
    function pilihbahan(){
        return $this->db->get('bahan');
    }
    function tampil_resep(){
        $this->db->select('resep')
        ->from('kasbon')
        ->join('karyawan','karyawan.id_karyawan = kasbon.id_karyawan','inner')
        ->where('kasbon.status = 1');
        
        return $this->db->get();
    }
    
    function edit_kasbon($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_kasbon($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_kasbon($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}
?>