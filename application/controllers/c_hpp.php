<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_hpp extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_hpp');
    }
    
    function lihat_tambah_hpp(){
        $data['tkl'] = $this->m_hpp->pilih_karyawan()->result();
        $data['kue'] = $this->m_hpp->pilihkue()->result();
        $data['overhead'] = $this->m_hpp->pilihoverhead()->result();
        $this->load->view('v_tambah_hpp.php',$data); 
    }
    
    function save(){
        $kue = $this->input->post("kue");
        $tahun = $this->input->post("tahun");
        $bulan = $this->input->post("bulan");
        $tanggal = date('Y-m-d');
        $checks = $this->input->post("counter");

        $takaran_beli=$this->m_hpp->total_beli_bahan($kue,$bulan,$tahun)->row();
        $total_takaran_beli_bahan = $takaran_beli->total;
        //echo $total_takaran_beli_bahan."<br>";

        $bahan_baku = $this->m_hpp->bahan_baku($kue,$bulan,$tahun)->result();
        $total_bahan_baku = $this->m_hpp->total_bahan_baku($kue,$bulan,$tahun)->result();


        $bo=$this->m_hpp->bo($bulan,$tahun)->result();
        $total_bo=$this->m_hpp->total_bo($bulan,$tahun)->result();

        $tampil_nama_kue= $this->m_hpp->get_namakue($kue)->result();

        $takaran = $this->m_hpp->total_takaran($kue)->row();
        $total = $takaran->totaltakaran;

        $toples = $total_takaran_beli_bahan/$total;


        if($checks !=""){
                $counter = 0;
            foreach($checks as $a){
                $where = array(
                    "id_karyawan" => $this->input->post("tkl".$a),
                );
                $tkl_id=$this->m_hpp->get_tkl($where,"karyawan")->result();
                //print_r($tkl);
                foreach ($tkl_id as $tkl_data) {
                    $tkl_nama[$counter] = $tkl_data->nama_karyawan;
                    $tkl_gaji[$counter] = $tkl_data->gaji_harian*30;
                    $counter++;
                }
            }

        }
    $data = (array(            
            'bahan_baku'=>$bahan_baku,
            'total_bahan_baku'=>$total_bahan_baku,

            'nama_tkl'=>$tkl_nama,
            'gaji_tkl'=>$tkl_gaji,
            
            'bo'=>$bo,
            'total_bo'=>$total_bo,
            
            'tampil_nama_kue'=>$tampil_nama_kue,
            'total_produksi'=>$toples,
        ));

    $tbb = $this->m_hpp->total_bahan_baku($kue,$bulan,$tahun)->row();
    $totalbahanbaku = $tbb->total1;
    //echo $totalbahanbaku."<br>";

    $tbo = $this->m_hpp->total_bo($bulan,$tahun)->row();
    $totaloverhead = $tbo->total2;
    //echo $totaloverhead."<br>";

    $gaji = array_sum($tkl_gaji);
    $totalgaji = (integer)$gaji;
    //echo $totalgaji."<br>";
    //echo $totalgaji;

    $hpp= ($totalbahanbaku+$totaloverhead+$totalgaji)/$toples;
    //echo $hpp;

    $data2 = array(
        "id_kue" => $kue,
        "biaya_bahan_baku" => $totalbahanbaku,
        "biaya_tenaga_kerja" => $totalgaji ,
        "biaya_overhead" => $totaloverhead,
        "tanggal" => $tanggal,
        "harga_pokok_produksi"=> $hpp,
    );

   $this->m_hpp->tambah_hpp($data2,"harga_pokok_produksi");
   $this->load->view("v_tabel_hpp.php",$data);
}
}
?>