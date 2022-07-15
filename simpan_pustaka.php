<?php
include 'koneksi.php';

if( isset( $_POST['tombol']) ){
$no_pustaka=$_POST['no_pustaka'];
$rak=$_POST['rak'];
$judul_buku=$_POST['judul_buku'];
$tipe_buku=$_POST['tipe_buku'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$stok=$_POST['stok'];
$tgl_terbit=$_POST['tgl_terbit'];
$tgl_masuk=$_POST['tgl_masuk'];



$q = "INSERT INTO `tb_buku` (`no_pustaka`, `rak`, `judul_buku`, `tipe_buku`, `pengarang`, `penerbit`, `stok`, `tgl_terbit`, `tgl_masuk`) VALUES(NULL,'$rak','$judul_buku','$tipe_buku','$pengarang','$penerbit','$stok','$tgl_terbit','$tgl_masuk')";

$query = mysqli_query($koneksi, $q);

if($query) {
  header('location:tampil_pustaka.php');
}
}
?>
