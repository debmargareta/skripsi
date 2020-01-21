<?php 
defined ('BASEPATH') OR exit ('No direct script access allowed');

class c_overhead extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_overhead');
    }
    
    function tampil_tambah_overhead(){
        $data['satuan'] = $this->m_overhead->satuan()->result();
        $this->load->view('v_tambah_overhead.php',$data); 
    }
    
    function save(){
        $checks = $this->input->post("counter");

        if($checks !=""){
          foreach($checks as $a){
             $data = array(
                "nama_biaya" => $this->input->post("nama".$a),
                "id_satuan" => $this->input->post("satuan".$a),
                "status" => 1,
            );
             $this->m_overhead->tambah_overhead($data,"biaya_overhead");
         }
     }
     redirect('c_overhead/tampil_overhead');
 }

 function tampil_overhead(){
    $data['tampil'] = $this->m_overhead->tampil_overhead()->result();
    $this->load->view('v_overhead.php',$data);
}

function edit_overhead($idoverhead){
    $where = array('id_biaya_overhead'=>$idoverhead);
    $data['edit_overhead'] = $this->m_overhead->edit_overhead($where,'biaya_overhead')->result();
    $data['edit_satuan'] = $this->m_overhead->satuan()->result();
    $this->load->view('v_edit_overhead.php',$data);
}

function update_overhead(){
    $u_id = $this->input->post('idBiaya');
    $u_nama = $this->input->post('namaOverhead');
    $u_satuan = $this->input->post('idSatuan');

    $data = array(
        'nama_biaya' => $u_nama,
        'id_satuan' => $u_satuan,
        'status' => 1
    );
    $where = array('id_biaya_overhead' => $u_id);

    $this->m_overhead->update_overhead($where,$data,'biaya_overhead');
    redirect('c_overhead/tampil_overhead');
}

function hapus_overhead($id){
    $data = array(
        'status'=>0
    );
    $where= array('id_biaya_overhead'=>$id);
    $this->m_overhead->ubah_status_overhead($where,$data,'biaya_overhead');
    redirect('c_overhead/tampil_overhead');
}
}
?>