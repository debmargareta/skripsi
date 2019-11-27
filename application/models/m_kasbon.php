<?php

class m_kasbon extends CI_Model{
    function tambah_kasbon($data,$table){
        $this->db->insert($table,$data);
    }
    function pilihkaryawan(){
        return $this->db->get('karyawan');
    }
    function tampil_kasbon(){
        $this->db->select('kasbon.id_kasbon,kasbon.id_karyawan,karyawan.id_karyawan,karyawan.nama_karyawan,kasbon.jumlah_kasbon,kasbon.tanggal_kasbon, kasbon.status')->from('kasbon')->join('karyawan','karyawan.id_karyawan = kasbon.id_karyawan','inner')->where('kasbon.status = 1');
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