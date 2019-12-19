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
        $id = $this->input->post('id_transaksi_penjualan');
        $total = $this->input->post('totalCicilan');
        $nominal = $this->input->post('nominal');
        $tgl = date('Y-m-d');
        
        $data = array(
            'kode_penjualan' => $id,
            'jenis_cicilan' => $nominal,
            'status' => 1,
        );

        $idpiutang = $this->m_piutang->tambah_piutang($data,'piutang');

        $data1 = array(
            'id_piutang'=>$idpiutang,
            'nominal_cicilan'=>$nominal,
            'tanggal_pembayaran'=> date('Y-m-d'),
        );
        $this->m_piutang->tambah_piutang($data1,'detail_piutang');
        // $data1 = $this->m_pembayaran_hutang->tampil_pembayaran()->result();
        
        // foreach ($data1 as $getid) {
        //     $id_transaksi = $getid->id_transaksi_pembelian;
        //     $bayar = $getid->nominal_bayar;
        // }

        $get_piutang = $this->m_piutang->getpiutang()->result();

        foreach ($get_piutang as $getnominal) {
            $total = $getnominal->total_harga;
        }
        echo $total;

        //if($nominal < $total){

        $hasil = $total - $nominal;

        $data2 = array(
            "total_harga"=>$hasil,
        );

        $where = array('kode_penjualan'=> $idpiutang);
        $this->m_piutang->update_piutang($where, $data2,'transaksi_penjualan');
        //$this->m_pembayaran_hutang->tambah_pembayaran($data,'pembayaran_hutang');
        redirect('c_pembayaran_hutang/tampil_pembayaran');
       // }
       //  else{
       //      echo "<script>alert('test')</script>";
       //      redirect('c_pembayaran_hutang/lihat_tambah_pembayaran');
       //      $this->load->view('v_tambah_pembayaran_hutang.php');
       //  }
        
    }
    function tampil_pembayaran(){
        $data['tampil'] = $this->m_piutang->tampil_pembayaran()->result();
        $this->load->view('v_piutang.php',$data);
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
     $id = $this->input->post('kode_penjualan');
     $data = $this->m_piutang->get_id_transaksi($id)->result();
   // $data2 = $this->m_pembayaran_hutang->totalharga($id)->result();
   // $hasil = array_merge($data, $data2);
     echo json_encode($data);
 }
}
?>