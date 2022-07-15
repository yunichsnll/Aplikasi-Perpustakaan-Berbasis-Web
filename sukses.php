<?php
session_start();
include 'fungsi.php';
include 'koneksi.php';

$id_pinjama = $_GET['id_pinjama'];

$q = "SELECT tb_anggota.nama, tb_buku.*, tb_pinjam.* FROM tb_pinjam LEFT JOIN tb_buku ON tb_pinjam.no_pustaka = tb_buku.no_pustaka LEFT JOIN tb_anggota ON tb_pinjam.id_anggota = tb_anggota.id_anggota WHERE tb_pinjam.id_pinjam = $id_pinjama";

$hasil = mysqli_query($koneksi, $q);
$data_pinjam = mysqli_fetch_assoc($hasil);
$tgl_kembali = date('Y-m-d');

$denda = hitung_denda($tgl_kembali, $data_pinjam['tgl_tempo']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Perpustakaan</title>
  </head>
  <body>
    <div class="row m-0 vh-100">
      <div class="col-md-2 col-6 bg-custom-1 p-0" id="navbarToggleExternalContent">
        <header class="bg-custom-2 p-3 ps-4" align="center" >
          <div class="logo">
            <a href="#">
              <img src="img/1.png" alt="">
            </a>
          </div>
        </header>
        <ul class="nav flex-column ">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_anggota.php">Data Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_pustaka.php">Data Pustaka</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="peminjaman.php">Peminjaman Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengembalian.php">Pengembalian Buku</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 p-0" id ="uiNavbar">
        <div class="main-toolbar bg-custom-2 p-3">
          <i class="bi bi-justify fs-1 text-white" id="demo" onclick="closeNav()"></i>
          <h4 class="m-0 pl-4 ms-2">Perpustakaan SMKN 1 Cibinong</h4>
        <div class="dropdown transition ms-auto">
        <div id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
        </div>  
        <a class="dropdown-item fw-bold text-white" href="logout.php">LOGOUT</a>
        </div>
        </div>

    <div class="container clearfix">

        <div class="content">
            <h3 class="fw-bold mt-3" align="center">Pengembalian Buku</h3>

	<form action="proses_pengembalian.php" method="POST">
                                <input type="hidden" name="id_pinjam" value="<?php echo $data_pinjam['id_pinjam'] ?>">
                                <input type="hidden" name="tgl_kembali" value="<?php echo $tgl_kembali ?>">
                                <input type="hidden" name="denda" value="<?php echo $denda ?>">

                                <div class="input-group mb-3">
                                <span class="input-group-text col-2" id="basic-addon1">Buku</span>
                                <input type="text" value="<?php echo $data_pinjam['judul_buku'] ?>" disabled name="buku" required
                                        class="form-control" placeholder="Domisili" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">Anggota</span>
                                    <input type="text" value="<?php echo $data_pinjam['nama'] ?>" disabled name="anggota" required
                                        class="form-control" placeholder="Domisili" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">TGL Pinjam</span>
                                    <input type="date" value="<?php echo $data_pinjam['tgl_pinjam'] ?>" disabled name="tgl_pinjam" required
                                        class="form-control" placeholder="Usia" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">TGL Harus Kembali</span>
                                    <input type="date" value="<?php echo $data_pinjam['tgl_tempo'] ?>" disabled name="tgl_tempo" required
                                        class="form-control" placeholder="Usia" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">TGL Kembali</span>
                                    <input type="date" value="<?php echo $tgl_kembali ?>" disabled required
                                        class="form-control" placeholder="Usia" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">Denda</span>
                                    <input type="text" value="<?php echo $denda ?>" disabled required
                                        class="form-control" placeholder="denda" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <input type="submit" value="Selesai" class="btn fw-bold" align="center" style="background:#B38867">
                                    </div>
                                </div>
                            </form>
                        </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
