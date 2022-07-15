<?php
session_start();
include 'fungsi.php';
include 'koneksi.php';

$query = "SELECT tb_pinjam.*,tb_pinjam.id_pinjam as id_pinjama, tb_buku.no_pustaka ,tb_buku.judul_buku, tb_anggota.nama, (SELECT tgl_kembali FROM tb_kembali JOIN tb_pinjam ON tb_kembali.id_pinjam = tb_pinjam.id_pinjam WHERE tb_kembali.id_pinjam = id_pinjama) as tgl_kembali FROM tb_pinjam JOIN tb_buku ON tb_buku.no_pustaka = tb_pinjam.no_pustaka JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjam.id_anggota";

$hasil =mysqli_query($koneksi, $query);
mysqli_connect_error();

$data_pinjam = array();

while ($row = mysqli_fetch_assoc($hasil)) {
     $data_pinjam[] = $row;
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
    <title>Peminjaman</title>
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
        
        <div class="container">
              <div class="sidebar-overlay"></div>

    <!-- content -->
    <div class="content transition">
        <div class="container-fluid dashboard">
            <h3 class="fw-bold mt-3" align="center">Data Peminjaman</h3>
             <a href="tambah_peminjaman.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span>Tambah Data</a>
            <a href="peminjaman_pdf.php" class="btn btn-md fw-bold" style="background:#E9DCCD"><span class="fa fa-plus"></span>Print Laporan</a>
                    <br/><br/>
    <div class="biya">
        <div class="card">
     <div class="card-header">
    <h5 class="card-title">Data</h5>
    </div>
     <div class="card-body">
     <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
        <tr class="fw-bold" align="center" bgcolor="#B38867">
            <th>No Peminjaman</th>
            <th>Judul Buku</th>
            <th>Nama Peminjam</th>
            <th>Tgl pinjam</th>
            <th>Tgl jatuh tempo</th>
            <th>Tgl kembali</th>
            <th>Status</th>
            <th >Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_pinjam as $pinjam) {

        ?>    

        <tr class="text-center">
            <td><?php echo $no++; ?></td>
            <td><?php echo $pinjam['judul_buku'] ?></td>
            <td><?php echo $pinjam['nama'] ?></td>
            <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_pinjam'])) ?></td>
            <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_tempo'])) ?></td>
            <td><?php 
                    if (empty($pinjam['tgl_kembali'])) {
                        echo "-";
                    }
                    else {
                        echo date('d-m-Y', strtotime($pinjam['tgl_kembali']));
                    }
            ?>
            </td>
            <td>
                <?php $status = '' ?>
                <?php if (empty($pinjam['tgl_kembali'])): ?>
                    pinjam
                <?php $status = 'pinjam' ?>
                <?php else: ?>
                    kembali
                <?php $status = 'kembali' ?>  
                <?php endif ?>

            </td>
            <td>
                <?php if (empty($pinjam['tgl_kembali'])){ ?>
                <a href="sukses.php?id_pinjama=<?php echo $pinjam['id_pinjam'] ?>"  title="klik untuk ke proses pengembalian"> 
                    kembali
                </a> |

                <a href="update_pinjam.php?id_pinjam=<?php echo $pinjam['id_pinjam']; ?>&&status=<?php echo $status; ?>">
                    Edit
                </a> |

               <?php } ?>
                <a href="hapus_peminjaman.php?id_pinjam=<?php echo $pinjam['id_pinjam']; ?>&&status=<?php echo $status; ?>&&no_pustaka=<?php echo $pinjam['no_pustaka']; ?>"  onclick="return confirm('anda yakin akan menghapus data?')">
                hapus
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