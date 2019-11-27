<?php

class m_register extends CI_Model{
    function insert_admin($data,$table){
        $this->db->insert($table,$data);
    }
}
?>