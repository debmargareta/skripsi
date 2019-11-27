<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_supplier extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_supplier');
    }
    
    function lihat_tambah_supplier(){
        $this->load->view('v_tambah_supplier.php'); 
    }
    
    function tambah_supplier(){
        $nama = $this->input->post('namaSupplier');
        $nama_toko = $this->input->post('namaToko');
        $alamat = $this->input->post('alamatToko');
        $telp = $this->input->post('noToko');
        
        $data = array(
            'nama_supplier' => $nama,
            'nama_toko' => $nama_toko,
            'alamat_supplier' => $alamat,
            'no_telp_supplier' => $telp,
            'status' => 1,
        );
        
        $this->m_supplier->tambah_supplier($data,'supplier');
        redirect('c_supplier/tampil_supplier');
    }
    
    function tampil_supplier(){
        $data['tampil'] = $this->m_supplier->tampil_supplier()->result();
        $this->load->view('v_supplier.php',$data);
    }
    
    function edit_supplier($idsupplier){
        $where = array('id_supplier'=>$idsupplier);
        $data['edit_supplier'] = $this->m_supplier->edit_supplier($where,'supplier')->result();
        $this->load->view('v_edit_supplier.php',$data);
    }
    
    function update_supplier(){
        $u_id_supplier = $this->input->post('idSupplier');
        $u_nama_supplier = $this->input->post('namaSupplier');
        $u_nama_toko = $this->input->post('namaToko');
        $u_alamat_supplier = $this->input->post('alamatToko');
        $u_no_telp_supplier = $this->input->post('noToko');
        
        $data = array(
            'id_supplier' =>$u_id_supplier,
            'nama_supplier' =>$u_nama_supplier,
            'nama_toko' =>$u_nama_toko,
            'alamat_supplier' =>$u_alamat_supplier,
            'no_telp_supplier' =>$u_no_telp_supplier,
            'status' =>1,
        );
        $where = array('id_supplier' => $u_id_supplier);
        
        $this->m_supplier->update_supplier($where,$data,'supplier');
        redirect('c_supplier/tampil_supplier');
    }
    
    function hapus_supplier($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_supplier'=>$id);
        $this->m_supplier->ubah_status_supplier($where,$data,'supplier');
        redirect('c_supplier/tampil_supplier');
    }
}
?>