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
       //$kode = $this->input->post('kode');
        $metode = $this->input->post('metode');
        $nominal = $this->input->post('nominalcicilan');
        $gtotal = $this->input->post('grandtotal');
        $hsatuan = $this->input->post('hargasatuan');
        $jenis_cicilan = $this->input->post('jnscicilan');
        $total = $this->input->post('totalharga');
        $kue = $this->input->post('idkue');
        $jmlkue = $this->input->post('jumlahkue');
        $flag = true;
        
        //echo $total;
        $tgl = date('Y-m-d');
        if($metode=="Pilih"){
            echo '<script type="text/javascript">
                    alert("Masukkan metode pembayaran");
                </script>';
                $row=$this->m_transaksi_penjualan->tampil_penjualan()->num_rows();
                $data['kode_penjualan'] = kodePenjualan($row);
                $data['pesanan']= $this->m_transaksi_penjualan->pesanan()->result();
                $this->load->view('v_tambah_transaksi_penjualan.php',$data); 

        }
        else{
            if($metode=="Lunas"){
                $data = array(
                    'kode_penjualan' => $kode,
                    'kode_pesanan' => $id,
                    'tanggal' => $tgl,
                    'total_harga' => $gtotal,
                    'nominal_pembayaran' => $gtotal,
                    'status_pembayaran' => $metode,
                    'status_piutang' => 0,
                );
                $this->m_transaksi_penjualan->tambah_penjualan($data,'transaksi_penjualan');

                $data2 = array(
                    'status_transaksi' => 1,
                );
                $where = array('kode_pesanan' => $id);
                $this->m_transaksi_penjualan->update_status_transaksi($where, $data2,'pesanan');

                $data3 = array(
                    'harga' => $hsatuan,
                );
                $where = array('kode_pesanan' => $id);
                $this->m_transaksi_penjualan->update_status_transaksi($where, $data3,'detail_pesanan');
                for($i = 0 ; $i<count($kue); $i++) {
                        $where=array("id_kue"=>$kue[$i]);
                        $where2 = $kue[$i];

                        $jmlhkue = explode(" ", $jmlkue[$i]);
                        if($jmlhkue[1]=="Lusin"){
                            $totaltoples = $jmlhkue[0]*12;
                        }
                        else{
                            $totaltoples = $jmlhkue[0]*1;
                        }
                        //print_r($totaltoples);
                        $stok = $this->m_transaksi_penjualan->getstok($where2)->row();
                        $get_stok_kue = $stok->stok;
                        //echo $get_stok_kue;

                        if($get_stok_kue<$totaltoples){
                            $flag=false;
                            break;   
                        }
                        else{
                            $hasil_akhir = $get_stok_kue-$totaltoples;
                        }
                        $data6 = array(
                            "stok"=>$hasil_akhir,
                        );
                        $this->m_transaksi_penjualan->update_status_transaksi($where,$data6,'kue');
                }
                if($flag == false){
                    echo '<script type="text/javascript">
                                alert("Stok tidak mencukupi");
                            </script>';
                }

                redirect('c_transaksi_penjualan/tampil_penjualan');
            }
            else{
                if($nominal>$gtotal){
                   echo '<script type="text/javascript">
                        alert("Pembayaran kelebihan");
                    </script>';
                    $row=$this->m_transaksi_penjualan->tampil_penjualan()->num_rows();
                    $data['kode_penjualan'] = kodePenjualan($row);
                    $data['pesanan']= $this->m_transaksi_penjualan->pesanan()->result();
                    $this->load->view('v_tambah_transaksi_penjualan.php',$data); 
                }
                else{
                     $data = array(
                    'kode_pesanan' => $id,
                    'kode_penjualan' => $kode,
                    'tanggal' => $tgl,
                    'total_harga' => $gtotal,
                    'nominal_pembayaran' => $nominal,
                    'status_pembayaran' => $metode,
                    );
                    $this->m_transaksi_penjualan->tambah_penjualan($data,'transaksi_penjualan');
                     $data4 = array(
                        'kode_penjualan' => $kode,
                        'total_hutang' => $gtotal-$nominal,
                        'jenis_cicilan' => $jenis_cicilan,
                        'status' => 1,
                    );
                   $id_piutang = $this->m_transaksi_penjualan->tambah_penjualan($data4,'piutang');

                    $data5 = array(
                        'id_piutang' => $nominal,
                        'nominal_cicilan' => $nominal,
                        'tanggal_pembayaran' => $tgl,
                        'status' => 1,
                    );
                    $this->m_transaksi_penjualan->tambah_penjualan($data5,'detail_piutang');
                }

                $data2 = array(
                    'status_transaksi' => 1,
                );
                $where = array('kode_pesanan' => $id);
                $this->m_transaksi_penjualan->update_status_transaksi($where, $data2,'pesanan');

                $data3 = array(
                    'harga' => $hsatuan,
                );
                $where = array('kode_pesanan' => $id);
                $this->m_transaksi_penjualan->update_status_transaksi($where, $data3,'detail_pesanan');
                for($i = 0 ; $i<count($kue); $i++) {
                        $where=array("id_kue"=>$kue[$i]);
                        $where2 = $kue[$i];

                        $jmlhkue = explode(" ", $jmlkue[$i]);
                        if($jmlhkue[1]=="Lusin"){
                            $totaltoples = $jmlhkue[0]*12;
                        }
                        else{
                            $totaltoples = $jmlhkue[0]*1;
                        }
                        //print_r($totaltoples);
                        $stok = $this->m_transaksi_penjualan->getstok($where2)->row();
                        $get_stok_kue = $stok->stok;
                        //echo $get_stok_kue;

                        if($get_stok_kue<$totaltoples){
                            $flag=false;
                            break;   
                        }
                        else{
                            $flag=true;
                            $hasil_akhir = $get_stok_kue-$totaltoples;
                        }
                        $data6 = array(
                            "stok"=>$hasil_akhir,
                        );
                        $this->m_transaksi_penjualan->update_status_transaksi($where,$data6,'kue');
                }
                if($flag == false){
                    echo '<script type="text/javascript">
                                alert("Stok tidak mencukupi");
                            </script>';
                }
                else{
                    echo '<script type="text/javascript">
                                alert("Berhasil");
                            </script>';
                
                }
                redirect('c_transaksi_penjualan/tampil_penjualan');
            }
        }
    }

