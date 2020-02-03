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
        return $this->db->query("select * from list_bahan_hpp inner join resep on resep.id_bahan = list_bahan_hpp.id_bahan where resep.id_kue = ".$kue." and resep.status=1 and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun);
    }
    function total_bahan_baku($kue,$bulan,$tahun) {   
        return $this->db->query("select sum(total) as total1 from list_bahan_hpp inner join resep on resep.id_bahan = list_bahan_hpp.id_bahan  where resep.id_kue = ".$kue." and resep.status = 1 and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun." and list_bahan_hpp.golongan_biaya = 'Biaya Bahan Baku'");       
    }
    function get_tkl($where){
        return $this->db->get_where('karyawan',$where);
    }
    function bo($bulan,$tahun) {
        return $this->db->query("select * from list_bahan_hpp where list_bahan_hpp.golongan_biaya ='Biaya Overhead' and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun);
    }
    function total_bo($bulan,$tahun) {   
        return $this->db->query("select sum(total) as total2 from list_bahan_hpp where list_bahan_hpp.golongan_biaya ='Biaya Overhead' and list_bahan_hpp.bulan = ".$bulan." and list_bahan_hpp.tahun = ".$tahun." and list_bahan_hpp.golongan_biaya = 'Biaya Overhead'");
    }
    function get_namakue($kue){
        return $this->db->query("select nama_kue from kue where id_kue = '$kue'");    
    }
    function total_takaran($kue){
        return $this->db->query("select sum(takaran) as totaltakaran from resep where id_kue = '$kue'");
    }
    function total_beli_bahan($kue, $bulan, $tahun){
        return $this->db->query("select sum(v_sum_resep.total_konversi) as total from v_sum_resep inner join resep on resep.id_bahan = v_sum_resep.id_bahan where resep.id_kue = '$kue' and v_sum_resep.bulan = '$bulan' and v_sum_resep.tahun = '$tahun'");
    }
}

?>