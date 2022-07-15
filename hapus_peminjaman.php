<?php
session_start();

include 'koneksi.php';
include 'fungsi.php';

$id_pinjam = $_GET['id_pinjam'];
$status    = $_GET['status'];
$id_buku   = $_GET['no_pustaka'];


$stok_buku = cek_stok($koneksi, $id_buku);

if ($stok_buku < 1) {
	$_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('Location: peminjaman.php');
    exit();
}

if ($status == 'pinjam') {	
	tambah_stok($koneksi, $id_buku);
}

$query = "DELETE FROM tb_pinjam WHERE id_pinjam = $id_pinjam";
$hasil = mysqli_query($koneksi, $query);

if ($hasil == true) {
	$_SESSION['messages'] = '<font color="green">Hapus data sukses!</font>';
    header('location: peminjaman.php');
} else {
	$_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('location: peminjaman.php');
}

?>
