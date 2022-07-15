<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Update Pustaka</title>
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
        
        <div class="container">
   <div class="sidebar-overlay"></div>

    <!-- content-->
    <div class="content transition">
      <div class="container-fluid dashboard">
    
    <?php
include "koneksi.php";
$no_pustaka=$_GET['no_pustaka'];
$sql = "SELECT * FROM tb_buku WHERE no_pustaka=$no_pustaka";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
if( mysqli_num_rows($query) < 1 ){
  die("data tidak ditemukan...");
}
?>

<center>
<div class="container-fluid"></div>
<h3 class="mt-3" align="center">Update Data Pustaka</h3>
</center>
<form name="FUpdateSiswa" method="post" action="simpan_update_pustaka.php">
    <input type="hidden" size="20" maxlength="5" name="no_pustaka" value="<?php echo $data['no_pustaka']?>" >
  <tr>
    <label for="exampleInputEmail1" class="form-label fw-bold">No Rak</label>
    <input class="form-control" type="text" size="20" maxlength="5" name="rak" value="<?php echo $data['rak']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
    <div id="emailHelp" class="form-text"></div>
  </tr>
  <tr>
    <label for="exampleInputEmail1" class="form-label fw-bold">Judul Pustaka</label>
    <input class="form-control" type="text" size="20" maxlength="255" name="judul_buku" value="<?php echo $data['judul_buku']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
    <div id="emailHelp" class="form-text"></div>
  </tr>
  <tr>
  <label for="exampleInputEmail1" class="form-label fw-bold">Tipe Buku</label>
  <select class="form-select" aria-label="Default select example" name="tipe_buku">
  <option selected>Tipe Buku</option>
  <option value="majalah">Majalah</option>
  <option value="jurnal">Jurnal</option>
  <option value="fiksi">Fiksi</option>
  <option value="non-fiksi">Non-Fiksi</option>
  </select><br>
  </tr>
  <tr>
    <label for="exampleInputEmail1" class="form-label fw-bold">Pengarang</label>
    <input class="form-control" type="text" size="20" maxlength="255" name="pengarang" value="<?php echo $data['pengarang']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
    <div id="emailHelp" class="form-text"></div>
  </tr>
  <tr>
    <label for="exampleInputEmail1" class="form-label fw-bold">Penerbit</label>
    <input class="form-control" type="text" size="20" maxlength="255" name="penerbit" value="<?php echo $data['penerbit']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
    <div id="emailHelp" class="form-text"></div>
  </tr>
    <tr>
        <label for="exampleInputEmail1" class="form-label fw-bold">Stok</label>
        <input class="form-control" type="text" size="20" maxlength="255" name="stok" value="<?php echo $data['stok']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
        <div id="emailHelp" class="form-text"></div>
    </tr>  
  <tr>
    <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Penerbitan</label>
    <input class="form-control" type="date" size="20" maxlength="10" name="tgl_terbit" value="<?php echo $data['tgl_terbit']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
    <div id="emailHelp" class="form-text"></div>
  </tr>
  <tr>
    <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Masuk</label>
    <input class="form-control" type="date" size="20" maxlength="10" name="tgl_masuk" value="<?php echo $data['tgl_masuk']?>" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
    <div id="emailHelp" class="form-text"></div>
  </tr>
      <center>
      <td colspan=2><input type="submit" name="submit" value="Edit" class="btn fw-bold" align="center" style="background:#B38867">
                    <input type="reset" name="reset" value="Batal" class="btn fw-bold" align="center" style="background:#B38867">
       </td>
      </center>
</form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>