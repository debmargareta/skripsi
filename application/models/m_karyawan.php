<?php

class m_karyawan extends CI_Model{
    function tambah_karyawan($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_karyawan(){
        return $this->db->query("SELECT * FROM karyawan WHERE status ='1'");
    }
     function edit_karyawan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_karyawan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_karyawan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>