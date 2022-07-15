<?php 
include 'koneksi.php';
include 'fungsi.php';

$id_pinjam = $_POST['id_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$denda = $_POST['denda'];


$query = "INSERT INTO tb_kembali (id_pinjam, tgl_kembali, denda) VALUES ($id_pinjam, '$tgl_kembali', $denda)";

$hasil = mysqli_query($koneksi, $query);
if ($hasil == true) {
    // ambil buku_id berdasarkan pinjam_id
    $q = "SELECT tb_buku.no_pustaka FROM tb_buku JOIN tb_pinjam ON tb_buku.no_pustaka = tb_pinjam.no_pustaka WHERE tb_pinjam.id_pinjam = $id_pinjam";
    $hasil = mysqli_query($koneksi, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $id_buku = $hasil['no_pustaka'];

    tambah_stok($koneksi, $id_buku);
    // tambah stok

    $_SESSION['messages'] = '<font color="green">Pengembalian buku sukses!</font>';
    header('Location: peminjaman.php');
} else {
    header('Location: peminjaman.php'. $id_pinjam);
}

?>
