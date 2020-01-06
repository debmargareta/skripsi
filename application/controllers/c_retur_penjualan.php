<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_retur_penjualan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_retur_penjualan');
        $this->load->helper('kode'); 
    }
    
    function tampil_tambah_retur(){
        $row=$this->m_retur_penjualan->tampil_retur()->num_rows();
        $data['kode_retur'] = kodeRetur($row);
        $data['tr_penj']= $this->m_retur_penjualan->tr_penjualan()->result();
        $this->load->view('v_tambah_retur.php',$data); 
    }
    
    function tambah_retur(){
        $kode = $this->input->post('kodeRetur');
        $kode_penj = $this->input->post('kode_penjualan');
        $tgl = date('Y-m-d');
        $checks = $this->input->post("counter");
        $checks0 = $this->input->post("counter0");

        $data = array(
            'kode_retur' => $kode,
            'kode_penjualan' => $kode_penj,
            'tanggal'=>$tgl,
            'status' => 1,
        );
        $this->m_retur_penjualan->tambah_retur($data,'retur_penjualan');

        if($checks !=""){
            foreach($checks as $a){
                $data1 = array(
                    'kode_retur'=>$kode,
                    'id_kue'=>$this->input->post('id_kue'.$a),
                    'jumlah_retur'=>$this->input->post('jumlah_retur'.$a),
                    'satuan'=>$this->input->post('satuan'.$a),
                    'status'=>1,
                );
                $this->m_retur_penjualan->tambah_retur($data1,'detail_retur_penjualan');
                $where = $this->input->post('id_kue'.$a);
                $stok_kue = $this->m_retur_penjualan->getstokkue($where)->row();
                $stok = $stok_kue->stok;

                if($this->input->post('satuan'.$a)=='Lusin'){
                    $toples = $this->input->post('jumlah_retur'.$a)*12;
                    $update_stok_kue = $stok + $toples;

                }
                else{
                    $update_stok_kue = $stok+ $this->input->post('jumlah_retur'.$a);
                }
                $data2 = array(
                    "stok" => $update_stok_kue
                );
                $where1 = array('id_kue' => $this->input->post('id_kue'.$a));
                $this->m_retur_penjualan->update_retur($where1,$data2,'kue');



                $where2 = $this->input->post('kode_pesanan'.$a);
                $pesanan = $this->m_retur_penjualan->getpesanan($where2)->result();
                foreach ($pesanan as $get_pesanan) {
                    $get_jumlah = $get_pesanan->jumlah;
                    $get_satuan = $get_pesanan->satuan;
                }
                
                if($this->input->post('satuan'.$a)=='Lusin'){
                    $toples1 = $this->input->post('jumlah_retur'.$a)*12;
                    $update_pesanan = $get_jumlah-$toples1;
                }
                else{
                    $update_pesanan = $get_jumlah - $this->input->post('jumlah_retur'.$a); 
                }

                $data3 = array(
                    "jumlah" => $update_pesanan
                );
                $where3 = array('kode_pesanan' => $this->input->post('kode_pesanan'.$a));
                $this->m_retur_penjualan->update_retur($where3,$data3,'detail_pesanan');
            }
        }
        redirect('c_retur_penjualan/tampil_retur');
    }
    function tampil_retur(){
        $data['tampil'] = $this->m_retur_penjualan->tampil_retur()->result();
        $data['detail'] = $this->m_retur_penjualan->get_kode()->result();
        $this->load->view('v_retur.php',$data);
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
     $data = $this->m_retur_penjualan->get_id_transaksi($id)->result();
   // $data2 = $this->m_pembayaran_hutang->totalharga($id)->result();
   // $hasil = array_merge($data, $data2);
     echo json_encode($data);
 }
}
?>