<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_register extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_register');
    }
    
    function index(){
        $this->load->view('v_register.php'); 
    }
    
    function insert_admin(){
        $username = $this->input->post('username');
        $nama_admin = $this->input->post('nama');
        $password = $this->input->post('password');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $jabatan = $this->input->post('jabatan');
        
        $data = array(
            'username' => $username,
            'nama_admin' => $nama_admin,
            'katasandi' => md5($password),
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan_admin' => $jabatan,
        );
        
        $this->m_register->insert_admin($data,'admin');
        redirect('c_login/index');
    }
    
    function tampil_supplier(){
        $data['tampil'] = $this->m_supplier->tampil_supplier()->result();
        $this->load->view('v_supplier.php',$data);
    }
    
    function edit_supplier($idsupplier){
        $where = array('id_supplier'=>$idsupplier);
        $data['edit_supplier'] = $this->m_supplier->edit($where,'supplier')->result();
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
        $this->m_supplier->hapus_supplier($where,$data,'supplier');
        redirect('c_supplier/tammpil_supplier');
    }
}
?>