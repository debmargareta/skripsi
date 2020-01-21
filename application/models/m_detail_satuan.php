<?php

class m_detail_satuan extends CI_Model{
    function tambah_detail_satuan($data,$table){
        $this->db->insert($table,$data);
    }
    function tampil_satuan(){
        return $this->db->query("SELECT * from satuan where status=1");
    }//dropdown nama satuan di tambah sama edit
    function tampil_bahan(){
        return $this->db->query("SELECT * from bahan where status=1");
    }//dropdown nama bahan di tambah sama edit
    function tampil_detail_satuan(){
        return $this->db->query("SELECT * from detail_satuan_bahan inner join bahan on bahan.id_bahan = detail_satuan_bahan.id_bahan inner join satuan on satuan.id_satuan = detail_satuan_bahan.id_satuan where satuan.status=1 AND bahan.status=1 and detail_satuan_bahan.status = 1");
    }
    function edit_detail_satuan($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_detail_satuan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_detail_satuan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>