<!-- Halaman untuk memaparkan laporan ikut tarikh jualan -->
<?php
    require 'header.php';
    include 'includes/dbh.inc.php';
    // Mengistirafkan tarikh mula dan tarikh akhir
    $tarikhMula = date("Y-m-d",strtotime($_POST['tarikhJualanMula']));
    $tarikhAkhir = date("Y-m-d",strtotime($_POST['tarikhJualanAkhir']));
    // sql untuk mencapai data jualan mengikut tarikh jualan
    $sql = "SELECT * FROM `jualan` WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($hasil);
?>
<head>
    <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
    <title>Papar Laporan Ikut Tarikh Jualan</title>
</head>
<!-- CSS bagi halaman cetak-->
<style>
    @media print {
        .navbar {
            display: none;
        }

        .footer {
            display: none;
        }

        .print-button {
            display: none;
        }

        .container {
            box-shadow: 0 0 rgba(0, 0, 0, .0);
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
    }
</style>
<body>
    <div class = "container">
        <h1>Laporan Ikut Tarikh Jualan <?php echo $tarikhMula; ?> hingga <?php echo $tarikhAkhir; ?></h1>
        <?php
            // sql untuk mencapai data jualan dari pangkalan data mengikut tarikh jualan dipilih
            $sql2 = "SELECT jualan.KodJualan, jualan.TarikhJualan, jualan.KuantitiItemDijual, jualan.HargaJualan, item.NamaItem FROM jualan INNER JOIN item ON jualan.KodItem=item.KodItem WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
            $hasil2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_num_rows($hasil2);

            // Paparkan rekod jualan
            if ($row2 > 0) {
                echo "<table align = 'center' border='1' cellpadding='10'>";

                echo "<tr> <th>Kod Jualan</th> <th>Tarikh Jualan</th> <th>Nama Item</th> <th>Kuantiti</th> <th>Harga Per Item</th> <th>Harga Jualan</th> </tr>";

                while ($row3 = mysqli_fetch_array($hasil2)) {
                    $kodJualan = $row3['KodJualan'];
                    $tarikhJualan = $row3['TarikhJualan'];
                    $namaItem = $row3['NamaItem'];
                    $kuantiti = $row3['KuantitiItemDijual'];
                    $hargaJualan = $row3['HargaJualan'];

                    $sql3 = "SELECT HargaPerItem FROM `item` WHERE `NamaItem` = '$namaItem'";
                    $hasil3 = mysqli_query($conn, $sql3);
                    $row4 = mysqli_fetch_array($hasil3);
                    $hargaPerItem = $row4['HargaPerItem'];

                    echo "<tr>";

                    echo '<td>' . $kodJualan . '</td>';

                    echo '<td>' . $tarikhJualan . '</td>';

                    echo '<td>' . $namaItem . '</td>';

                    echo '<td>' . $kuantiti . '</td>';

                    echo '<td>' . $hargaPerItem . '</td>';

                    echo '<td>' . $hargaJualan . '</td>';

                    echo "</tr>";
                }
            } else if (!$row2) {
                // Mesej yang akan dipapar jika tidak terdapat rekod tersebut
                echo "<script>
                        alert('Tidak terdapat rekod dalam pangkalan data.');
                      </script>";
                echo "<b>Tidak terdapat rekod dalam pangkalan data.</b><br>";
            } else {
                // Mesej yang akan dipapar jika ada masalah
                echo "<script>
                        alert('Data tidak berjaya dipaparkan. Sila papar semula.');
                        window.location.href='paparLaporanNamaItem.php';
                      </script>";
            }

            echo "</table>";

            // sql untuk mengira jumlah kuantiti item dijual
            $sql3 = "SELECT SUM(KuantitiItemDijual) FROM `jualan` WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
            $hasil3 = mysqli_query($conn, $sql3);
            $row4 = mysqli_fetch_assoc($hasil3);
            $sum = $row4['SUM(KuantitiItemDijual)'];
            echo "<br>Jumlah Kuantiti Item yang dijual: " .$sum;

            // sql untuk mengira jumlah jualan
            $sql4 = "SELECT SUM(HargaJualan) FROM `jualan` WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
            $hasil4 = mysqli_query($conn, $sql4);
            $row5 = mysqli_fetch_assoc($hasil4);
            $sum2 = $row5['SUM(HargaJualan)'];
            echo "<br>Jumlah Jualan: RM" .$sum2;
        ?>
        <table align = "center">
            <tr class = "row">
                <td></td>
                <td></td>
                <td></td>
                <td colspan = "2">
                    <input type = 'submit' class = 'print-button' value = 'Cetak' onclick = 'window.print()'>
                </td>
            </tr>
        </table>
    </div>
<?php
    require 'footer.php';
?>