<?php

class m_resepkue extends CI_Model{
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
    function pilihkue(){
        return $this->db->get('kue');
    }
    function pilihbahan(){
        return $this->db->get('bahan');
    }
    function tampil_resep(){
        $this->db->select('resep')->from('kasbon')->join('karyawan','karyawan.id_karyawan = kasbon.id_karyawan','inner')->where('kasbon.status = 1');
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