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
            'id_transaksi_pembelian' => $id,
            'nominal_bayar' => $nominal,
            'tanggal_pembayaran' => $tgl,
            'status' => 1,
        );
        // $data1 = $this->m_pembayaran_hutang->tampil_pembayaran()->result();
        
        // foreach ($data1 as $getid) {
        //     $id_transaksi = $getid->id_transaksi_pembelian;
        //     $bayar = $getid->nominal_bayar;
        // }

        $get_hutang = $this->m_pembayaran_hutang->gethutang()->result();

        foreach ($get_hutang as $getnominal) {
            $total = $getnominal->total_harga;
        }
        echo $total;

        //if($nominal < $total){

            $hasil = $total - $nominal;

            $data2 = array(
                "total_harga"=>$hasil,
            );

            $where = array('id_transaksi_pembelian'=> $id);
            $this->m_pembayaran_hutang->update_pembayaran($where, $data2,'transaksi_pembelian');
            $this->m_pembayaran_hutang->tambah_pembayaran($data,'pembayaran_hutang');
            redirect('c_pembayaran_hutang/tampil_pembayaran');
       // }
       //  else{
       //      echo "<script>alert('test')</script>";
       //      redirect('c_pembayaran_hutang/lihat_tambah_pembayaran');
       //      $this->load->view('v_tambah_pembayaran_hutang.php');
       //  }
        
  }

  function tampil_pembayaran(){
    $data['tampil'] = $this->m_pembayaran_hutang->tampil_pembayaran()->result();
    $this->load->view('v_pembayaran_hutang.php',$data);
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
function get_id_transaksi(){
   $id = $this->input->post('id_transaksi_pembelian');
   $data = $this->m_pembayaran_hutang->get_id_transaksi($id)->result();
   // $data2 = $this->m_pembayaran_hutang->totalharga($id)->result();
   // $hasil = array_merge($data, $data2);
   echo json_encode($data);
}
}
?>