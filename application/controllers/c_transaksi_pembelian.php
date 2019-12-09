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
				
				$this->m_transaksi_pembelian->tambah_transaksi($data1,'detail_transaksi_pembelian');

				// $data2 = array(
				// 	"stok"=>
				// )
				// $where = array('id_bahan' => $this->input->post("bahan".$a));
				// $this->m_transaksi_pembelian->update_stok($where,$data,'stok_bahan');

				$total = $this->m_transaksi_pembelian->totalharga($id)->result();

				foreach($total as $total1){
					$total1->totalharga;
				}

				$data2 = array(
					"total_harga"=>$total1->totalharga,
				);
				
				$where = array('id_transaksi_pembelian'=> $id);
				$this->m_transaksi_pembelian->update_transaksi($where, $data2,'transaksi_pembelian');

			}
			
		}

		redirect('c_transaksi_pembelian/tampil_transaksi');
	}

	function tampil_transaksi(){
		$data['pembelian']=$this->m_transaksi_pembelian->tampil_transaksi()->result();
		$data['detail']=$this->m_transaksi_pembelian->tampil_detail_transaksi_pembelian()->result();
		$this->load->view('v_transaksi_pembelian',$data);
	}

	// function modal($id_transaksi_pembelian){
	// 	$where = array('detail_transaksi_pembelian.id_transaksi_pembelian'=>$id_transaksi_pembelian);
	// 	$data['detail'] = $this->m_transaksi_pembelian->tampil_detail_transaksi_pembelian($where)->result();
	// 	$this->load->view('modal_transaksi_pembelian',$data);
	// }

	function edit_transaksi($idtransaksi){
		$where = array('id_transaksi_pembelian'=>$idtransaksi);
		$where2 = $idtransaksi;
		$data['edit_transaksi'] = $this->m_transaksi_pembelian->edit_transaksi($where,'transaksi_pembelian')->result();
		$data['detail1'] = $this->m_transaksi_pembelian->bahan()->result();
		$data['supplier'] = $this->m_transaksi_pembelian->supplier()->result();
		$data['edit'] = $this->m_transaksi_pembelian->getbahan($where2)->result();
		$this->load->view('v_edit_transaksi_pembelian.php',$data);
	}

	function update_pembelian(){
		$u_id = $this->input->post('idBahan');
		$u_nama = $this->input->post('namaBahan');
		$u_satuan = $this->input->post('satuanBahan');

		$data = array(
			'id_bahan' =>$u_id,
			'nama_bahan' =>$u_nama,
			'satuan_bahan' =>$u_satuan,
			'status' =>1,
		);
		$where = array('id_bahan' => $u_id);

		$this->m_bahan->update_bahan($where,$data,'bahan');
		redirect('c_bahan/tampil_bahan');
	}
	function update_transaksi(){
		$id = $this->input->post('idPembelian');
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
		$where = array('id_transaksi_pembelian'=> $id);

		$id = $this->m_transaksi_pembelian->tambah_transaksi($where, $data,'transaksi_pembelian');

		if($checks !=""){
			foreach($checks as $a){
				$data1 = array(
					"id_bahan" => $this->input->post("bahan".$a),
					"jumlah" => $this->input->post("jumlah".$a),
					"satuan" => $this->input->post("satuan".$a),
					"harga" => $this->input->post("harga".$a),
					"status" => 1
				);

				$where = array('id_detail_transaksi_pembelian'=> $a);
				$this->m_transaksi_pembelian->update_transaksi($where,$data1,'detail_transaksi_pembelian');
			}
		}
		//print_r($data1);
		redirect('c_transaksi_pembelian/tampil_transaksi');
	}
	
}
?>