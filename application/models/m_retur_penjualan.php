<?php

class m_retur_penjualan extends CI_Model{
    function tambah_retur($data,$table){
        $this->db->insert($table,$data);
    }
    function tr_penjualan(){
        return $this->db->query("SELECT * FROM transaksi_penjualan");
    }
    function tampil_retur(){
        return $this->db->query('select * FROM retur_penjualan');
    }
    function edit_pelanggan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_retur($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_retur($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function getstokkue($where){
        return $this->db->query("select * from kue where id_kue = '".$where."'");
    }
    function getpesanan($where){
        return $this->db->query("select * from detail_pesanan where kode_pesanan = '".$where."'");
    }
     function get_kode(){
        return $this->db->query("SELECT * FROM detail_retur_penjualan INNER JOIN retur_penjualan on retur_penjualan.kode_retur = detail_retur_penjualan.kode_retur INNER join transaksi_penjualan on transaksi_penjualan.kode_penjualan = retur_penjualan.kode_penjualan INNER JOIN pesanan on transaksi_penjualan.kode_pesanan = pesanan.kode_pesanan INNER JOIN pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan INNER JOIN kue on detail_retur_penjualan.id_kue = kue.id_kue");
    }
    function get_id_transaksi($id){
        return $this->db->query("SELECT transaksi_penjualan.kode_penjualan, transaksi_penjualan.kode_pesanan, transaksi_penjualan.tanggal, transaksi_penjualan.total_harga, transaksi_penjualan.status_pembayaran,pesanan.kode_pesanan, pesanan.id_pelanggan, pesanan.status_transaksi, detail_pesanan.id_detail_pesanan, detail_pesanan.kode_pesanan, detail_pesanan.id_kue, detail_pesanan.jumlah, detail_pesanan.satuan,detail_pesanan.harga, kue.id_kue, kue.nama_kue, kue.jenis_kue, pelanggan.id_pelanggan, pelanggan.nama_pelanggan FROM transaksi_penjualan INNER JOIN pesanan on transaksi_penjualan.kode_pesanan = pesanan.kode_pesanan INNER JOIN detail_pesanan ON pesanan.kode_pesanan = detail_pesanan.kode_pesanan INNER JOIN kue ON detail_pesanan.id_kue = kue.id_kue INNER JOIN pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi_penjualan.kode_penjualan ='".$id."'");;
    }
    function totalharga($id){
        return $this->db->query("SELECT SUM(harga) as totalharga FROM detail_transaksi_pembelian where kode_pembelian = '$id'");
    }
    function get_detail($id){
        return $this->db->query("SELECT * FROM retur_penjualan INNER JOIN detail_retur_penjualan on retur_penjualan.kode_retur = detail_retur_penjualan.kode_retur INNER JOIN kue on kue.id_kue = detail_retur_penjualan.id_kue where detail_retur_penjualan.kode_retur='$id'");
    }
}

?>