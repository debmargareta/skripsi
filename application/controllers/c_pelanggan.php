<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_pelanggan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_pelanggan');
    }
    
    function lihat_tambah_pelanggan(){
        $this->load->view('v_tambah_pelanggan.php'); 
    }
    
    function tambah_pelanggan(){
        $nama = $this->input->post('namaPelanggan');
        $alamat = $this->input->post('alamatPelanggan');
        $telp = $this->input->post('noPelanggan');
        
        $data = array(
            'nama_pelanggan' => $nama,
            'alamat_pelanggan' => $alamat,
            'no_telp_pelanggan' => $telp,
            'status' => 1,
        );
        
        $this->m_pelanggan->tambah_pelanggan($data,'pelanggan');
        redirect('c_pelanggan/tampil_pelanggan');
    }
    
    function tampil_pelanggan(){
        $data['tampil'] = $this->m_pelanggan->tampil_pelanggan()->result();
        $this->load->view('v_pelanggan.php',$data);
    }
    
    function edit_pelanggan($idpelanggan){
        $where = array('id_pelanggan'=>$idpelanggan);
        $data['edit_pelanggan'] = $this->m_pelanggan->edit_pelanggan($where,'pelanggan')->result();
        $this->load->view('v_edit_pelanggan.php',$data);
    }
    
    function update_pelanggan(){
        $u_id = $this->input->post('idPelanggan');
        $u_nama = $this->input->post('namaPelanggan');
        $u_alamat = $this->input->post('alamatPelanggan');
        $u_no_telp = $this->input->post('noPelanggan');
        
        $data = array(
            'id_pelanggan' =>$u_id,
            'nama_pelanggan' =>$u_nama,
            'alamat_pelanggan' =>$u_alamat,
            'no_telp_pelanggan' =>$u_no_telp,
            'status' =>1,
        );
        $where = array('id_pelanggan' => $u_id);
        
        $this->m_pelanggan->update_pelanggan($where,$data,'pelanggan');
        redirect('c_pelanggan/tampil_pelanggan');
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