<?php

class m_login extends CI_Model{
    
    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }
    
    function getID($username){
        $query = $this->db->query("SELECT * FROM admin WHERE username = '".$username."'");
        return $query;
    }
}


?>