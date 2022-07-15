<?php
include "koneksi.php";
$no_pustaka=$_GET['no_pustaka'];
$hapus=mysqli_query($koneksi, "DELETE FROM tb_buku WHERE no_pustaka=$no_pustaka");
if ($hapus) {
	header('location:tampil_pustaka.php');
}
?>
