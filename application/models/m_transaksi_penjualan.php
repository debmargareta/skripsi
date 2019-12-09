<?php

class m_transaksi_penjualan extends CI_Model{
    function tambah_penjualan($data,$table){
        $this->db->insert($table,$data);
    }
    function pesanan(){
        return $this->db->query("SELECT * FROM pesanan WHERE status ='1' and status_transaksi='0'");
    }
    function tampil_penjualan(){
        return $this->db->query("SELECT transaksi_penjualan.id_transaksi_penjualan, transaksi_penjualan.kode_penjualan, transaksi_penjualan.id_pesanan, transaksi_penjualan.tanggal, transaksi_penjualan.total_harga, transaksi_penjualan.status_pembayaran, pesanan.id_pesanan, pesanan.id_pelanggan, pesanan.tanggal_pesanan, pesanan.tanggal_pengambilan, detail_pesanan.id_detail_pesanan, detail_pesanan.id_pesanan, detail_pesanan.id_kue, detail_pesanan.jumlah, detail_pesanan.harga, kue.nama_kue, kue.id_kue,pelanggan.nama_pelanggan, pelanggan.id_pelanggan, pesanan.status_transaksi FROM transaksi_penjualan INNER JOIN pesanan on transaksi_penjualan.id_pesanan = pesanan.id_pesanan INNER JOIN detail_pesanan on detail_pesanan.id_pesanan = pesanan.id_pesanan INNER JOIN kue on kue.id_kue = detail_pesanan.id_kue INNER JOIN pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pesanan.status_transaksi = 1");
    }
    function edit_pelanggan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_status_transaksi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_pelanggan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function get_id_pesanan($id){
        return $this->db->query("SELECT pesanan.id_pesanan, pesanan.id_pelanggan, pesanan.tanggal_pesanan, pesanan.tanggal_pengambilan, detail_pesanan.id_detail_pesanan, detail_pesanan.id_pesanan, detail_pesanan.id_kue, detail_pesanan.jumlah, detail_pesanan.harga, kue.nama_kue, kue.id_kue,pelanggan.nama_pelanggan, pelanggan.id_pelanggan FROM pesanan INNER JOIN detail_pesanan on detail_pesanan.id_pesanan = pesanan.id_pesanan INNER JOIN kue on kue.id_kue = detail_pesanan.id_kue INNER JOIN pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pesanan.kode_pesanan ='$id'");;
    }
    function totalharga($id){
        return $this->db->query("SELECT SUM(harga) as totalharga FROM detail_transaksi_pembelian where id_transaksi_pembelian = '$id'");
    }
    function batch_item(){
        return $this->db->query('SELECT * FROM batch WHERE batch_status = 1');
    }
}

?>