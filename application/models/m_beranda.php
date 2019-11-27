<?php

class m_beranda extends CI_Model{
    function tampil_admin(){
       $id_admin = $this->session->userdata('admin_username');
       $query = $this->db->query("SELECT * FROM admin WHERE username = '".$id_admin."'");
       return $query;
    }
}
?>