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

//     for(ini jumlah item yang dipesen){
//      dapet id_kue
//      pake id kue, cari bahan untuk bkin kue itu apa aja dan berapa jumlahnya
//      for(jumlah jenis bahan)
//            dari id bahan, ambil stoknya
//            lalu stok dikurang jumlah bahan (perjenisnya) * jumlah pesenan
//            update ke table bahan, ngurangin stoknya
//      lalu dari id kue, ambil stok kue 
//      stok kue + jumlah pesanan 
//      update ke table stok kue
// selesai
    }

    function tampil_produksi(){
        $data['produksi'] = $this->m_produksi->tampil_produksi()->result();
        $this->load->view('v_produksi.php',$data);
    }
    
    function edit_bahan($idbahan){
        $where = array('id_bahan'=>$idbahan);
        $data['edit_bahan'] = $this->m_bahan->edit_bahan($where,'bahan')->result();
        $this->load->view('v_edit_bahan.php',$data);
    }
    
    function update_bahan(){
        $u_id = $this->input->post('idBahan');
        $u_nama = $this->input->post('namaBahan');
        $u_satuan = $this->input->post('satuanBahan');
        
        $data = array(
            'id_bahan' =>$u_id,
            'nama_bahan' =>$u_nama,
            'satuan_bahan' =>$u_satuan,
            'status' =>1,
        );
        $where = array('id_bahan' => $u_id);
        
        $this->m_bahan->update_bahan($where,$data,'bahan');
        redirect('c_bahan/tampil_bahan');
    }
    
    function hapus_bahan($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_bahan'=>$id);
        $this->m_bahan->ubah_status_bahan($where,$data,'bahan');
        redirect('c_bahan/tampil_bahan');
    }
}
?>