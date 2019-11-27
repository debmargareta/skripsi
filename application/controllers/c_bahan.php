<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_bahan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_bahan');
    }
    
    function tampil_tambah_bahan(){
        $this->load->view('v_tambah_bahan.php'); 
    }
    
    function save(){
    $checks = $this->input->post("counter");

    if($checks !=""){
      foreach($checks as $a){
       $data = array(
        "nama_bahan" => $this->input->post("namaBahan".$a),
        "satuan_bahan" => $this->input->post("satuanBahan".$a),
        "status" => 1
      );
       $this->m_bahan->tambah_bahan($data,"bahan");
     }
   }
   redirect('c_bahan/tampil_bahan');
 }
    
    function tampil_bahan(){
        $data['tampil'] = $this->m_bahan->tampil_bahan()->result();
        $this->load->view('v_bahan.php',$data);
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