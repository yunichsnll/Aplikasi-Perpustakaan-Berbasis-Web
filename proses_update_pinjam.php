<?php  
include 'koneksi.php';
include 'fungsi.php';

$id_pinjam 			= $_POST['id_pinjam'];
$buku     			= $_POST['buku'];
$anggota  			= $_POST['anggota'];
$tgl_pinjam 		= date('Y-m-d',strtotime($_POST['tgl_pinjam']));
$tgl_tempo          = date('Y-m-d',strtotime($_POST['tgl_tempo']));

$stok = cek_stok($koneksi, $buku);

if ($stok < 1) {
	$_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses edit gagal!</font>';

    header('Location: peminjaman.php?id_pinjam=' . $id_pinjam);
    exit();
}

$q = "SELECT tb_buku.judul_buku, tb_buku.no_pustaka, tb_pinjam.id_pinjam, tb_pinjam.id_anggota FROM tb_pinjam JOIN tb_buku ON tb_buku.no_pustaka = tb_pinjam.no_pustaka WHERE (tb_pinjam.no_pustaka = $buku AND tb_pinjam.id_anggota = '$anggota')";

$hasil_check = mysqli_query($koneksi, $q);
$data = mysqli_fetch_assoc($hasil_check);



$query = "UPDATE tb_pinjam SET no_pustaka = '$buku', id_anggota = '$anggota', tgl_pinjam = '$tgl_pinjam', tgl_tempo = '$tgl_tempo' WHERE id_pinjam = '$id_pinjam'";

$hasil = mysqli_query($koneksi, $query);

if ($hasil == true) {

	kurangi_stok($koneksi, $buku);
	
	$_SESSION['messages'] = '<font color="green">Proses edit data sukses!</font>';
	header('Location: peminjaman.php');
} else {
	$_SESSION['messages'] = '<font color="red">Proses edit gagal!</font>';
    header('Location: peminjaman.php?id_pinjam=' . $id_pinjam);
}
?>