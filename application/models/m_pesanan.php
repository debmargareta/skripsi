<?php

class m_pesanan extends CI_Model{
    function tampil_pesanan	(){
        $this->db->select('pesanan.kode_pesanan, pesanan.id_pelanggan, pesanan.tanggal_pesanan, pesanan.tanggal_pengambilan, pesanan.id_admin, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, pesanan.status')
        ->from('pesanan')
        ->join('pelanggan','pesanan.id_pelanggan = pelanggan.id_pelanggan','inner')
        ->where('pesanan.status = 1'); 
        $query = $this->db->get();
        return $query;
    }
    function pelanggan(){
    	return $this->db->query("SELECT * FROM pelanggan WHERE status ='1'");
    }
    function kue(){
    	return $this->db->query("SELECT * FROM kue WHERE status ='1' AND jenis_kue ='Kering'");
    }
    function detail_pesanan($where2){
        return $this->db->query("SELECT detail_pesanan.id_detail_pesanan, detail_pesanan.kode_pesanan, detail_pesanan.id_kue,detail_pesanan.jumlah, detail_pesanan.satuan, kue.id_kue, kue.nama_kue from detail_pesanan inner join kue ON kue.id_kue = detail_pesanan.id_kue WHERE detail_pesanan.kode_pesanan = '$where2' AND detail_pesanan.status=0");
    }
     function get_detail_pesanan(){
        return $this->db->query("SELECT detail_pesanan.id_detail_pesanan, detail_pesanan.kode_pesanan, detail_pesanan.id_kue,detail_pesanan.jumlah, detail_pesanan.satuan, kue.id_kue, kue.nama_kue from detail_pesanan inner join kue ON kue.id_kue = detail_pesanan.id_kue where detail_pesanan.status=0");
    }
    function tambah_pesanan($data,$table){
        $this->db->insert($table,$data);
    }
    function edit_pesanan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_pesanan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_pesanan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>