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
			'id_pelanggan' => $pelanggan,
			'kode_pesanan' => $kode,
			'id_admin'=>$admin,
			'tanggal_pesanan' => $tanggalpesan,
			'tanggal_pengambilan' => $tanggalambil,
			'status' => 1,
		);

		$id = $this->m_pesanan->tambah_pesanan($data,'pesanan');

        //$id['data'] = $this->m_transaksi_pembelian->getid()->result();

		if($checks !=""){
			foreach($checks as $a){
				$satuan = $this->input->post("satuan");
				if($satuan == "Lusin"){
					$total = $this->input->post("jumlah".$a)*12;

					$data1 = array(
						"id_pesanan"=>$id,
						"id_kue" => $this->input->post("kue".$a),
						"jumlah" => $total.$a,
					);
				}
				else{
					$data1 = array(
						"id_pesanan"=>$id,
						"id_kue" => $this->input->post("kue".$a),
						"jumlah" => $this->input->post("jumlah".$a)
					);

				}

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
	function hapus_pesanan($id){
    $data = array(
      'status'=>0
    );
    $where= array('id_pesanan'=>$id);
    $this->m_pesanan->ubah_status_pesanan($where,$data,'pesanan');
    $this->m_pesanan->ubah_status_pesanan($where,$data,'detail_pesanan');
    redirect('c_pesanan/tampil_pesanan');
  }
}
?>