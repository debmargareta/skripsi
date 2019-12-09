<?php

function kodePenjualan($penjualan)
{
    $newCode = $penjualan;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_penjualan = "KTR-PENJ-".$day."/".$month."/".$year."-".$newCode;
    
    return $kode_penjualan;
}

function kodePesanan($pesanan){
    $new = $pesanan;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_pesanan = "KPSN-".$day."/".$month."/".$year."-".$new;
    return $kode_pesanan;
}

function kodePembelian($pembelian){
    $newpemb = $pembelian;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_pembelian = "KTR-PEMB-".$day."/".$month."/".$year."-".$newpemb;
    return $kode_pembelian  ;
}
//helper untuk menyimpan function, kalau diakses ke banyak file, bisa ditaruh di dalam helper. mengefisienkan penggunaan coding.
//helper mempermudah dalam menyimpan function yang diakses banyak.
//nama file helper WAJIB ada _helper.
?>