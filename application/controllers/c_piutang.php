<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_piutang extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_piutang');
    }
    
    function tampil_tambah_piutang(){
        $data['piutang']= $this->m_piutang->piutang()->result();
        $this->load->view('v_tambah_piutang.php',$data); 
    }
    
    function tambah_piutang(){
        $idpiutang = $this->input->post('idPiutang');
        $idpenj = $this->input->post('id_transaksi_penjualan');
        $total = $this->input->post('totalCicil');
        $nominal = $this->input->post('nominal');
        $ttl = $this->input->post('total_harga');
        $kodepesanan = $this->input->post('kodepesanan');
        $tgl = date('Y-m-d');

        if($idpenj=="Pilih"){
            echo '<script type="text/javascript">alert("Pilih Kode Transaksi");</script>';
            $data['piutang']= $this->m_piutang->piutang()->result();
            $this->load->view('v_tambah_piutang.php',$data); 
        }
        
        else{
            if($total>0){

                if($nominal>$ttl){
                    echo '<script type="text/javascript">alert("Masukkan nominal dengan benar");</script>';
                        $data['piutang']= $this->m_piutang->piutang()->result();
                        $this->load->view('v_tambah_piutang.php',$data); 
                }
                else{
                    $sisahutang = $ttl-$nominal;
                    $sisacicilan = $total-1;

                    $data = array(
                        'id_piutang'=>$idpiutang,
                        'nominal_cicilan'=>$nominal,
                        'tanggal_pembayaran'=> date('Y-m-d'),
                        'status'=> 1,
                    );
                    $this->m_piutang->tambah_piutang($data,'detail_piutang');

                    $data2 = array(
                        "total_hutang"=>$sisahutang,
                        "jenis_cicilan"=>$sisacicilan,
                    );

                    $where = array('id_piutang'=> $idpiutang);
                    $this->m_piutang->update_piutang($where, $data2,'piutang');
                    redirect('c_piutang/tampil_pembayaran');
                }
            }
        else{
            echo '<script type="text/javascript">
                        alert("TEST");
                    </script>';
            $data['piutang']= $this->m_piutang->piutang()->result();
            $this->load->view('v_tambah_piutang.php',$data); 
        }
        }
        
    }
    function tampil_pembayaran(){
        $data['tampil'] = $this->m_piutang->tampil_pembayaran()->result();
        $data['detail'] = $this->m_piutang->getdetail_piutang()->result();
        $this->load->view('v_piutang.php',$data);
    }

    function edit_piutang($id){
        $where = array('id_detail_piutang'=>$id);
        $data['edit_piutang'] = $this->m_piutang->edit_piutang($where,'detail_piutang')->result();
        $this->load->view('v_edit_piutang.php',$data);
    }

    function update_piutang(){
        $u_id = $this->input->post('id');
        $u_nominal = $this->input->post('nominal');
        $u_tgl = $this->input->post('tgl');
        $u_tanggal = date('Y-m-d', strtotime($u_tgl));

        $data = array(
            'id_detail_piutang' =>$u_id,
            'nominal_cicilan' =>$u_nominal,
            'tanggal_pembayaran' =>$u_tanggal,
            'status' =>1,
        );
        $where = array('id_detail_piutang' => $u_id);

        $this->m_piutang->update_piutang($where,$data,'detail_piutang');
        redirect('c_piutang/tampil_pembayaran');
    }

    function hapus_piutang($id){
        $data1 = $this->m_piutang->get_nominal_cicilan($id)->result();
        foreach ($data1 as $get_detail_piutang) {
            $get_nominal_cicilan = $get_detail_piutang->nominal_cicilan;
            $id_piutang = $get_detail_piutang->id_piutang;
        }
        
        $where2 = $id_piutang;
        $data2 = $this->m_piutang->get_total_hutang($where2)->row();
        $nominal_cicilan = $data2->total_hutang;

        $sisahutang=$get_nominal_cicilan+$nominal_cicilan;

        $data3 = array(
            'total_hutang' =>$sisahutang,
        );
        $where = array('id_piutang' => $id_piutang);

        $this->m_piutang->update_piutang($where,$data3,'piutang');

        $data = array(
            'status'=>0
        );
        $where= array('id_detail_piutang'=>$id);
        $this->m_piutang->ubah_status_piutang($where,$data,'detail_piutang');
        redirect('c_piutang/tampil_pembayaran');
    }
    function get_id_transaksi(){
     $id = $this->input->post('kode_penjualan');
     $data1 = $this->m_piutang->get_id_transaksi($id)->result();
     $data2 = $this->m_piutang->getCicilan($id)->result();
     $data = array(
            'transaksi'=>$data1,
            'cicilan'=>$data2
         );
     echo json_encode($data);
 }
}
?>