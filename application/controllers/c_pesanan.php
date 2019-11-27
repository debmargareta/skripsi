<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_pesanan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_pesanan');  
	}

	function tampil_tambah_pesanan(){
		$data['pelanggan']=$this->m_pesanan->pelanggan()->result();
		$data['kue']=$this->m_pesanan->kue()->result();
		$this->load->view('v_tambah_pesanan',$data); 
	}

	function tambah_pesanan(){
		$supplier = $this->input->post('pelanggan');
		$admin = $this->session->id_admin;
		$tglpesan = $this->input->post('tanggalPemesanan');
		$tanggalpesan = date('Y-m-d');
		$tglambil = $this->input->post('tanggalPembelian');
		$tanggalambil = date('Y-m-d', strtotime($tglambil));
		$checks = $this->input->post("counter");

		$data = array(
            'id_pelanggan' => $supplier,
            'id_admin'=>$admin,
            'tanggal_pesanan' => $tanggalpesan,
            'tanggal_pengambilan' => $tanggalambil,
        );
        
        $id = $this->m_pesanan->tambah_pesanan($data,'pesanan');

        //$id['data'] = $this->m_transaksi_pembelian->getid()->result();

		if($checks !=""){
			foreach($checks as $a){
				$satuan = $this->input->post("satuan".$a);
				if($satuan == "Lusin"){
					$total = $satuan*12;
				}
				$data1 = array(
					"id_pesanan"=>$id,
					"id_kue" => $this->input->post("kue".$a),
					"jumlah" => $this->input->post("jumlah".$a),
				);
				$where = array('id_bahan' => $this->input->post("bahan".$a));
				$this->m_pesanan->tambah_pesanan($data1,'detail_pesanan');
				//$this->m_transaksi_pembelian->update_stok($where,$data,'stok_bahan');

			}
		}

        redirect('c_pesanan/tampil_pesanan');
	}


	function tampil_pesanan(){
		$data['pesanan']=$this->m_pesanan->tampil_pesanan()->result();
		$this->load->view('v_pesanan',$data);

	}
}
?>