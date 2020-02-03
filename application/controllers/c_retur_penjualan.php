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

        

        if($checks !=""){
            $u_ttl_harga=0;
            foreach($checks as $a){
                $jumlah_pesan = $this->input->post('jml_pesan'.$a);
                $c = $this->input->post('jumlah_retur'.$a);


                //cek satuan yang diinput
                if($this->input->post('satuan'.$a)=="pilih"){
                    echo '<script type="text/javascript">
                            alert("Pilih satuan retur kue");
                        </script>';
                }
                else{
                    //cek retur biar gk lebh gede dr yg dipesen
                    if($jumlah_pesan>$c){
                        
                        //kaliin jumlah retur ke toples
                        if($this->input->post('satuan'.$a)=="Lusin"){
                            $b = $c*12;
                        }
                        else{
                            $b=$c;
                        }

                         $data1 = array(
                            'kode_retur'=>$kode,
                            'id_kue'=>$this->input->post('id_kue'.$a),
                            'jumlah_retur'=>$b,
                            'satuan'=>"Toples",
                            'harga'=>$this->input->post('hargakue'.$a),
                            'status'=>1,
                        );
                        $this->m_retur_penjualan->tambah_retur($data1,'detail_retur_penjualan');

                        //update stok kue(nambah stok ue)
                        $where = $this->input->post('id_kue'.$a);
                        $stok_kue = $this->m_retur_penjualan->getstokkue($where)->row();
                        $stok = $stok_kue->stok;
                        $update_stok_kue = $stok + $b;
                        $data2 = array(
                            "stok" => $update_stok_kue
                        );
                        $where1 = array('id_kue' => $this->input->post('id_kue'.$a));
                        $this->m_retur_penjualan->update_retur($where1,$data2,'kue');

                        //update jumlah pesanan(dikurang retur)
                        $sisa_pesanan = (int)$jumlah_pesan - (int)$c;
                        echo $sisa_pesanan;
                        $data3 = array(
                            'jumlah'=>$sisa_pesanan,
                        );
                        $where2 = array(
                            'kode_pesanan'=> $this->input->post('kode_pesanan'.$a),
                            'id_kue' => $this->input->post('id_kue'.$a),
                        );
                        $this->m_retur_penjualan->update_retur($where2,$data3,'detail_pesanan');

                        //update total harga di transaksi penjualan
                        $u_ttl_harga += $sisa_pesanan*(int)$this->input->post('hargakue'.$a);
                        
                        
                    }
                    else{
                        echo '<script type="text/javascript">
                            alert("Jumlah retur lebih besar dari pesanan");
                        </script>';
                        
                    }
                } 
            }
            $data4 = array(
                'total_harga'=>$u_ttl_harga,
            );
            $where3 = array(
                'kode_penjualan'=> $kode_penj,
            );
            $this->m_retur_penjualan->update_retur($where3,$data4,'transaksi_penjualan');

            $data = array(
                'kode_retur' => $kode,
                'kode_penjualan' => $kode_penj,
                'tanggal'=>$tgl,
                'status' => 1,
            );
            $this->m_retur_penjualan->tambah_retur($data,'retur_penjualan');

        }
        redirect('c_retur_penjualan/tampil_retur');
    }
    function tampil_retur(){
        $data['tampil'] = $this->m_retur_penjualan->tampil_retur()->result();
        $data['detail'] = $this->m_retur_penjualan->get_kode()->result();
        $this->load->view('v_retur.php',$data);
    }

    function edit_retur($id){
        $where = array('kode_retur'=>$id);
        $data['edit_retur'] = $this->m_retur->edit_retur($where,'supplier')->result();
        $this->load->view('v_edit_retur.php',$data);
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