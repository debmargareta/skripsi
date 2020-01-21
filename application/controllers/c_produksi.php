<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_produksi extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_produksi');
    }
    
    function tampil_tambah_produksi(){
        $data['kuker'] = $this->m_produksi->produksi_kuker()->result();
        $this->load->view('v_tambah_produksi.php',$data); 
    }
    
    function save(){

    $checks = $this->input->post("counter");

    if($checks !=""){

        foreach($checks as $a){
            $data = array(
                "id_kue" => $this->input->post("idKue".$a),
                "jumlah" => $this->input->post("jumlah".$a),
                "satuan" => $this->input->post("satuan".$a),
                "tanggal_produksi" => date('Y-m-d'),
                "status" => 1
            );
            $kali= $this->input->post("jumlah".$a)*$this->input->post("satuan".$a);
            $this->m_produksi->tambah_produksi($data,"produksi");

            $where = $this->input->post("idKue".$a);
            $resep = $this->m_produksi->get_resep($where)->result();
            foreach ($resep as $list) {
                $bahan = $list->id_bahan;
                $takaran = $list->takaran;
                
                $stok = $this->m_produksi->get_stok($where)->row();
                $liststok = $stok->stok;
                $liststok-=($kali*$takaran);
                $data = array(
                    "stok" => $liststok
                );
                $where1 = array('id_bahan' => $bahan);
                $this->m_produksi->update_bahan($where1,$data,'bahan');
            }
            $stok_kue= $this->m_produksi->get_kue($where)->row();
            $get_stok_kue = $stok_kue->stok;
            $get_stok_kue += $kali;
            $data2 = array(                    
                "stok" => $get_stok_kue,
            );
            $where2 = array('id_kue' => $where);
            $this->m_produksi->update_bahan($where2,$data2,'kue');
        }
    }
    redirect('c_produksi/tampil_produksi');
    }

    function tampil_produksi(){
        $data['produksi'] = $this->m_produksi->tampil_produksi()->result();
        $this->load->view('v_produksi.php',$data);
    }
    
}
?>