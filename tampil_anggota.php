<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Tampil Data Anggota</title>
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
        <ul class="nav flex-column ">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_anggota.php">Data Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"href="tampil_pustaka.php">Data Pustaka</a>
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
            <h3 class="mt-3" align="center">Data Anggota</h3>
             <a href="input_anggota.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span>Tambah Data</a>
             <a href="anggota_pdf.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span>Print Laporan</a>
                    <br/><br/>
  <div class="biya">
    <div class="card">
     <div class="card-header">
    <h5 class="card-title">Data</h5>
    </div>
     <div class="card-body">
     <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
        <tr class="fw-bold" align="center" bgcolor="#B38867">
                        <th>NO Identitas</th>
                        <th>Jenis Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Kelas</th>
                        <th>Kompetisi Keahlian</th>
                        <th>Aksi</th>
        </tr>
                <?php
               include "koneksi.php";
               $tampil=mysqli_query($koneksi,"SELECT * FROM tb_anggota");
               while ($data=mysqli_fetch_array($tampil)) {
               ?>
               <tr align="center">
                 <td><?php echo $data['no_identitas'] ?></td>
                 <td><?php echo $data['jns_identitas'] ?></td>
                 <td><?php echo $data['nama'] ?></td>
                 <td><?php echo $data['tgl_lahir'] ?></td>
                 <td><?php echo $data['alamat'] ?></td>
                 <td><?php echo $data['no_tlpn'] ?></td>
                 <td><?php echo $data['kelas'] ?></td>
                 <td><?php echo $data['jurusan'] ?></td>

                 <td><a href="update_anggota.php?id='<?php echo $data['id_anggota']?>'">Edit</a> <a href="hapus_anggota.php?id='<?php echo $data['id_anggota']?>'">Hapus</a></td>
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




