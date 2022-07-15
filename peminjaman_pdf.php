<?php ob_start(); ?>
<html lang="en">

<head>
    <title>Cetak PDF</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        table td {
            word-wrap: break-word;
            width: 20%;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
include "koneksi.php";
 

       $query = "SELECT tb_pinjam.*,tb_pinjam.id_pinjam as id_pinjama, tb_buku.no_pustaka, tb_buku.judul_buku, tb_anggota.nama, (SELECT tgl_kembali from tb_kembali JOIN tb_pinjam on tb_kembali.id_pinjam = tb_pinjam.id_pinjam WHERE tb_pinjam.id_pinjam = id_pinjama) as tgl_kembali from tb_pinjam JOIN tb_buku on tb_buku.no_pustaka = tb_pinjam.no_pustaka JOIN tb_anggota ON tb_anggota.id_anggota = tb_pinjam.id_anggota"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    
    ?>
    <table border="1" cellpadding="8">
    <tr>
      <th scope="col" style="text-align: center;">Judul buku</th>
      <th scope="col" style="text-align: center;">Nama Peminjam</th>
      <th scope="col" style="text-align: center;">Tanggal Pinjam</th>
      <th scope="col" style="text-align: center;">Tanggal Jatuh Tempo</th>
      <th scope="col" style="text-align: center;">Tanggal kembali</th>
      <th scope="col" style="text-align: center;">Status</th>
    </tr>
        <?php
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $tglpnjm = date('d-m-Y', strtotime($data['tgl_pinjam']));
                $tgltmpo = date('d-m-Y', strtotime($data['tgl_tempo']));
                $tglkmbl = date('d-m-Y', strtotime($data['tgl_kembali']));

                echo "<tr>";
                echo "<td>" . $data['judul_buku'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $tglpnjm. "</td>";
                echo "<td>" . $tgltmpo . "</td>";
                if (empty($data['tgl_kembali'])) {
                        echo '<td>-</td>';
                    } else {
                        echo "<td>".date('d-m-Y', strtotime($data['tgl_kembali']))."</td>";
                    }

                $status = "";
                if (empty($data['tgl_kembali'])) {
                    $status = "Pinjam";
                } else {
                    $status = "Kembali";
                }
                echo "<td>". $status ."</td>";

                
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'plugin/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('data peminjaman.pdf', 'I');
?>