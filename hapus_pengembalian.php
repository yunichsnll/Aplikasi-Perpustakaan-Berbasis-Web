<?php

include 'koneksi.php';

$id_kembali = $_GET['id_kembali'];

$query = "DELETE FROM tb_kembali WHERE id_kembali = $id_kembali";
$hasil = mysqli_query($koneksi, $query);

header('location: pengembalian.php');

?>
