<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_beranda');
		$this->load->library('session');
    }

	public function index(){
		$this->load->view('v_login.php');
	}
    function proses_login(){
        $tangkapUsername = $this->input->post('username');
        $tangkapPassword = $this->input->post('password');
        
        $where = array(
            'username' => $tangkapUsername,
            'katasandi' => md5($tangkapPassword)
        );
        
         $id['data'] = $this->m_login->getID($tangkapUsername)->result();
        
        foreach($id['data'] as $list){
            $a = $list->id_admin;
            $b = $list->jabatan_admin;
            $c = $list->status;
            $d = $list->nama_admin;
        }
          
        $ceklogin = $this->m_login->cek_login('admin',$where)->num_rows();
        if($ceklogin>0){
            if($c==1){
                $data_session = array(
                    'nama_admin' => $d, 
                    'username' => $tangkapUsername, 
                    'jabatan_admin' => $b, 
                    'id_admin' => $a,
                );
                $this->session->set_userdata($data_session);
                if($b == 1){
                    redirect('c_login/admin');
                }
                else{
                    redirect('c_login/admin');
                }
                
            }
            else{
                echo "<script>alert('Akun di nonaktifkan')</script>";
                $this->load->view('v_login.php'); 
                //$hasil = json_encode(array('type'=> 'error', 'text'=> 'Akun dinonaktifkan'));
            }
        }
        else{
            echo "<script>alert('masukkan username dan password yang benar')</script>";
            $this->load->view('v_login.php'); 
            //$hasil = json_encode(array('type'=> 'error','text' => 'Username atau Kata Sandi Tidak Valid'));
        }
        //die($hasil);
    }
    
    function admin(){
        $data['admin'] = $this->m_beranda->tampil_admin()->result();
        $data['username'] = $this->session->admin_username;
        //$data['notification'] = $this->m_Project->notification()->result();
        $this->load->view('v_beranda.php',$data); 
    }
}
