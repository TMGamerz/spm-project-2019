<!-- Halaman untuk memaparkan semua rekod pembekal dari pangkalan data -->
<?php
    require 'header.php';
    include 'includes/dbh.inc.php';
?>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/viewRekodPembekal-style.css">
        <title>Rekod Pembekal</title>
    </head>

    <body>
    <div class = "container">
        <h1>Kemaskini Rekod Pembekal</h1>

        <form action = "" method = "POST">
            <?php
                // Mencapai data pembekal dari pangkalan data dan memaparkan
                $hasil = mysqli_query($conn ,"SELECT * FROM `pembekal` ORDER BY `KodPembekal` ASC;")
                or die(mysqli_error($conn));

                echo "<table align = 'center' border='1' cellpadding='10'>";

                echo "<tr> <th>Kod Pembekal</th> <th>Nama Pembekal</th> <th>Telefon Pembekal</th> <th>Kemaskini</th> <th>Padam</th></tr>";

                while ($row = mysqli_fetch_array($hasil)) {
                    $kodPembekal = $row['KodPembekal'];
                    $namaPembekal = $row['NamaPembekal'];
                    $telefonPembekal = $row['TelefonPembekal'];

                    echo "<tr>";

                    echo '<td>' . $kodPembekal . '</td>';

                    echo '<td>' . $namaPembekal . '</td>';

                    echo '<td>' . $telefonPembekal . '</td>';

                    echo '<td><a href="kemaskiniRekodPembekal.php?kodPembekal=' . $kodPembekal . '"><img src="icons/edit.png" alt = "editIcon" class = "editIcon"></a></td>';

                    echo '<td><a href="includes/padamRekodPembekal.inc.php?kodPembekal=' . $kodPembekal . '"><img src="icons/delete.png" alt = "deleteIcon" class = "deleteIcon"></a></td>';

                    echo "</tr>";

                }

                echo "</table>";
            ?>
        </form>
    </div>
<?php
    require 'footer.php';
?>