<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_pembayaran_gaji extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_kasbon');
  }

  public function tampil_kasbon(){
    $data['kasbon'] = $this->m_kasbon->tampil_kasbon()->result();
    $this->load->view('v_kasbon', $data); // Load view v_kasbon.php
  }

  public function tampil_tambah_pembayaran(){
    $data['pilihkaryawan']=$this->m_kasbon->pilihkaryawan()->result();
    $this->load->view('v_tambah_pembayaran_gaji.php',$data);
  }

  public function save(){
    $idkaryawan = $this->input->post('idKaryawan');
    $jumlahkasbon = $this->input->post('jumlahKasbon');
    $tanggalkasbon = $this->input->post('tanggalKasbon');
    $tanggal= date('Y-m-d', strtotime($tanggalkasbon));

    $data = array($idkaryawan,$jumlahkasbon,$tanggal);
    $this->m_kasbon->save_batch($data);

    redirect('c_kasbon/tampil_kasbon');
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
  function hapus_kasbon($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_kasbon'=>$id);
        $this->m_kasbon->ubah_status_kasbon($where,$data,'kasbon');
        redirect('c_kasbon/tampil_kasbon');
    }
}