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
 

        $query = "SELECT * from tb_buku"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    
    ?>
    <table border="2" cellpadding="8">
     <tr>
      <th style="text-align: center;">No Rak</th>
      <th style="text-align: center;">Judul Pustaka</th>
      <th style="text-align: center;">Jenis Pustaka</th>
      <th style="text-align: center;">Pengarang</th>
      <th style="text-align: center;">Penerbit</th>  
      <th style="text-align: center;">Stok</th>
      <th style="text-align: center;">Tanggal Penerbitan</th>
      <th style="text-align: center;">Tanggal Masuk</th>
    </tr>
        <?php
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $tgl = date('d-m-Y', strtotime($data['no_pustaka']));

                echo "<tr>";
                echo "<td>" . $data['rak'] . "</td>";
                echo "<td>" . $data['judul_buku'] . "</td>";
                echo "<td>" . $data['tipe_buku'] . "</td>";
                echo "<td>" . $data['pengarang'] . "</td>";
                echo "<td>" . $data['penerbit'] . "</td>";
                echo "<td>" . $data['stok'] . "</td>";
                echo "<td>" . $data['tgl_terbit']. "</td>";
                echo "<td>" . $data['tgl_masuk']. "</td>";
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

$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Buku.pdf', 'I');
?>