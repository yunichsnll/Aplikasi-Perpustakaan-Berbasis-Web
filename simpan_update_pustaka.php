<?php
include 'koneksi.php';
$no_pustaka=$_POST['no_pustaka'];
$rak=$_POST['rak'];
$judul_buku=$_POST['judul_buku'];
$tipe_buku=$_POST['tipe_buku'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$stok=$_POST['stok'];
$tgl_terbit=$_POST['tgl_terbit'];
$tgl_masuk=$_POST['tgl_masuk'];

$edit=mysqli_query($koneksi, "UPDATE tb_buku SET rak='$rak',judul_buku='$judul_buku',tipe_buku='$tipe_buku',pengarang='$pengarang',penerbit='$penerbit',stok='$stok',tgl_terbit='$tgl_terbit',tgl_masuk='$tgl_masuk' WHERE no_pustaka='$no_pustaka'");

if($edit) {
  header('location:tampil_pustaka.php');

}
?>