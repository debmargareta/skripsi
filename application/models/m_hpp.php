<?php

class m_hpp extends CI_Model{
    function tambah_hpp($data,$table){
        $this->db->insert($table,$data);
    }
    function pilih_karyawan(){
        return $this->db->query("SELECT * FROM karyawan WHERE status ='1'");
    }
    function pilihkue(){
        return $this->db->query("SELECT * FROM kue WHERE status ='1' and status_resep = '1'");
    }
    function pilihoverhead(){
        return $this->db->query("SELECT * FROM bahan WHERE golongan_biaya = 'Biaya Overhead' and status=1");
    }
    function bahan_baku($kue,$bulan,$tahun) {
        
        return $this->db->query("select * from list_bahan_hpp inner join resep on resep.id_bahan = list_bahan_hpp.id_bahan where resep.id_kue = ".$kue." and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun);
    }
    
    function total_bahan_baku($kue,$bulan,$tahun) {
        
        return $this->db->query("select sum(total), id_kue from list_bahan_hpp where resep.id_kue = ".$kue." and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun);       
    }
    function get_tkl($where){
        return $this->db->get_where('karyawan',$where);
    }
    function bo($bulan,$tahun) {
        
        return $this->db->query("select * from list_bahan_hpp where list_bahan_hpp.golongan_biaya ='Biaya Overhead' and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun);
    }
    
    function total_bo($bulan,$tahun) {
        
        return $this->db->query("SELECT SUM(m.harga) as total 
            FROM bahan as b, detail_transaksi_pembelian as m, transaksi_pembelian as p 
            WHERE b.golongan_biaya = 'Biaya Overhead' and b.id_bahan=m.id_bahan and MONTH(p.tanggal_pembelian) = '$bulan' and YEAR(p.tanggal_pembelian)='$tahun'
            ");
    }
}

?>