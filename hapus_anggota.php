<?php
include "koneksi.php";
$id_anggota=$_GET['id'];
$hapus=mysqli_query($koneksi, "DELETE FROM tb_anggota WHERE id_anggota=$id_anggota");
if ($hapus) {
	header('location:tampil_anggota.php');
}
?>

