<?php

class m_laba_bersih extends CI_Model{
        
    function sum_penjualan($bulan, $tahun){
        return $this->db->query("SELECT sum(total_harga) as laba_kotor FROM transaksi_penjualan WHERE MONTH(tanggal) = '$bulan' and YEAR(tanggal)='$tahun'");
    }
    function hpp($bulan, $tahun){
        return $this->db->query("SELECT * FROM harga_pokok_produksi WHERE MONTH(tanggal) = '$bulan' and YEAR(tanggal)='$tahun' ORDER BY tanggal DESC LIMIT 1");
    }
}

?>