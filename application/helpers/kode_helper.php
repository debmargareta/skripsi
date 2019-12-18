<?php

function kodePenjualan($penjualan)
{
    $newCode = $penjualan+1;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_penjualan = "KTR-PENJ-".$newCode."-".$day."-".$month."-".$year;;
    
    return $kode_penjualan;
}

function kodePesanan($pesanan){
    $new = $pesanan+1;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_pesanan = "KPSN-".$new."-".$day."-".$month."-".$year;
    return $kode_pesanan;
}

function kodePembelian($pembelian){
    $newpemb = $pembelian+1;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_pembelian = "KTR-PEMB-".$newpemb."-".$day."-".$month."-".$year;
    return $kode_pembelian;
}
//helper untuk menyimpan function, kalau diakses ke banyak file, bisa ditaruh di dalam helper. mengefisienkan penggunaan coding.
//helper mempermudah dalam menyimpan function yang diakses banyak.
//nama file helper WAJIB ada _helper.
?>