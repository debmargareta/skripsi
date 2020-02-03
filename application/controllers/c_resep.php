<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_resep extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_resep');
  }

  public function tampil_resep(){
    $data['resep'] = $this->m_resep->tampil_resep()->result();
    $data['resepnama'] = $this->m_resep->distincnama()->result();
    $this->load->view('v_resep', $data);
  }

  public function tampil_tambah_resep(){
    $data['pilihkue']=$this->m_resep->pilihkue()->result();
    $data['pilihbahan']=$this->m_resep->pilihbahan()->result();
    $data['pilihsatuan']=$this->m_resep->pilihsatuan()->result();
    $this->load->view('v_tambah_resep.php',$data);
  }

  public function save(){
    $checks = $this->input->post("counter");

    if($checks !=""){
      for($i=0;$i<$checks;$i++){
       $data = array(
        "id_kue" => $this->input->post("idKue"),
        "id_bahan" => $this->input->post("idBahan".$i),
        "takaran" => $this->input->post("takaran".$i),
        "id_satuan" => $this->input->post("satuanBahan".$i),
        "status" => 1,
      );
       $data2 = array(
          "status_resep" => 1,
        );
       $this->m_resep->tambah_resep($data,"resep");
     }
     $where = array("id_kue"=> $this->input->post("idKue"));
     $this->m_resep->ubah_status_resep($where,$data2,"kue");
   }
   redirect('c_resep/tampil_resep');
  }

  function edit_resep($idkue){
    $where = array(
      'id_kue'=>$idkue,
      'status'=>1
    );
    $data['edit_kue'] = $this->m_resep->edit_resep($where,'resep')->result();
    $data['pilih_bahan']=$this->m_resep->pilihbahan()->result();
    $data['pilih_kue']=$this->m_resep->pilihkueedit()->result();
    $data['pilih_satuan']=$this->m_resep->pilihsatuan()->result();
    $this->load->view('v_edit_resep.php',$data);
  }

  function update_resep(){
    $namakkue = $this->input->post("namaKue");
    $checks = $this->input->post("counter");

    if($checks !=""){
      foreach($checks as $i){
       $data = array(
        "id_kue" => $this->input->post("namaKue"),
        "id_bahan" => $this->input->post("idBahan".$i),
        "takaran" => $this->input->post("takaran".$i),
        "id_satuan" => $this->input->post("satuanBahan".$i),
        "status" => $this->input->post("hapus".$i),
      );
       //print_r($data);
       $where = array("id_resep"=> $i);
       $this->m_resep->update_resep($where,$data,'resep');
     }
     
   }
   redirect('c_resep/tampil_resep');
  }
  function hapus_resep($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_kue'=>$id);
        $this->m_resep->ubah_status_resep($where,$data,'resep');

         $data2 = array(
            'status_resep'=>0
        );
        $where2= array('id_kue'=>$id);
        $this->m_resep->ubah_status_resep($where2,$data2,'kue');

        redirect('c_resep/tampil_resep');
    }
}