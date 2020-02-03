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
            $jumlah = $this->input->post("jumlah".$a);
            for($jmlh = 0; $jmlh<$jumlah; $jmlh++){
                $kali= $this->input->post("satuan".$a);
                //$this->m_produksi->tambah_produksi($data,"produksi");

                $where = $this->input->post("idKue".$a);
                $resep = $this->m_produksi->get_resep($where)->result();
                //foreach ini untuk ngecek kesempurnaan bahan
                $is_selamat = true;
                foreach ($resep as $list) {
                    $bahan = $list->id_bahan;
                    $takaran = $list->takaran;
                    //bikin select yang tadi gua bilang
                    $cek_bahan = $this->m_produksi->check_stock_availability($bahan,$takaran);
                    if($cek_bahan->num_rows() == 0){
                        //ga ada yang keselect meaning bahan tersebut tidak ada atau bahan tersebut tidak memiliki stok yang dibutuhkan
                        $is_selamat = false;
                        break;
                    }
                }
                if($is_selamat){
                    foreach ($resep as $list) {
                        $bahan = $list->id_bahan;
                        $takaran = $list->takaran;
                        // echo "<br/>bahan: ".$bahan;
                        // echo "<br/>takaran: ".$takaran;
                        $where3 = $bahan;
                        $stok = $this->m_produksi->get_stok($where3)->row();
                        //echo "<br/>Stok:".$stok->stok;
                        $liststok = $stok->stok;
                        $liststok -= ($kali*$takaran);
                        // echo "<br/>liststok:". $liststok;
                        // echo "<br/>kali:". $kali;
                        $data = array(
                            "stok" => $liststok
                        );
                        $where1 = array('id_bahan' => $bahan);
                        $this->m_produksi->update_produksi($where1,$data,'bahan');
                        echo "<br/><br/>";  
                    }
                    $stok_kue= $this->m_produksi->get_kue($where)->row();
                    $get_stok_kue = $stok_kue->stok;
                    $get_stok_kue += $kali;
                    $data2 = array(                    
                        "stok" => $get_stok_kue,
                    );
                    $where2 = array('id_kue' => $where);
                    $this->m_produksi->update_produksi($where2,$data2,'kue');
                }
                else{
                    break;
                }
            }
        }
    }
    //redirect('c_produksi/tampil_produksi');
    }

    function tampil_produksi(){
        $data['produksi'] = $this->m_produksi->tampil_produksi()->result();
        $this->load->view('v_produksi.php',$data);
    }

     function edit_produksi($idproduksi){
        $where = array('id_produksi'=>$idproduksi);
        $data['edit_kue'] = $this->m_produksi->produksi_kuker()->result();
        $data['edit_produksi'] = $this->m_produksi->edit_produksi($where,'produksi')->result();
        $this->load->view('v_edit_produksi.php',$data);
    }
    
    function update_produksi(){
        $u_id = $this->input->post('idProduksi');
        $u_nama = $this->input->post('namaKue');
        $u_jml = $this->input->post('jumlah');
        $u_satuan = $this->input->post('satuan');
        
        $data = array(
            'id_produksi' =>$u_id,
            'id_kue' =>$u_nama,
            'jumlah' =>$u_jml,
            'satuan' =>$u_satuan,
            'status' =>1,
        );
        $where = array('id_produksi' => $u_id);
        
        $this->m_produksi->update_produksi($where,$data,'produksi');
redirect('c_produksi/tampil_produksi'); }
    
}
?>