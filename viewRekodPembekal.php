<?php
    require 'header.php';
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
            /*Displays all data from 'item' table*/

            // connect to the database
            include('includes/dbh.inc.php');

            // number of results to show per page
            $per_page = 2;

            // get results from database
            $result = mysqli_query($conn ,"SELECT * FROM `pembekal` ORDER BY `KodPembekal` ASC;")
            or die(mysqli_error($conn));

            echo "<table align = 'center' border='1' cellpadding='10'>";

            echo "<tr> <th>Kod Pembekal</th> <th>Nama Pembekal</th> <th>Telefon Pembekal</th> <th>Kemaskini</th> <th>Padam</th></tr>";

            // loop through results of database query, displaying them in the table
            while($row = mysqli_fetch_array($result)) {
                $kodPembekal = $row['KodPembekal'];
                $namaPembekal = $row['NamaPembekal'];
                $telefonPembekal = $row['TelefonPembekal'];

                // echo out the contents of each row into a table
                echo "<tr>";

                echo '<td>' . $kodPembekal . '</td>';

                echo '<td>' . $namaPembekal . '</td>';

                echo '<td>' . $telefonPembekal . '</td>';

                echo '<td><a href="kemaskiniRekodPembekal.php?kodPembekal=' . $kodPembekal . '"><img src="icons/edit.png" alt = "editIcon" class = "editIcon"></a></td>';

                echo '<td><a href="includes/padamRekodPembekal.inc.php?kodPembekal=' . $kodPembekal . '"><img src="icons/delete.png" alt = "deleteIcon" class = "deleteIcon"></a></td>';

                echo "</tr>";

            }

            // close table
            echo "</table>";
        ?>
    </form>
</div>

<?php
    require 'footer.php';
?>