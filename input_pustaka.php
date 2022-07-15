<?php
include 'koneksi.php';

if( isset( $_POST['tombol']) ){
$no_pustaka = $_POST['no_pustaka'];    
$rak = $_POST['rak'];
$judul_buku = $_POST['judul_buku'];
$tipe_buku = $_POST['tipe_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$stok = $_POST['stok'];
$tgl_terbit = $_POST['tgl_terbit'];
$tgl_masuk = $_POST['tgl_masuk'];



$q = "INSERT INTO `tb_buku` (`no_pustaka`, `rak`, `judul_buku`, `tipe_buku`, `pengarang`, `penerbit`, `stok`, `tgl_terbit`, `tgl_masuk`) VALUES(NULL,'$rak','$judul_buku','$tipe_buku','$pengarang','$penerbit','$stok','$tgl_terbit','$tgl_masuk')";

$query = mysqli_query($koneksi, $q);

if($query) {
  header('location:tampil_pustaka.php');
}
}
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
    <title>Input Pustka</title>
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
        <ul class="nav flex-column fw-bold">
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
        
    <div class="sidebar-overlay"></div>

        <div class="content transition">
        <div class="container-fluid dashboard">
            <h3 class="mt-3 fw-bold" align="center">Input Pustaka</h3>

<form action="" method="POST">
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label fw-bold">No Pustaka</label>
    <input type="number" name="no_pustaka" class="form-control" id="exampleInputPassword1">
  </div>  
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label fw-bold">No Rak</label>
    <input type="text" name="rak" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-2">
  <label for="exampleInputEmail1" class="form-label fw-bold">Judul Pustaka</label>
    <input type="text" name="judul_buku" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
  <label for="exampleInputEmail1" class="form-label fw-bold">Tipe Buku</label>
   <select class="form-select" aria-label="Default select example" name="tipe_buku">
  <option selected disabled selected>Tipe Buku</option>
  <option value="majalah">Majalah</option>
  <option value="jurnal">Jurnal</option>
  <option value="fiksi">Fiksi</option>
  <option value="non-fiksi">Non-Fiksi</option>
  </select>
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label fw-bold">Pengarang</label>
    <input type="text" name="pengarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label fw-bold">Penerbit</label>
    <input type="text" name="penerbit" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label fw-bold">Stok</label>
    <input type="text" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Penerbitan</label>
    <input type="date" name="tgl_terbit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Masuk</label>
    <input type="date" name="tgl_masuk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
      <center>
        <td><input type="submit" name="tombol" value="Simpan" class="btn fw-bold" align="center" style="background:#B38867" /></td>
        <input type="reset" name="reset" value="Batal" class="btn fw-bold" align="center" style="background:#B38867">
      </center>
</form>
</div>
</div>
            
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>