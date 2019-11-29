<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_kue extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_kue');
  }

  public function tampil_kue(){
    $data['kue'] = $this->m_kue->tampil_kue()->result();
    $this->load->view('v_kue', $data);
  }

  public function tampil_tambah_kue(){
    $this->load->view('v_tambah_kue.php');
  }

  public function save(){
    $checks = $this->input->post("counter");

    if($checks !=""){
      foreach($checks as $a){
        $data = array(
          "nama_kue" => $this->input->post("namaKue".$a),
          "jenis_kue" => $this->input->post("jenisKue".$a),
          "status" => 1
        );
        $this->m_kue->tambah_kue($data,"kue");
      }
    }
    redirect('c_kue/tampil_kue');
  }

  function edit_kue($idkue){
    $where = array('id_kue'=>$idkue);
    $data['edit_kue'] = $this->m_kue->edit_kue($where,'kue')->result();
    $this->load->view('v_edit_kue.php',$data);
  }

  function update_kue(){
    $u_id = $this->input->post('idKue');
    $u_nama = $this->input->post('namaKue');
    $u_jenis = $this->input->post('jenisKue');

    $data = array(
      'nama_kue' => $u_nama,
      'jenis_kue' => $u_jenis,
      'status' => 1,
    );

    $where = array('id_kue' => $u_id);

    $this->m_kue->update_kue($where,$data,'kue');
    redirect('c_kue/tampil_kue');
  }
  function hapus_kue($id){
    $data = array(
      'status'=>0
    );
    $where= array('id_kue'=>$id);
    $this->m_kue->ubah_status_kue($where,$data,'kue');
    redirect('c_kue/tampil_kue');
  }
}