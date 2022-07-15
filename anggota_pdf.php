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
 

        $query = "SELECT * from tb_anggota"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    
    ?>
    <table align="center" border="2" cellpadding="8">
        <tr>
      <th scope="col" style="text-align: center;">Nama</th>
      <th scope="col" style="text-align: center;">Jenis Identitas</th>
      <th scope="col" style="text-align: center;">Tanggal Lahir</th>
      <th scope="col" style="text-align: center;">Alamat</th>
      <th scope="col" style="text-align: center;">No Telepon</th>
      <th scope="col" style="text-align: center;">Kelas</th>
      <th scope="col" style="text-align: center;">Kompetensi Keahlian</th>
    </tr>
        <?php
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $tgl = date('d-m-Y', strtotime($data['id_anggota']));

                echo "<tr>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['jns_identitas']. "</td>";
                echo "<td>" . $data['tgl_lahir'] . "</td>";
                echo "<td>" . $data['alamat'] . "</td>";
                echo "<td>" . $data['no_tlpn'] . "</td>";
                echo "<td>" . $data['kelas'] . "</td>";
                echo "<td>" . $data['jurusan'] . "</td>";
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

$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A3', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data anggota.pdf', 'I');
?>