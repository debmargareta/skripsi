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
        return $this->db->query("SELECT * FROM biaya_overhead WHERE status=1");
    }
    function bahan_baku(){

    }
}

?>