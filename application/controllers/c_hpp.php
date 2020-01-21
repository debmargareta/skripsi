<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_hpp extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_hpp');
    }
    
    function lihat_tambah_hpp(){
        $data['tkl'] = $this->m_hpp->pilih_karyawan()->result();
        $data['kue'] = $this->m_hpp->pilihkue()->result();
        $data['overhead'] = $this->m_hpp->pilihoverhead()->result();
        $this->load->view('v_tambah_hpp.php',$data); 
    }
    
    function save(){
        $tahun = $this->input->post("tahun");
        $bulan = $this->input->post("bulan");
        $checks = $this->input->post("counter");
        $checks1 = $this->input->post("counter1");

        if($checks !=""){
          foreach($checks as $a){
             $data = array(
                "id_karyawan" => $this->input->post("idKaryawan".$a),
            );
             //$this->m_kasbon->tambah_kasbon($data,"kasbon");
         }
     }
     $this->load->view("v_tabel_hpp.php");
     //redirect('c_karyawan/tampil_karyawan');
 }

 function tampil_karyawan(){
    $data['tampil'] = $this->m_karyawan->tampil_karyawan()->result();
    $this->load->view('v_karyawan.php',$data);
}

function edit_karyawan($idkaryawan){
    $where = array('id_karyawan'=>$idkaryawan);
    $data['edit_karyawan'] = $this->m_karyawan->edit_karyawan($where,'karyawan')->result();
    $this->load->view('v_edit_karyawan.php',$data);
}

function update_karyawan(){
    $u_id = $this->input->post('idKaryawan');
    $u_nama = $this->input->post('namaKaryawan');
    $u_alamat = $this->input->post('alamatKaryawan');
    $u_telp = $this->input->post('noKaryawan');
    $u_gaji = $this->input->post('gajiKaryawan');
    $u_tgl = $this->input->post('tanggal');
    $u_tanggal = date('Y-m-d', strtotime($u_tgl));
    $u_peran = $this->input->post('peranKaryawan');

    $data = array(
        'nama_karyawan' => $u_nama,
        'alamat_karyawan' => $u_alamat,
        'no_telp_karyawan' => $u_telp,
        'gaji_harian' => $u_gaji,
        'tanggal_kerja' => $u_tanggal,
        'peran' => $u_peran,
        'status' => 1
    );
    $where = array('id_karyawan' => $u_id);

    $this->m_karyawan->update_karyawan($where,$data,'karyawan');
    redirect('c_karyawan/tampil_karyawan');
}

function hapus_pelanggan($id){
    $data = array(
        'status'=>0
    );
    $where= array('id_pelanggan'=>$id);
    $this->m_pelanggan->ubah_status_pelanggan($where,$data,'pelanggan');
    redirect('c_pelanggan/tampil_pelanggan');
}
}
?>