<?php
include 'koneksi.php';
include 'fungsi.php';

if( isset( $_POST['tambah']) )
{
    $pustaka            = $_POST['pustaka'];
    $anggota            = $_POST['anggota'];
    $tgl_pinjam         = date('Y-m-d',strtotime($_POST['tgl_pinjam']));
    $tgl_tempo          = date('Y-m-d',strtotime($_POST['tgl_tempo']));

    $stok_buku = cek_stok($koneksi, $pustaka);

    if ($stok_buku < 1) {
        $_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses peminjaman gagal!</font>';
        header('Location: peminjaman.php');
        exit();
    }


    $sql = "INSERT INTO tb_pinjam (no_pustaka, id_anggota, tgl_pinjam, tgl_tempo) 
        VALUES ('$pustaka', '$anggota', '$tgl_pinjam', '$tgl_tempo')";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil == true) {

        kurangi_stok($koneksi, $pustaka);

        $_SESSION['messages'] = '<font color="green">Peminjaman sukses!</font>';
        
        header('Location: peminjaman.php');
    } else {
        header('Location: peminjaman.php');
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
    <h3 class="mt-3 fw-bold text-center">Tambah Data Peminjaman</h3>
    <form action="" method="POST">
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">Buku</span>
                                    <select name="pustaka" required class="form-select"
                                        aria-label="Default select example">
                                        <?php
                                        include "koneksi.php";
                                        $show = mysqli_query($koneksi,"SELECT * FROM tb_buku");
                                        while($data = mysqli_fetch_array($show)){
                                        ?>
                                        <option value="<?php echo $data['no_pustaka'] ?>"><?php echo $data['judul_buku'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">Anggota</span>
                                    <select name="anggota" required class="form-select"
                                        aria-label="Default select example">
                                        <?php
                                        include "koneksi.php";
                                        $show = mysqli_query($koneksi,"SELECT * FROM tb_anggota");
                                        while($data = mysqli_fetch_array($show)){
                                        ?>
                                        <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">Tanggal Pinjam</span>
                                    <input type="date" name="tgl_pinjam" required class="form-control" placeholder="Nama"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text col-2" id="basic-addon1">Tanggal Harus Kembali</span>
                                    <input type="date" name="tgl_tempo" required class="form-control" placeholder="Tanggal Lahir"
                                        aria-label="Nama" aria-describedby="basic-addon1">
                                </div>
                            </div>
                                <input type="submit" name="tambah" value="simpan" class="btn fw-bold" align="center" style="background:#B38867">
                        </form>

         </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>