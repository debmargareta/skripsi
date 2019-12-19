<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_pesanan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_pesanan');  
		$this->load->helper('kode');
	}

	function tampil_tambah_pesanan(){
		$row=$this->m_pesanan->tampil_pesanan()->num_rows();
		$data['kode_pesanan'] = kodePesanan($row);
		$data['pelanggan']=$this->m_pesanan->pelanggan()->result();
		$data['kue']=$this->m_pesanan->kue()->result();
		$this->load->view('v_tambah_pesanan',$data); 
	}

	function tambah_pesanan(){
		$row=$this->m_pesanan->tampil_pesanan()->num_rows();
		$data['kode_pesanan'] = kodePesanan($row);
		$kode = $data['kode_pesanan'];
		$pelanggan = $this->input->post('pelanggan');
		//$kode = $this->input->post('kode');
		$admin = $this->session->id_admin;
		$tanggalpesan = date('Y-m-d');
		$tglambil = $this->input->post('tanggalPengambilan');
		$tanggalambil = date('Y-m-d', strtotime($tglambil));
		$checks = $this->input->post("counter");

		$data = array(
			'kode_pesanan' => $kode,
			'id_pelanggan' => $pelanggan,
			'id_admin'=>$admin,
			'tanggal_pesanan' => $tanggalpesan,
			'tanggal_pengambilan' => $tanggalambil,
			'status_transaksi' => 0,
			'status' => 1,
		);

		$id = $this->m_pesanan->tambah_pesanan($data,'pesanan');

        //$id['data'] = $this->m_transaksi_pembelian->getid()->result();
        // $getkode = $this->m_pesanan->getkode()->result();
        // foreach ($getkode as $kode) {
        // 	$get_kode = $kode->kode_pesanan;
        // }

		if($checks !=""){
			foreach ($checks as $a) {
				$data1 = array(
					"kode_pesanan"=>$kode,
					"id_kue" => $this->input->post("kue".$a),
					"jumlah" => $this->input->post("jumlah".$a),
					"satuan" => $this->input->post("satuan".$a),
				);

				$this->m_pesanan->tambah_pesanan($data1,'detail_pesanan');
			//$this->m_transaksi_pembelian->update_stok($where,$data,'stok_bahan');
			}
		}
		redirect('c_pesanan/tampil_pesanan');
	}


	function tampil_pesanan(){
		$data['pesanan']=$this->m_pesanan->tampil_pesanan()->result();
		$data['detail_pesanan']=$this->m_pesanan->get_detail_pesanan()->result();
		$this->load->view('v_pesanan',$data);

	}
	function edit_pesanan($idpesanan){
		$where = array('kode_pesanan'=>$idpesanan);
		$where2 = $idpesanan;
		$data['edit_pesanan'] = $this->m_pesanan->edit_pesanan($where,'pesanan')->result();
		$data['kue'] = $this->m_pesanan->kue()->result();
		$data['pelanggan'] = $this->m_pesanan->pelanggan()->result();
		$data['edit_detail'] = $this->m_pesanan->detail_pesanan($where2)->result();
		$this->load->view('v_edit_pesanan.php',$data);
	}
	function update_pesanan(){
		$row=$this->m_pesanan->tampil_pesanan()->num_rows();
		$data['kode_pesanan'] = kodePesanan($row);
		$kode = $data['kode_pesanan'];
		$pelanggan = $this->input->post('pelanggan');
		$tgl = $this->input->post('tanggalPengambilan');
		$tanggal = date('Y-m-d', strtotime($tgl));
		$checks = $this->input->post("counter");

		$data = array(
			'kode_pesanan' => $kode,
			'id_pelanggan' => $pelanggan,
			'tanggal_pengambilan' => $tanggal,
		);
		$where = array('kode_pesanan'=> $kode);
		$this->m_pesanan->update_pesanan($where,$data,'pesanan');

		if($checks !=""){
			foreach($checks as $a){
				$data1 = array(
					"id_kue" => $this->input->post("kue".$a),
					"jumlah" => $this->input->post("jumlah".$a),
					"satuan" => $this->input->post("satuan".$a),
				);

				$where = array('id_detail_pesanan'=> $a);
				$this->m_pesanan->update_pesanan($where,$data1,'detail_pesanan');
			}
		}
		redirect('c_pesanan/tampil_pesanan');
	}
	function hapus_pesanan($id){
		$data = array(
			'status'=>0
		);
		$where= array('kode_pesanan'=>$id);
		$this->m_pesanan->ubah_status_pesanan($where,$data,'pesanan');
		redirect('c_pesanan/tampil_pesanan');
	}	
}
?>