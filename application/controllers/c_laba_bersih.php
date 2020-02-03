<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_laba_bersih extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_laba_bersih');
        $this->load->model('m_hpp');
    }
    
    function pilih_tahun(){
        $this->load->view('v_pilih_tahun_keuntungan.php'); 
    }
    
    function save(){
        $tahun = $this->input->post("tahun");
        $bulan = $this->input->post("bulan");

        $sum_penj = $this->m_laba_bersih->sum_penjualan($bulan,$tahun)->row();
        $grand_penjualan = $sum_penj->laba_kotor;

        $hpp = $this->m_laba_bersih->hpp($bulan,$tahun)->result();
        foreach ($hpp as $golongan) {
            $gbb = $golongan->biaya_bahan_baku;
            $gtk = $golongan->biaya_tenaga_kerja;
            $go = $golongan->biaya_overhead;
        }


        echo $grand_penjualan;
       
        $data = (array(            
            'laba_kotor'=>$grand_penjualan,
            'gbbb'=>$gbb,
            'gbtk'=>$gtk,
            'gbo'=>$go,
        ));

        $this->load->view("v_tabel_laporan_lr.php",$data);
    }
}
?>