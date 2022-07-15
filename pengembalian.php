<?php 
include 'koneksi.php';

$query = "SELECT tb_kembali.*, tb_buku.judul_buku, tb_pinjam.tgl_pinjam, tb_pinjam.tgl_tempo, tb_kembali.id_kembali, tb_kembali.tgl_kembali, tb_anggota.nama FROM tb_pinjam JOIN tb_buku ON tb_buku.no_pustaka = tb_pinjam.no_pustaka JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjam.id_anggota JOIN tb_kembali ON tb_pinjam.id_pinjam = tb_kembali.id_pinjam";

$hasil = mysqli_query($koneksi, $query);
mysqli_connect_error();

$data_kembali = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kembali[] = $row;
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
    <title>pengembalian</title>
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

    <!-- content -->
    <div class="content transition">
        <div class="container-fluid dashboard">
            <h3 class="fw-bold mt-3" align="center">Data Pengembalian</h3>
            <a href="pengembalian_pdf.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span>Print Laporan</a>
    <div class="biya">
        <div class="card">
     <div class="card-header">
    <h5 class="card-title">Data</h5>
    </div>
     <div class="card-body">
        <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
        <tr class="fw-bold" align="center" bgcolor="#B38867">

                                            <th>No Pengembalian</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>TGL Pinjam</th>
                                            <th>TGL Jatuh Tempo</th>
                                            <th>TGL Kembali</th>
                                            <th>Denda</th>
                                            <th>Action</th>
                                        </tr>
                                   
                                    <?php
                                     $no = 1;
                                     foreach ($data_kembali as $kembali) { 
                                    ?>
                                       
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $kembali['judul_buku'] ?></td>
                                            <td><?php echo $kembali['nama'] ?></td>
                                            <td><?php echo $kembali['tgl_pinjam'] ?></td>
                                            <td><?php echo $kembali['tgl_tempo'] ?></td>
                                            <td><?php echo $kembali['tgl_kembali'] ?></td>
                                            <td><?php echo $kembali['denda'] ?></td>
                                            <td>
                                            <a href="hapus_pengembalian.php?id_kembali=<?php echo $kembali['id_kembali'] ?>" onclick="return confirm('anda yakin akan menghapus data?')">
                                                Hapus
                                            </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>