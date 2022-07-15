<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Tampil Data Pustaka</title>
  </head>
  <body>
    <div class="row m-0 vh-100">
      <div class="col-md-2 col-6 bg-custom-1 p-0" id="navbarToggleExternalContent">
        <header class="bg-custom-2 p-3 ps-4" align="center">
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
            <h3 class="mt-3" align="center">Data Pustaka</h3>
             <a href="input_pustaka.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span> Tambah Data</a>
            <a href="pustaka_pdf.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span>Print Laporan</a>
             <br/><br/>
  <div class="biya">
    <div class="card">
     <div class="card-header">
    <h5 class="card-title">Data</h5>
    </div>
     <div class="card-body">
     <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
        <tr class="fw-bold" align="center" bgcolor="#B38867">
            <th>No Pustaka</th>
            <th>Rak</th>
            <th>Judul Pustaka</th>
            <th>Jenis Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Stok</th>
            <th>Tanggal Penerbitan</th>
            <th>Tanggal Masuk</th>
            <th style="text-align: center;">Aksi</th>

        </tr>
<?php
include "koneksi.php";
$no = 1;
    $tampil=mysqli_query($koneksi, "SELECT * FROM tb_buku");
    while($data=mysqli_fetch_array($tampil)) {
?>
<tr align="center">
    <td><?php echo $no++ ?></td>
    <td><?php echo $data['rak'];?></td>
    <td><?php echo $data['judul_buku'];?></td>
    <td><?php echo $data['tipe_buku'];?></td>
    <td><?php echo $data['pengarang'];?></td>
    <td><?php echo $data['penerbit'];?></td>
    <td><?php echo $data['stok'];?></td>
    <td><?php echo $data['tgl_terbit'];?></td>
    <td><?php echo $data['tgl_masuk'];?></td>


    <td><a href="update_pustaka.php?no_pustaka='<?php echo $data['no_pustaka']?>'">Edit</a> | <a href="hapus_pustaka.php?no_pustaka='<?php echo $data['no_pustaka']?>'">Hapus</a></td>
    </tr>
    <?php
    }
    ?>

</table>
<br>
</div>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>