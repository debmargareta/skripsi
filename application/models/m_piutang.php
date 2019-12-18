<?php

class m_piutang extends CI_Model{
    function tambah_piutang($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    function piutang(){
        return $this->db->query("SELECT * FROM transaksi_penjualan WHERE status_pembayaran ='Hutang'");
    }
    function tampil_pembayaran(){
        return $this->db->query("SELECT pembayaran_hutang.id_pembayaran_hutang, pembayaran_hutang.id_transaksi_pembelian, pembayaran_hutang.nominal_bayar, pembayaran_hutang.tanggal_pembayaran, pembayaran_hutang.status, transaksi_pembelian.id_transaksi_pembelian FROM pembayaran_hutang INNER JOIN transaksi_pembelian on pembayaran_hutang.id_transaksi_pembelian = transaksi_pembelian.id_transaksi_pembelian");
    }
    function edit_pelanggan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_piutang($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_pelanggan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function getpiutang(){
        return $this->db->query("select * from transaksi_penjualan");
    }
    function get_id_transaksi($id){
        return $this->db->query("SELECT transaksi_penjualan.id_transaksi_penjualan, transaksi_penjualan.kode_penjualan, transaksi_penjualan.id_pesanan, transaksi_penjualan.tanggal, transaksi_penjualan.total_harga, transaksi_penjualan.status_pembayaran, pesanan.id_pesanan, pesanan.kode_pesanan, pesanan.id_pelanggan, pesanan.status_transaksi, detail_pesanan.id_detail_pesanan, detail_pesanan.id_pesanan, detail_pesanan.id_kue, detail_pesanan.jumlah, detail_pesanan.harga, kue.id_kue, kue.nama_kue, kue.jenis_kue, pelanggan.id_pelanggan, pelanggan.nama_pelanggan FROM transaksi_penjualan INNER JOIN pesanan on transaksi_penjualan.id_pesanan = pesanan.id_pesanan INNER JOIN detail_pesanan ON pesanan.id_pesanan = detail_pesanan.id_pesanan INNER JOIN kue ON detail_pesanan.id_kue = kue.id_kue INNER JOIN pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi_penjualan.id_transaksi_penjualan ='$id'");;
    }
    function totalharga($id){
        return $this->db->query("SELECT SUM(harga) as totalharga FROM detail_transaksi_pembelian where id_transaksi_pembelian = '$id'");
    }
}

?>