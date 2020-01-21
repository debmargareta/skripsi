<?php

class m_pembayaran_gaji extends CI_Model{
    function pilihkaryawan(){
        return $this->db->query("select * from karyawan where status_gaji = 0");
    }
    function get_tabel_karyawan($where){
        return $this->db->query("select * from karyawan where id_karyawan = '".$where."'");
    }
     function tambah_pembayaran_gaji($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_pembayaran_gaji(){
        return $this->db->query("select * from pembayaran_gaji inner join karyawan on pembayaran_gaji.id_karyawan = karyawan.id_karyawan where pembayaran_gaji.status = 1");
    }//tampil view_gaji
    function tabel_gaji($where){
        return $this->db->query("select * from pembayaran_gaji inner join karyawan on pembayaran_gaji.id_karyawan = karyawan.id_karyawan where pembayaran_gaji.status = 1 and id_pembayaran_gaji = '".$where."'");
    }//ut view tabel gaji

}
?>