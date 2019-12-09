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

function kodePenjualan($penjualan)
{
    $newCode = $penjualan;
    $day = date("d");
    $month = date ("m");
    $year = date ("Y");
    $kode_penjualan = "KTR-PENJ-".$day."/".$month."/".$year."-".$newCode;
    
    return $kode_penjualan;
}

//helper untuk menyimpan function, kalau diakses ke banyak file, bisa ditaruh di dalam helper. mengefisienkan penggunaan coding.
//helper mempermudah dalam menyimpan function yang diakses banyak.
//nama file helper WAJIB ada _helper.
?>