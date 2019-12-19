<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_transaksi_penjualan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_transaksi_penjualan');
        $this->load->helper('kode');
    }
    
    function lihat_tambah_penjualan(){
        $row=$this->m_transaksi_penjualan->tampil_penjualan()->num_rows();
        $data['kode_penjualan'] = kodePenjualan($row);
        $data['pesanan']= $this->m_transaksi_penjualan->pesanan()->result();
        $this->load->view('v_tambah_transaksi_penjualan.php',$data); 
    }
    
    function tambah_penjualan(){
        $row=$this->m_transaksi_penjualan->tampil_penjualan()->num_rows();
        $data['kode_penjualan'] = kodePenjualan($row);
        $kode = $data['kode_penjualan'];
        $id = $this->input->post('idPesanan');
       // $kode = $this->input->post('kode');
        $metode = $this->input->post('metode');
        $nominal = $this->input->post('nominal');
        $tgl = date('Y-m-d');
        
        $data = array(
            'kode_pesanan' => $id,
            'kode_penjualan' => $kode,
            'tanggal' => $tgl,
            'total_harga' => $tgl,
            'status_pembayaran' => $metode,
        );
        
        $this->m_transaksi_penjualan->tambah_penjualan($data,'transaksi_penjualan');

        $data2 = array(
            'status_transaksi' => 1,
        );
        $where = array('kode_pesanan' => $id);
        $this->m_transaksi_penjualan->update_status_transaksi($where, $data2,'pesanan');
        redirect('c_transaksi_penjualan/tampil_penjualan');
    }
    
    function tampil_penjualan(){
        $data['tampil'] = $this->m_transaksi_penjualan->tampil_penjualan()->result();
        $data['tampil1'] = $this->m_transaksi_penjualan->detail_penjualan()->result();
        $this->load->view('v_transaksi_penjualan.php',$data);
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
    function get_id_pesanan(){
         $id = $this->input->post('kode_pesanan');
         $data = $this->m_transaksi_penjualan->get_id_pesanan($id)->result();
         echo json_encode($data);
     }
}
?>