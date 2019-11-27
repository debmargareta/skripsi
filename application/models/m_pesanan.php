<?php

class m_pesanan extends CI_Model{
    function tampil_pesanan	(){
        $this->db->select('pesanan.id_pesanan, pesanan.id_pelanggan, pesanan.tanggal_pesanan, pesanan.tanggal_pengambilan, pesanan.id_admin, pelanggan.id_pelanggan, pelanggan.nama_pelanggan')
        ->from('pesanan')
        ->join('pelanggan','pesanan.id_pelanggan = pelanggan.id_pelanggan','inner'); 
        $query = $this->db->get();
        return $query;
    }
    function pelanggan(){
    	return $this->db->query("SELECT * FROM pelanggan WHERE status ='1'");
    }
    function kue(){
    	return $this->db->query("SELECT * FROM kue WHERE status ='1' AND jenis_kue ='Kering'");
    }
    function tambah_pesanan($data,$table){
        return $this->db->insert($table,$data);
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