<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_pembayaran_hutang extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_pembayaran_hutang');
    }
    
    function lihat_tambah_pembayaran(){
        $data['hutang']= $this->m_pembayaran_hutang->hutang()->result();
        $this->load->view('v_tambah_pembayaran_hutang.php',$data); 
    }
    
    function tambah_pembayaran(){
        $id = $this->input->post('id_transaksi_pembelian');
        $nominal = $this->input->post('nominal');
        $tgl = date('Y-m-d');
        
        $data = array(
            'kode_pembelian' => $id,
            'nominal_bayar' => $nominal,
            'tanggal_pembayaran' => $tgl,
            'status' => 1,
        );
        $get_hutang = $this->m_pembayaran_hutang->gethutang()->result();

        foreach ($get_hutang as $getnominal) {
            $total = $getnominal->total_harga;
        }

        if($nominal <= $total){

            $hasil = $total - $nominal;

            $data2 = array(
                "total_harga"=>$hasil,
            );

            $where = array('kode_pembelian'=> $id);
            $this->m_pembayaran_hutang->update_pembayaran($where, $data2,'transaksi_pembelian');
            $this->m_pembayaran_hutang->tambah_pembayaran($data,'pembayaran_hutang');
            redirect('c_pembayaran_hutang/tampil_pembayaran');
       }
        else{
            echo "<script>alert('test')</script>";
            redirect('c_pembayaran_hutang/lihat_tambah_pembayaran');
        }
        
  }

  function tampil_pembayaran(){
    $data['tampil'] = $this->m_pembayaran_hutang->tampil_pembayaran()->result();
    $this->load->view('v_pembayaran_hutang.php',$data);
}

function get_id_transaksi(){
   $id = $this->input->post('kode_pembelian');
   $data = $this->m_pembayaran_hutang->get_id_transaksi($id)->result();
   // $data2 = $this->m_pembayaran_hutang->totalharga($id)->result();
   // $hasil = array_merge($data, $data2);
   echo json_encode($data);
}
}
?>