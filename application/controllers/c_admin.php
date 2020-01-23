<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_admin');
    }
    function tampil_ubah_sandi(){
        $this->load->view('v_ubah_kata_sandi.php');
    }
    function ubah_kata_sandi(){
        $tangkapkslama= md5($this->input->post('ksLama'));
        $tangkapksbaru= $this->input->post('ksBaru');
        $tangkapvalidasi = $this->input->post('ksvalidasi');

        $where = array(
            'username' => $this->session->username,
        );
        $cekadmin1 = $this->m_admin->edit($where,'admin')->result();

        foreach($cekadmin1 as $a){
            $ks = $a->katasandi;
        };

        if($tangkapkslama == $ks && $tangkapksbaru==$tangkapvalidasi){
            $data=array(
                'katasandi'=>md5($tangkapvalidasi)
            );

            $this->m_admin->simpan_sandi($where,$data,'admin');
            $this->session->sess_destroy();
            redirect('c_login/index');
        }

        else if($tangkapkslama == $ks && $tangkapksbaru!=$tangkapvalidasi){
            echo "<script>alert('Kata sandi salah')</script>";
            redirect('c_admin/tampil_ubah_sandi');
        }
        else{
            echo "<script>alert('Kata sandi salah')</script>";
            redirect('c_admin/tampil_ubah_sandi');
        }
    }

    function tampil_ubah_profil($id_admin){
        $where = array('id_admin'=>$id_admin);
        $data['edit_admin'] = $this->m_admin->edit($where,'admin')->result();
        $this->load->view('v_edit_profil.php',$data);
    }

    function tampil_admin(){
        $data['admin'] = $this->m_admin->masteradmin()->result();
        $this->load->view('v_master_admin.php',$data);
    }

    function ubah_profil(){
        $tangkapuname= $this->input->post('username');
        $tangkapnama= $this->input->post('nama');
        $tangkapjk = $this->input->post('jk');

        $where = array(
            'username' => $this->session->username,
        );
        $data=array(
            'username'=>$tangkapuname,
            'nama_admin'=>$tangkapnama,
            'jenis_kelamin'=>$tangkapjk
        );
        $this->m_admin->simpan_sandi($where,$data,'admin');
        redirect('c_login/admin');
        
    }
    function updateadmin(){
        $tangkapid = $this->input->post('idadm');
        $tangkapold= $this->input->post('ksLama');
        $tangkapnew= $this->input->post('ksBaru');
        
        $cekpass = array(
            'id_admin' => $tangkapid,
            'password' => md5($tangkapold)
        );
        $cekedit = $this->m_admin->edit($cekpass,"admin")->num_rows();
        if($cekedit>0){
            $data = array(
            'id_admin'=>$tangkapid,
            'email'=>$tangkapmail,
            'nama'=>$tangkapnama,
            'password'=>md5($tangkapnew)
            );
            $where = array(
                'id_admin'=>$tangkapid
            );
            $this->m_admin->update_data($where,$data,'admin');
            redirect('c_admin/index');
        }
        else{
            echo "password yang anda masukkan salah";
        }  
    }
    function tambah_admin(){
        $uname = $this->input->post('uname');
        $nama = $this->input->post('nama');
        $ks = $this->input->post('password');
        $jk = $this->input->post('jk');
        $jabatan = $this->input->post('jabatanadmin');
        
        $data = array(
            'username'=>$uname,
            'nama_admin'=>$nama,
            'katasandi'=>md5($ks),
            'jenis_kelamin'=>$jk,
            'jabatan_admin'=>$jabatan,
            'status'=>1        
        );
       $this->m_admin->insert_table($data,'admin');
       redirect('Welcome/index');   
    }
    function update_hapus($id_admin){
        $data = array(
            'status'=> 0
        );
        $where = array('id_admin'=>$id_admin);
        $this->m_admin->update_hapus($where,$data,'admin');
        redirect('c_admin/tampil_admin');
    }
    function keluar(){
        $this->session->sess_destroy();
        redirect('Welcome/index');
    }

}
