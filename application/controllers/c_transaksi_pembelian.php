<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_transaksi_pembelian extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi_pembelian');  
	}

	function tambah_transaksi_pembelian(){
		$data['supplier']=$this->m_transaksi_pembelian->supplier()->result();
		$data['bahan']=$this->m_transaksi_pembelian->bahan()->result();
		$this->load->view('v_tambah_transaksi_pembelian',$data); 
	}

	function tambah_transaksi(){
		$supplier = $this->input->post('supplier');
		$metode = $this->input->post('metode');
		$tgl = $this->input->post('tanggalPembelian');
		$tanggal = date('Y-m-d', strtotime($tgl));
		$checks = $this->input->post("counter");

		$data = array(
            'id_supplier' => $supplier,
            'tanggal_pembelian' => $tanggal,
            'status_pembayaran' => $metode,
        );
        
        $id = $this->m_transaksi_pembelian->tambah_transaksi($data,'transaksi_pembelian');

        //$id['data'] = $this->m_transaksi_pembelian->getid()->result();
        foreach ($id['data'] as $list) {
        	 $b = $list->id_transaksi_pembelian;
        }

		if($checks !=""){
			foreach($checks as $a){
				$data1 = array(
					"id_transaksi_pembelian"=>$id,
					"id_bahan" => $this->input->post("bahan".$a),
					"jumlah" => $this->input->post("jumlah".$a),
					"satuan" => $this->input->post("satuanBahan".$a),
					"harga" => $this->input->post("harga".$a),
					"status" => 1
				);
				$where = array('id_bahan' => $this->input->post("bahan".$a));
				$this->m_transaksi_pembelian->tambah_transaksi($data1,'detail_transaksi_pembelian');
				//$this->m_transaksi_pembelian->update_stok($where,$data,'stok_bahan');

			}
		}

        redirect('c_transaksi_pembelian/tampil_transaksi');
	}

	function tampil_transaksi(){

		$data['pembelian']=$this->m_transaksi_pembelian->tampil_transaksi()->result();
		$data['detail']=$this->m_transaksi_pembelian->tampil_detail_transaksi_pembelian()->result();
		$this->load->view('v_transaksi_pembelian',$data);
	}
	function modal($id_transaksi_pembelian){
		$where = array('detail_transaksi_pembelian.id_transaksi_pembelian'=>$id_transaksi_pembelian);
		$data['detail'] = $this->m_transaksi_pembelian->tampil_detail_transaksi_pembelian($where)->result();
		$this->load->view('modal_transaksi_pembelian',$data);
	}
	
}
?>