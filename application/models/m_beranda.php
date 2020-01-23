<?php

class m_beranda extends CI_Model{
    function tampil_admin(){
       $id_admin = $this->session->userdata('admin_username');
       $query = $this->db->query("SELECT * FROM admin WHERE username = '".$id_admin."'");
       return $query;
    }
    function transaksi_penjualan(){
        return $this->db->query("SELECT * from transaksi_penjualan inner join pesanan on pesanan.kode_pesanan = transaksi_penjualan.kode_pesanan inner join detail_pesanan on detail_pesanan.kode_pesanan = pesanan.kode_pesanan inner join kue on kue.id_kue = detail_pesanan.id_kue where pesanan.status_transaksi = 1");
    }
    function count_pesanan(){
    	return $this->db->query("SELECT COUNT(kode_pesanan) as pesanan FROM pesanan ");
    }
    function count_pelanggan(){
    	return $this->db->query("SELECT COUNT(nama_pelanggan) as pelanggan FROM pelanggan ");
    }
    function count_karyawan(){
    	return $this->db->query("SELECT COUNT(nama_karyawan) as karyawan FROM karyawan ");
    }
}
?>