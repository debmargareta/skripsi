<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_detail_satuan extends CI_Controller {
     
    function __construct(){
        parent::__construct();
        $this->load->model('m_detail_satuan');
    }
    
    function tampil_tambah_detail_satuan(){
        $data['bahan'] = $this->m_detail_satuan->tampil_bahan()->result();
        $data['satuan'] = $this->m_detail_satuan->tampil_satuan()->result();
        $this->load->view('v_tambah_detail_satuan.php',$data); 
    }
    
    function save(){
    $checks = $this->input->post("counter");

    if($checks !=""){
        foreach($checks as $a){
            $data = array(
                "id_bahan" => $this->input->post("idBahan".$a),
                "id_satuan" => $this->input->post("idSatuan".$a),
                "nilai_satuan_gram" => $this->input->post("nilai".$a)
            );
            $this->m_detail_satuan->tambah_detail_satuan($data,"detail_satuan_bahan");
        }
    }
    redirect('c_detail_satuan/tampil_detail_satuan');
    }

    function tampil_detail_satuan(){
        $data['tampil'] = $this->m_detail_satuan->tampil_detail_satuan()->result();
        $this->load->view('v_detail_satuan.php',$data);
    }
    
    function edit_detail_satuan($iddetailsatuan){
        $where = array('id_detail_satuan_bahan'=>$iddetailsatuan);
        $data['edit_detail_satuan'] = $this->m_detail_satuan->edit_detail_satuan($where,'detail_satuan_bahan')->result();
        $data['bahan'] = $this->m_detail_satuan->tampil_bahan()->result();
        $data['satuan'] = $this->m_detail_satuan->tampil_satuan()->result();
        $this->load->view('v_edit_detail_satuan.php',$data);
    }//ambil data untuk ditampilin di view edit
    
    function update_detail_satuan(){
        $u_id = $this->input->post('iddetailsatuan');
        $u_bahan = $this->input->post('idBahan');
        $u_satuan = $this->input->post('idSatuan');
        $u_nilai = $this->input->post('nilaiSatuan');
        
        $data = array(
            'id_detail_satuan_bahan' =>$u_id,
            'id_bahan' =>$u_bahan,
            'id_satuan' =>$u_satuan,
            'nilai_satuan_gram' =>$u_nilai,
            'status' =>1,
        );
        $where = array('id_detail_satuan_bahan' => $u_id);
        
        $this->m_detail_satuan->update_detail_satuan($where,$data,'detail_satuan_bahan');
        redirect('c_detail_satuan/tampil_detail_satuan');
    }
    
    function hapus_detail_satuan($id){
        $data = array(
            'status'=>0
        );
        $where= array('id_detail_satuan_bahan'=>$id);
        $this->m_detail_satuan->ubah_status_detail_satuan($where,$data,'detail_satuan_bahan');
        redirect('c_detail_satuan/tampil_detail_satuan');
    }
}
?>