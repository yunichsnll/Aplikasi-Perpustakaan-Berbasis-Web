<?php
include 'pro_buku.php';
include 'koneksi.php';

$id_pinjam = $_GET['id_pinjam'];
$query = "SELECT * FROM tb_pinjam WHERE tb_pinjam.id_pinjam = $id_pinjam";
$hasil = mysqli_query($koneksi, $query);
$data_pinjam = mysqli_fetch_assoc($hasil);

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
    <title>Update Peminjaman</title>
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
        
<div class="container clearfix">

        <div class="content">
            <h3 class="fw-bold mt-3" align="center">Edit Data Peminjaman</h3>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <form class="mt-5" align="center" action="proses_update_pinjam.php" method="post">
            <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam ?>">
                <p class="fw-bold">Buku</p>
                <p>
                    <select name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['no_pustaka'] ?>" <?php echo ($buku['no_pustaka'] == $data_pinjam['no_pustaka']) ? 'selected' : '' ; ?> ><?php echo $buku['judul_buku'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p class="fw-bold">Anggota</p>
                <p>
                    <select name="anggota">
                        <?php foreach ($data_anggota as $anggota) : ?>
                        <option value="<?php echo $anggota['id_anggota'] ?>" <?php echo ($anggota['id_anggota'] == $data_pinjam['id_anggota']) ? 'selected' : '' ; ?> ><?php echo $anggota['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p class="fw-bold">Tanggal Pinjam</p>
                <p><input type="date" name="tgl_pinjam" value="<?php echo $data_pinjam['tgl_pinjam'] ?>"></p>

                <p class="fw-bold">Tanggal Jatuh Tempo</p>
                <p><input type="date" name="tgl_tempo" value="<?php echo $data_pinjam['tgl_tempo'] ?>"></p>

                <p>
                  <center>
                    <input type="submit" name="submit" value="Edit" class="btn fw-bold" align="center" style="background:#B38867">
                    <input type="reset" name="reset" value="Batal" class="btn fw-bold" align="center" style="background:#B38867" onclick="self.history.back();">
                  </center>
                </p>
            </form>
        </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>