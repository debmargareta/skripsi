<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_karyawan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_karyawan');
    }
    
    function lihat_tambah_karyawan(){
        $this->load->view('v_tambah_karyawan.php'); 
    }
    
    function tambah_karyawan(){
        $nama = $this->input->post('namaKaryawan');
        $alamat = $this->input->post('alamatKaryawan');
        $telp = $this->input->post('noKaryawan');
        $gaji = $this->input->post('gajiKaryawan');
        $tgl = $this->input->post('tanggal');
        $tanggal = date('Y-m-d', strtotime($tgl));
        $peran = $this->input->post('peranKaryawan');
        
        $data = array(
            'nama_karyawan' => $nama,
            'alamat_karyawan' => $alamat,
            'no_telp_karyawan' => $telp,
            'gaji_harian' => $gaji,
            'tanggal_kerja' => $tanggal,
            'peran' => $peran,
            'status' => 1
        );
        
        $this->m_karyawan->tambah_karyawan($data,'karyawan');
        redirect('c_karyawan/tampil_karyawan');
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