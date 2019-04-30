<?php
    require 'header.php';
    // connect to the database
    include 'includes/dbh.inc.php';

    $tarikhMula = date("Y-m-d",strtotime($_POST['tarikhJualanMula'])); // will return data something like 2016-10-05 00:00:00
    $tarikhAkhir = date("Y-m-d",strtotime($_POST['tarikhJualanAkhir'])); // will return data something like 2016-10-05 00:00:00

    $sql = "SELECT * FROM `jualan` WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($hasil);
?>
<head>
    <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
    <title>Papar Laporan Ikut Tarikh Jualan</title>
</head>

<body>
<div class = "container">
    <h1>Laporan Ikut Tarikh Jualan <?php echo $tarikhMula; ?> hingga <?php echo $tarikhAkhir; ?></h1>
    <?php
        /*Displays all data from 'jualan' table by item selected*/
        $sql2 = "SELECT jualan.KodJualan, jualan.TarikhJualan, jualan.KuantitiItemDijual, jualan.HargaJualan, item.NamaItem FROM jualan INNER JOIN item ON jualan.KodItem=item.KodItem WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
        $hasil2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_num_rows($hasil2);

        // output the rekod jualan where got nama item selected
        if ($row2 > 0) {
            echo "<table align = 'center' border='1' cellpadding='10'>";

            echo "<tr> <th>Kod Jualan</th> <th>Tarikh Jualan</th> <th>Nama Item</th> <th>Kuantiti</th> <th>Harga Per Item</th> <th>Harga Jualan</th> </tr>";

            // loop through results of database query, displaying them in the table
            while($row3 = mysqli_fetch_array($hasil2)) {
                $kodJualan = $row3['KodJualan'];
                $tarikhJualan = $row3['TarikhJualan'];
                $namaItem = $row3['NamaItem'];
                $kuantiti = $row3['KuantitiItemDijual'];
                $hargaJualan = $row3['HargaJualan'];

                $sql3 = "SELECT HargaPerItem FROM `item` WHERE `NamaItem` = '$namaItem'";
                $hasil3 = mysqli_query($conn, $sql3);
                $row4 = mysqli_fetch_array($hasil3);
                $hargaPerItem = $row4['HargaPerItem'];

                // echo out the contents of each row into a table
                echo "<tr>";

                echo '<td>' . $kodJualan . '</td>';

                echo '<td>' . $tarikhJualan . '</td>';

                echo '<td>' . $namaItem . '</td>';

                echo '<td>' . $kuantiti . '</td>';

                echo '<td>' . $hargaPerItem . '</td>';

                echo '<td>' . $hargaJualan . '</td>';

                echo "</tr>";


            }
        } else {
            echo "<script>
                    alert('Data tidak berjaya dipaparkan. Sila papar semula.');
                </script>";
            echo "Tidak terdapat rekod dalam pangkalan data.<br>";
        }

        echo "</table>";

        $sql3 = "SELECT SUM(KuantitiItemDijual) FROM `jualan` WHERE `TarikhJualan` BETWEEN '$tarikhMula' AND '$tarikhAkhir'";
        $hasil3 = mysqli_query($conn, $sql3);
        $row4 = mysqli_fetch_assoc($hasil3);
        $sum = $row4['SUM(KuantitiItemDijual)'];

        echo "<br>Jumlah Kuantiti Item yang dijual: " .$sum;

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
                <input type = 'submit' value = 'Cetak' onclick = 'window.print()'>
            </td>
        </tr>
    </table>
</div>
<?php
    require 'footer.php';
?>