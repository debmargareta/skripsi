<?php

class m_pembarayan_gaji extends CI_Model{
    public function save_batch($data){
        $result = array();
        for($x = 0; $x<count($data); $x++){
            $result[] = array(
                'id_kasbon'=>"",
                'id_karyawan'=>$_POST['idKaryawan'][$x],
                'jumlah_kasbon'=>$_POST['jumlahKasbon'][$x],
                'tanggal_kasbon'=>$_POST['tanggalKasbon'][$x],
                'status'=>1,
            );
        }
        $this->db->insert_batch('kasbon', $result);
    }
    function pilihkaryawan(){
        return $this->db->get('karyawan');
    }
    function tampil_kasbon(){
        $this->db->select('kasbon.id_kasbon,kasbon.id_karyawan,karyawan.id_karyawan,karyawan.nama_karyawan,kasbon.jumlah_kasbon,kasbon.tanggal_kasbon, kasbon.status')->from('kasbon')->join('karyawan','karyawan.id_karyawan = kasbon.id_karyawan','inner')->where('kasbon.status = 1');
        return $this->db->get();
    }
    
    function edit_kasbon($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_kasbon($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ubah_status_kasbon($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}
?>