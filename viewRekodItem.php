<!-- Halaman untuk memaparkan semua rekod item dari pangkalan data -->
<?php
    require 'header.php';
    include 'includes/dbh.inc.php';
?>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/viewRekodItem-style.css">
        <title>Rekod Item</title>
    </head>

    <body>
    <div class = "container">
        <h1>Kemaskini Rekod Item</h1>

        <form action = "" method = "POST">
            <?php
                // Mencapai data item dari pangkalan data dan memaparkan
                $hasil = mysqli_query($conn ,"SELECT * FROM `item` LEFT JOIN `pembekal` ON `item`.`KodPembekal` = `pembekal`.`KodPembekal` ORDER BY `KodItem` ASC;")
                or die(mysqli_error($conn));

                echo "<table align = 'center' border='1' cellpadding='10'>";

                echo "<tr> <th>Kod Item</th> <th>Nama Item</th> <th>Harga Per Item</th> <th>Nama Pembekal</th> <th>Kemaskini</th> <th>Padam</th></tr>";

                while ($row = mysqli_fetch_array($hasil)) {

                    $kodItem = $row['KodItem'];
                    $namaItem = $row['NamaItem'];
                    $hargaPerItem = $row['HargaPerItem'];
                    $namaPembekal = $row['NamaPembekal'];

                    echo "<tr>";

                    echo '<td>' . $kodItem . '</td>';

                    echo '<td>' . $namaItem . '</td>';

                    echo '<td>' . $hargaPerItem . '</td>';

                    echo '<td>' . $namaPembekal . '</td>';

                    echo '<td><a href="kemaskiniRekodItem.php?kodItem=' . $kodItem . '"><img src="icons/edit.png" alt = "editIcon" class = "editIcon"></a></td>';

                    echo '<td><a href="includes/padamRekodItem.inc.php?kodItem=' . $kodItem . '"><img src="icons/delete.png" alt = "deleteIcon" class = "deleteIcon"></a></td>';

                    echo "</tr>";

                }

                echo "</table>";
            ?>
        </form>
    </div>
<?php
    require 'footer.php';
?>