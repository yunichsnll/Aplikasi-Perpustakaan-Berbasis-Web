<?php 
include 'koneksi.php';
$id_anggota=$_POST['id_anggota'];
$no_identitas=$_POST['no_identitas'];
$jns_identitas=$_POST['jns_identitas'];
$nama=$_POST['nama'];
$tgl_lahir=$_POST['tgl_lahir'];
$alamat=$_POST['alamat'];
$no_tlpn=$_POST['no_tlpn'];
$kelas=$_POST['kelas'];
$jurusan=$_POST['jurusan'];

$edit=mysqli_query($koneksi,"UPDATE tb_anggota SET no_identitas='$no_identitas',jns_identitas='$jns_identitas',nama='$nama',tgl_lahir='$tgl_lahir',alamat='$alamat',no_tlpn='$no_tlpn',kelas='$kelas',jurusan='$jurusan' WHERE id_anggota='$id_anggota'");

if ($edit) {
	header('location:tampil_anggota.php');
}
else{
	echo "gagal merubah data";
}
?>
