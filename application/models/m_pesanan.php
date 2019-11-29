<?php

class m_pesanan extends CI_Model{
    function tampil_pesanan	(){
        $this->db->select('pesanan.id_pesanan, pesanan.id_pelanggan, pesanan.tanggal_pesanan, pesanan.tanggal_pengambilan, pesanan.id_admin, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, pesanan.status')
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
    function tambah_pesanan($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    function update_stok($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_pesanan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>