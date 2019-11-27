<?php

class m_transaksi_pembelian extends CI_Model{
    function tampil_transaksi(){
        $this->db->select('transaksi_pembelian.id_transaksi_pembelian, transaksi_pembelian.id_supplier, transaksi_pembelian.tanggal_pembelian, transaksi_pembelian.status_pembayaran, supplier.id_supplier, supplier.nama_toko')
        ->from('transaksi_pembelian')
        ->join('supplier','transaksi_pembelian.id_supplier = supplier.id_supplier','inner'); 
        $query = $this->db->get();
        return $query;
    }
    function supplier(){
    	return $this->db->query("SELECT * FROM supplier WHERE status ='1'");
    }
    function bahan(){
    	return $this->db->query("SELECT * FROM bahan WHERE status ='1'");
    }
    function tambah_transaksi($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    function update_stok($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function tampil_detail_transaksi_pembelian(){
    	$this->db->select('bahan.id_bahan, bahan.nama_bahan, bahan.satuan_bahan, detail_transaksi_pembelian.id_detail_transaksi_pembelian, detail_transaksi_pembelian.id_transaksi_pembelian, detail_transaksi_pembelian.id_bahan, detail_transaksi_pembelian.jumlah, detail_transaksi_pembelian.satuan, detail_transaksi_pembelian.harga, transaksi_pembelian.id_transaksi_pembelian, transaksi_pembelian')
    	->from('detail_transaksi_pembelian')
    	->join('bahan','detail_transaksi_pembelian.id_bahan = bahan.id_bahan')
    	->join('transaksi_pembelian', 'detail_transaksi_pembelian.id_transaksi_pembelian = transaksi_pembelian.id_transaksi_pembelian');
    }

    function sebelumnya(){
    	$this->db->get('select transaksi_pembelian.id_transaksi_pembelian, transaksi_pembelian.id_supplier, transaksi_pembelian.tanggal_pembelian, transaksi_pembelian.total_harga, transaksi_pembelian.status_pembayaran, supplier.id_supplier, supplier.nama_toko, bahan.id_bahan, bahan.nama_bahan, bahan.satuan_bahan, detail_transaksi_pembelian.id_detail_transaksi_pembelian, detail_transaksi_pembelian.id_transaksi_pembelian, detail_transaksi_pembelian.id_bahan, detail_transaksi_pembelian.jumlah, detail_transaksi_pembelian.satuan, detail_transaksi_pembelian.harga FROM transaksi_pembelian INNER JOIN detail_transaksi_pembelian ON transaksi_pembelian.id_transaksi_pembelian = detail_transaksi_pembelian.id_transaksi_pembelian INNER JOIN supplier ON transaksi_pembelian.id_supplier = supplier.id_supplier INNER join bahan ON bahan.id_bahan = detail_transaksi_pembelian.id_bahan');
    }
}

?>