<?php

class m_transaksi_penjualan extends CI_Model{
    function tambah_penjualan($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    function pesanan(){
        return $this->db->query("SELECT * FROM pesanan WHERE status ='1' and status_transaksi='0'");
    }
    function tampil_penjualan(){
        return $this->db->query("SELECT * from transaksi_penjualan");
    }
    function detail_penjualan(){
        return $this->db->query("SELECT * FROM transaksi_penjualan INNER JOIN pesanan on transaksi_penjualan.kode_pesanan = pesanan.kode_pesanan INNER JOIN detail_pesanan on detail_pesanan.kode_pesanan = pesanan.kode_pesanan INNER JOIN kue on kue.id_kue = detail_pesanan.id_kue INNER JOIN pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pesanan.status_transaksi = 1");
    }
    function edit_transaksi($where,$table){
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
        return $this->db->query("SELECT pesanan.kode_pesanan, pesanan.id_pelanggan, pesanan.tanggal_pesanan, pesanan.tanggal_pengambilan, detail_pesanan.id_detail_pesanan, detail_pesanan.kode_pesanan, detail_pesanan.id_kue, detail_pesanan.jumlah, detail_pesanan.satuan, kue.nama_kue, kue.id_kue,pelanggan.nama_pelanggan, pelanggan.id_pelanggan FROM pesanan INNER JOIN detail_pesanan on detail_pesanan.kode_pesanan = pesanan.kode_pesanan INNER JOIN kue on kue.id_kue = detail_pesanan.id_kue INNER JOIN pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pesanan.kode_pesanan ='$id'");;
    }
    function totalharga($id){
        return $this->db->query("SELECT SUM(harga) as totalharga FROM detail_transaksi_pembelian where id_transaksi_pembelian = '$id'");
    }
    function max_hpp(){
        return $this->db->query("select max(harga_pokok_produksi) as max_hpp FROM harga_pokok_produksi");
    }
    function getstok($where){
        return $this->db->query("select stok FROM kue where id_kue = '$where'");
    }
    function get_data_edit($id){
        return $this->db->query("SELECT * FROM `transaksi_penjualan` INNER JOIN detail_pesanan on transaksi_penjualan.kode_pesanan = detail_pesanan.kode_pesanan INNER JOIN kue on detail_pesanan.id_kue = kue.id_kue where kode_penjualan ='$id'");
    }
}

?>