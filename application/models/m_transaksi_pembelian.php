<?php

class m_transaksi_pembelian extends CI_Model{
    function tampil_transaksi(){
        return $this->db->query('select * FROM transaksi_pembelian INNER JOIN supplier ON transaksi_pembelian.id_supplier = supplier.id_supplier');
    }
    function getrow(){
        return $this->db->query("select * from transaksi_pembelian");
    }
    function supplier(){
    	return $this->db->query("SELECT * FROM supplier WHERE status ='1'");
    }
    function bahan(){
    	return $this->db->query("SELECT * FROM bahan WHERE status ='1'");
    }
    function tambah_transaksi($data,$table){
        $this->db->insert($table,$data);
    }
    function getbahan($where2){
        return $this->db->query("SELECT  bahan.id_bahan, bahan.nama_bahan, bahan.satuan_bahan, detail_transaksi_pembelian.id_detail_transaksi_pembelian, detail_transaksi_pembelian.kode_pembelian, detail_transaksi_pembelian.id_bahan, detail_transaksi_pembelian.jumlah, detail_transaksi_pembelian.satuan, detail_transaksi_pembelian.harga from detail_transaksi_pembelian inner join bahan ON bahan.id_bahan = detail_transaksi_pembelian.id_bahan WHERE detail_transaksi_pembelian.kode_pembelian = '$where2'");
    }
    function edit_transaksi($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_transaksi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    function totalharga($id){
        return $this->db->query("SELECT SUM(harga) as totalharga FROM detail_transaksi_pembelian where kode_pembelian = '$id'");
    }
    function tampil_detail_transaksi_pembelian(){
    	$this->db->select('bahan.id_bahan, bahan.nama_bahan, detail_transaksi_pembelian.id_detail_transaksi_pembelian, detail_transaksi_pembelian.kode_pembelian, detail_transaksi_pembelian.id_bahan, detail_transaksi_pembelian.jumlah, detail_transaksi_pembelian.satuan, detail_transaksi_pembelian.harga, transaksi_pembelian.kode_pembelian, transaksi_pembelian.total_harga')
    	->from('detail_transaksi_pembelian')
    	->join('bahan','detail_transaksi_pembelian.id_bahan = bahan.id_bahan')
    	->join('transaksi_pembelian', 'detail_transaksi_pembelian.kode_pembelian = transaksi_pembelian.kode_pembelian');

        $query = $this->db->get();
        return $query;
    }
}

?>