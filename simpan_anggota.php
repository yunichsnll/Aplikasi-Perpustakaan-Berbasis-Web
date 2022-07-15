<?php 
include'koneksi.php';
$id_anggota=$_POST['id_anggota'];
$no_identitas=$_POST['no_identitas'];
$jns_identitas=$_POST['jns_identitas'];
$nama=$_POST['nama'];
$tgl_lahir=$_POST['tgl_lahir'];
$alamat=$_POST['alamat'];
$no_tlpn=$_POST['no_tlpn'];
$kelas=$_POST['kelas'];
$jurusan=$_POST['jurusan'];

$simpan=mysqli_query($koneksi,"INSERT INTO tb_anggota VALUES('$id_anggota','$no_identitas','$jns_identitas','$nama','$tgl_lahir','$alamat','$no_tlpn','$kelas','$jurusan')");

if ($simpan) {
	header('location:tampil_anggota.php');
}
?>
