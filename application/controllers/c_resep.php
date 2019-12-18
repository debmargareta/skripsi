<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_resep extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_resep');
  }

  public function tampil_resep(){
    $data['resep'] = $this->m_resep->tampil_resep()->result();
    $this->load->view('v_resep', $data);
  }

  public function tampil_tambah_resep(){
    $data['pilihkue']=$this->m_resep->pilihkue()->result();
    $data['pilihbahan']=$this->m_resep->pilihbahan()->result();
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
        "satuan" => $this->input->post("satuanBahan".$i),
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

  function edit_kasbon($idkasbon){
    $where = array('id_kasbon'=>$idkasbon);
    $data['edit_kasbon'] = $this->m_kasbon->edit_kasbon($where,'kasbon')->result();
    $data['pilihkaryawan']=$this->m_kasbon->pilihkaryawan()->result();
    $this->load->view('v_edit_kasbon.php',$data);
  }

  function update_kasbon(){
    $u_id = $this->input->post('idKasbon');
    $u_id_karyawan = $this->input->post('idKaryawan');
    $u_jumlah = $this->input->post('jumlahKasbon');
    $u_tgl = $this->input->post('tglKasbon');
    $u_tanggal = date('Y-m-d', strtotime($u_tgl));

    $data = array(
      'id_karyawan' => $u_id_karyawan,
      'jumlah_kasbon' => $u_jumlah,
      'tanggal_kasbon' => $u_tanggal,
      'status' => 1,
    );

    $where = array('id_kasbon' => $u_id);

    $this->m_kasbon->update_kasbon($where,$data,'kasbon');
    redirect('c_kasbon/tampil_kasbon');
  }
  function hapus_resep($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_kue'=>$id);
        $this->m_resep->ubah_status_resep($where,$data,'resep');
        redirect('c_resep/tampil_resep');
    }
}