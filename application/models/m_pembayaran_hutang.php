<?php

class m_pembayaran_hutang extends CI_Model{
    function tambah_pembayaran($data,$table){
        $this->db->insert($table,$data);
         return $this->db->insert_id();
    }
    function hutang(){
        return $this->db->query("SELECT * FROM transaksi_pembelian WHERE status_pembayaran ='Hutang'");
    }
    function tampil_pembayaran(){
        return $this->db->query("SELECT pembayaran_hutang.id_pembayaran_hutang, pembayaran_hutang.id_transaksi_pembelian, pembayaran_hutang.nominal_bayar, pembayaran_hutang.tanggal_pembayaran, pembayaran_hutang.status, transaksi_pembelian.id_transaksi_pembelian, transaksi_pembelian.kode_pembelian FROM pembayaran_hutang INNER JOIN transaksi_pembelian on pembayaran_hutang.id_transaksi_pembelian = transaksi_pembelian.id_transaksi_pembelian");
    }
    function gethutang(){
        return $this->db->query("SELECT * FROM transaksi_pembelian");
    }
    function edit_pelanggan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_pembayaran($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_pelanggan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function get_id_transaksi($id){
        return $this->db->query("SELECT transaksi_pembelian.id_transaksi_pembelian, transaksi_pembelian.total_harga, detail_transaksi_pembelian.id_detail_transaksi_pembelian, detail_transaksi_pembelian.id_transaksi_pembelian, detail_transaksi_pembelian.id_bahan, detail_transaksi_pembelian.jumlah, detail_transaksi_pembelian.satuan, detail_transaksi_pembelian.harga, bahan.id_bahan, bahan.nama_bahan FROM detail_transaksi_pembelian INNER JOIN transaksi_pembelian ON transaksi_pembelian.id_transaksi_pembelian = detail_transaksi_pembelian.id_transaksi_pembelian INNER JOIN bahan on detail_transaksi_pembelian.id_bahan = bahan.id_bahan WHERE detail_transaksi_pembelian.id_transaksi_pembelian ='$id'");;
    }
    function totalharga($id){
        return $this->db->query("SELECT SUM(harga) as totalharga FROM detail_transaksi_pembelian where id_transaksi_pembelian = '$id'");
    }
}

?>