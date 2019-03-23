<?php
require "header.php";
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
        /*Displays all data from 'item' table*/

        // connect to the database
        include('includes/dbh.inc.php');

        // get results from database
        // Joining tables is a fundamental principle of relational databases.
        // In your case, A and B are related with the id column, which means that you can use a syntax similar to this one:
        // INNER JOIN means that you'll only see rows where there are matching records in A and B.
        // If you want all the rows in A and matching records in B, you could change INNER JOIN to LEFT JOIN.
        // Conversely, if you want all the records from B and only the matching ones from A, use RIGHT JOIN.
        // Finally, if you need everything from both tables, matching or not, you can use FULL JOIN.
        $result = mysqli_query($conn ,"SELECT * FROM `item` LEFT JOIN `pembekal` ON `item`.`KodPembekal` = `pembekal`.`KodPembekal` ORDER BY `KodItem` ASC;")
        or die(mysqli_error($conn));

        echo "<table align = 'center' border='1' cellpadding='10'>";

        echo "<tr> <th>Kod Item</th> <th>Nama Item</th> <th>Harga Per Item</th> <th>Nama Pembekal</th> <th>Kemaskini</th> <th>Padam</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array($result)) {

            $kodItem = $row['KodItem'];
            $namaItem = $row['NamaItem'];
            $hargaPerItem = $row['HargaPerItem'];
            $namaPembekal = $row['NamaPembekal'];
            // echo out the contents of each row into a table
            echo "<tr>";

            echo '<td>' . $kodItem . '</td>';

            echo '<td>' . $namaItem . '</td>';

            echo '<td>' . $hargaPerItem . '</td>';

            echo '<td>' . $namaPembekal . '</td>';

            echo '<td><a href="kemaskiniRekodItem.php?kodItem=' . $kodItem . '"><img src="icons/edit.png" alt = "editIcon" class = "editIcon"></a></td>';

            echo '<td><a href="includes/padamRekodItem.inc.php?kodItem=' . $kodItem . '"><img src="icons/delete.png" alt = "deleteIcon" class = "deleteIcon"></a></td>';

            echo "</tr>";

        }

        // close table>
        echo "</table>";
        ?>
    </form>
</div>

<?php
require 'footer.php';
?>