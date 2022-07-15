<?php

function hitung_denda($tgl_kembali, $tgl_tempo)
{
    if (strtotime( $tgl_kembali ) > strtotime($tgl_tempo)) {
        $kembali = new DateTime($tgl_kembali); 
        $jatuh_tempo   = new DateTime($tgl_tempo); 

        $selisih = $kembali->diff($jatuh_tempo);
        $selisih = $selisih->format('%d');

        $denda = 2000 * $selisih;
    } else {
        $denda = 0;
    }

    return $denda;
}

function cek_stok($koneksi, $no_pustaka)
{
    $q = "SELECT stok FROM tb_buku WHERE no_pustaka = $no_pustaka";
    $hasil = mysqli_query($koneksi, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $stok = $hasil['stok'];

    return $stok;
}

function kurangi_stok($koneksi, $no_pustaka)
{
    $q = "UPDATE tb_buku SET stok = stok - 1 WHERE no_pustaka = $no_pustaka";
    mysqli_query($koneksi, $q);
}

function tambah_stok($koneksi, $no_pustaka)
{
    $q = "UPDATE tb_buku SET stok = stok + 1 WHERE no_pustaka = $no_pustaka";
    mysqli_query($koneksi, $q);
}


?>