function tampil_penjualan(){
    $data['tampil'] = $this->m_transaksi_penjualan->tampil_penjualan()->result();
    $data['tampil1'] = $this->m_transaksi_penjualan->detail_penjualan()->result();
    $this->load->view('v_transaksi_penjualan.php',$data);
}

function edit_penjualan($id){
    $where = $id;
    $data['edit_transaksi'] = $this->m_transaksi_penjualan->get_data_edit($where)->result();
    $this->load->view('v_edit_transaksi_penjualan.php',$data);
}

function update_transaksi(){
    $id = $this->input->post('kodepenj');
    $kode = $this->input->post('kodepesanan');
    $metode = $this->input->post('metode');
    $nominal = $this->input->post('nominal');
    $gtotal = $this->input->post('gtotal');
    if($nominal>$gtotal){
        echo "<script>alert('Nilai pembayaran lebih besar dari total harga')</script>";
    }
    else{
        if($metode == "Hutang" && $nominal != $gtotal){
            $data = array(
                'nominal_pembayaran' => $nominal,
                'status_pembayaran' => $metode,
            );
            $where = array('kode_penjualan' => $kode);
            $this->m_transaksi_penjualan->update_transaksi($where,$data,'transaksi_penjualan');
            redirect('c_transaksi_penjualan/tampil_penjualan');
        }
        else if($metode == "Hutang" && $nominal==$gtotal){
            echo "<script>alert('Metode hutang tidak m')</script>";
            redirect('c_transaksi_penjualan/edit_penjualan/'.$id.'');
        }
        else if ($metode=="Lunas" && $nominal==$gtotal) {
            $data = array(
                'nominal_pembayaran' => $nominal,
                'status_pembayaran' => $metode,
            );
            $where = array('kode_penjualan' => $kode);
            $this->m_transaksi_penjualan->update_transaksi($where,$data,'transaksi_penjualan');
            redirect('c_transaksi_penjualan/tampil_penjualan');
        }
        else if ($metode=="Lunas" && $nominal != $gtotal) {
            echo "<script>alert('Nominal pembayaran harus sama dengan harga total')</script>";
            redirect('c_transaksi_penjualan/edit_penjualan/'.$id.'');
        }
    }
}
function get_id_pesanan(){
   $id = $this->input->post('kode_pesanan');
   $data1 = $this->m_transaksi_penjualan->get_id_pesanan($id)->result();
   $data2 = $this->m_transaksi_penjualan->max_hpp()->result();
   $data = array(
    'pesanan'=>$data1,
    'hpp'=>$data2
);
   echo json_encode($data);
}
}
?>