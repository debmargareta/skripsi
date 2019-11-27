<?php
class m_admin extends CI_Model {
    function tampilkan_data($where){
        return $this->db->get_where('admin',$where);
    }
    function insert_table($data,$table){
        $this->db->insert($table,$data);
    }
    function edit($where,$table){
        return $this->db->get_where($table,$where);
    }
    function simpan_sandi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function update_hapus($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function cek_pass($where,$table){
        return $this->db->get_where($table,$where);
    }
}

?>