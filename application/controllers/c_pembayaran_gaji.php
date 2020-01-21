<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_pembayaran_gaji extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_pembayaran_gaji');
  }

  public function tampil_pembayaran_gaji(){
    $data['bayar_gaji'] = $this->m_pembayaran_gaji->tampil_pembayaran_gaji()->result();
    $this->load->view('v_gaji', $data); // Load view v_kasbon.php
  }
  public function tampil_tabel_gaji($id){
    $where =$id;
    $data['tbl_gaji'] = $this->m_pembayaran_gaji->tabel_gaji($where)->result();
    $this->load->view('v_tabel_gaji', $data); // Load view v_kasbon.php
  }

  public function tampil_tambah_pembayaran(){
    $data['pilihkaryawan']=$this->m_pembayaran_gaji->pilihkaryawan()->result();
    $this->load->view('v_tambah_pembayaran_gaji.php',$data);
  }

  public function tambah_pembayaran_gaji(){
    $idkaryawan = $this->input->post('idKaryawan');
    $tgl_pulang = $this->input->post('tglPulang');
    $tanggal= date('Y-m-d', strtotime($tgl_pulang));
    $jml_absen = $this->input->post('absen');

    $where = $idkaryawan;
    $karyawan = $this->m_pembayaran_gaji->get_tabel_karyawan($where)->result();
    foreach ($karyawan as $list) {
      $nama = $list->nama_karyawan;
      $tgl_masuk = $list->tanggal_kerja;
      $gajiharian = $list->gaji_harian;
    }
    $tglmasuk= date('Y-m-d', strtotime($tgl_masuk));
    $date_masuk = new DateTime($tgl_masuk);
    $date_pulang = new DateTime($tgl_pulang);
    $total_hari = $date_pulang->diff($date_masuk);
    $hari_kotor= $total_hari->days;

    $kasbon = $this->m_pembayaran_gaji->get_total_kasbon($where,$tglmasuk)->row();
    $jml_kasbon = $kasbon->jumlahkasbon;

    $total_hari_bersih = $hari_kotor - $jml_absen;
    $gaji_kotor = $total_hari_bersih*$gajiharian;
    $gaji_bersih = $gaji_kotor - $jml_kasbon;

    $data = array(
            'id_karyawan' => $idkaryawan,
            'tanggal_pulang' => $tanggal,
            'total_hari_kotor' => $hari_kotor,
            'jumlah_absen' => $jml_absen,
            'total_hari_bersih'=> $total_hari_bersih,
            'gaji_kotor' => $gaji_kotor,
            'jumlah_kasbon' => $jml_kasbon,
            'gaji_bersih' => $gaji_bersih,
            'status' => 1
    );
    
    
    // $data1=array(
    //   'id' => $idkaryawan,
    //   'nama' => $nama,
    //   'tanggal_masuk' => $tgl_masuk,
    //   'tanggal_pulang' => $tanggal,
    //   'total_hari' => $hari_kotor,
    //   'absen' => $jml_absen,
    //   'gaji_harian' => $gajiharian,
    //   'kasbon' => $jml_kasbon
    // );

   //print_r($data);

   $this->m_pembayaran_gaji->tambah_pembayaran_gaji($data,'pembayaran_gaji');
   redirect('c_pembayaran_gaji/tampil_pembayaran_gaji');
        
    //$this->load->view("v_tabel_gaji.php",$data1);
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