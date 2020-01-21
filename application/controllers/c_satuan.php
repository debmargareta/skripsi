<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_satuan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_satuan');
    }
    
    function tampil_tambah_satuan(){
        $this->load->view('v_tambah_satuan.php'); 
    }
    
    function save(){
    $checks = $this->input->post("counter");

    if($checks !=""){
        foreach($checks as $a){
            $data = array(
                "nama_satuan" => $this->input->post("namaSatuan".$a),
                "golongan_satuan" => $this->input->post("golSatuan".$a),
                "status" => 1
            );
            $this->m_satuan->tambah_satuan($data,"satuan");
        }
    }
    redirect('c_satuan/tampil_satuan');
    }

    function tampil_satuan(){
        $data['tampil'] = $this->m_satuan->tampil_satuan()->result();
        $this->load->view('v_satuan.php',$data);
    }
    
    function edit_satuan($idsatuan){
        $where = array('id_satuan'=>$idsatuan);
        $data['edit_satuan'] = $this->m_satuan->edit_satuan($where,'satuan')->result();
        $this->load->view('v_edit_satuan.php',$data);
    }//ambil data untuk ditampilin di view edit
    
    function update_satuan(){
        $u_id = $this->input->post('idSatuan');
        $u_nama = $this->input->post('namaSatuan');
        $u_golongan = $this->input->post('golSatuan');
        
        $data = array(
            'id_satuan' =>$u_id,
            'nama_satuan' =>$u_nama,
            'golongan_satuan' =>$u_golongan,
            'status' =>1,
        );
        $where = array('id_satuan' => $u_id);
        
        $this->m_satuan->update_satuan($where,$data,'satuan');
        redirect('c_satuan/tampil_satuan');
    }
    
    function hapus_satuan($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_satuan'=>$id);
        $this->m_satuan->ubah_status_satuan($where,$data,'satuan');
        redirect('c_satuan/tampil_satuan');
    }
}
?>