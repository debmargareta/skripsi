<?php

class m_produksi extends CI_Model{
    function tambah_produksi($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_bahan(){
        $this->db->select('bahan.id_bahan, bahan.nama_bahan, bahan.satuan_bahan, bahan.status, stok_bahan.id_stok, stok_bahan.id_bahan, stok_bahan.stok, stok_bahan.satuan')
        ->from('bahan')
        ->join('stok_bahan','stok_bahan.id_bahan = bahan.id_bahan','inner');
        $query = $this->db->get();
        return $query;
    }
    function tampil_produksi(){
        return $this->db->query("SELECT produksi.id_produksi, produksi.id_kue, produksi.jumlah, produksi.satuan, produksi.tanggal_produksi, kue.id_kue, kue.nama_kue from produksi inner join kue on kue.id_kue = produksi.id_kue where produksi.status='1'");
    }
    function produksi_kuker(){
        return $this->db->query("SELECT * from kue where jenis_kue='Kering'");
    }
    function get_resep($where){
        //before: return $this->db->query("SELECT * from resep where id_kue = '.$where.'");
        return $this->db->query("SELECT * from resep where id_kue = '".$where."'");
    }
    function get_stok($where){
        // before: return $this->db->query("SELECT * from bahan where id_bahan = '.$where.'");
        return $this->db->query("SELECT * from bahan where id_bahan = '".$where."'");
    }
    function get_kue($where){
        // before: return $this->db->query("SELECT * from kue where id_bahan = '.$where.'");
        return $this->db->query("SELECT stok from kue where id_kue = '".$where."'");
    }
     function edit_produksi($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_produksi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_bahan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function check_stock_availability($bahan,$takaran){
        return $this->db->query("select * from bahan where id_bahan = ".$bahan." and stok > ".$takaran);

    }
}

?>