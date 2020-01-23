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
        $checks = $this->input->post("counter");
        $checks1 = $this->input->post("counter1");

        $bahan_baku = $this->m_hpp->bahan_baku($kue,$bulan,$tahun)->result();
        $total_bahan_baku = $this->m_hpp->total_bahan_baku($kue,$bulan,$tahun)->result();

        // $tkl=$this->m_hpp->tkl($bulan,$tahun);
        // $total_tkl=$this->m_hpp->total_tkl($bulan,$tahun);

        $bo=$this->m_hpp->bo($bulan,$tahun)->result();
        $total_bo=$this->m_hpp->total_bo($bulan,$tahun)->result();

        // $tampil_nama_menu= $this->m_hpp->tampil_nama_menu($kue);

        // $hasil_produksi = $this->m_hpp->hasil_produksi($bulan,$tahun,$kue);

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
            
            // 'tampil_nama_menu'=>$tampil_nama_menu,
            // 'hasil_produksi'=>$hasil_produksi
        ));
       // print_r($data);

$this->load->view("v_tabel_hpp.php",$data);
        //redirect('c_karyawan/tampil_karyawan');
}
}
?>