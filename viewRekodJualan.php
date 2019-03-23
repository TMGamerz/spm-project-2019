<?php
require "header.php";
?>

    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/viewRekodJualan-style.css">
        <title>Rekod Jualan</title>
    </head>

    <body>
<div class = "container">
    <h1>Kemaskini Rekod Jualan</h1>

    <form action = "" method = "POST">
        <?php
        /*Displays all data from 'item' table*/

        // connect to the database
        include('includes/dbh.inc.php');

        // number of results to show per page
        $per_page = 2;

        // get results from database
        // Joining tables is a fundamental principle of relational databases.
        // In your case, A and B are related with the id column, which means that you can use a syntax similar to this one:
        // INNER JOIN means that you'll only see rows where there are matching records in A and B.
        // If you want all the rows in A and matching records in B, you could change INNER JOIN to LEFT JOIN.
        // Conversely, if you want all the records from B and only the matching ones from A, use RIGHT JOIN.
        // Finally, if you need everything from both tables, matching or not, you can use FULL JOIN.
        $result = mysqli_query($conn ,"SELECT jualan.KodJualan, jualan.TarikhJualan, jualan.KuantitiItemDijual, jualan.HargaJualan, item.NamaItem FROM jualan INNER JOIN item ON jualan.KodItem=item.KodItem;")
        or die(mysqli_error($conn));

        echo "<table align = 'center' border='1' cellpadding='10'>";

        echo "<tr> <th>Kod Jualan</th> <th>Tarikh Jualan</th> <th>Nama Item</th> <th>Kuantiti Item Dijual</th> <th>Harga Jualan</th> <th>Kemaskini</th> <th>Padam</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
            $kodJualan = $row['KodJualan'];
            $tarikhJualan = $row['TarikhJualan'];
            $namaItem = $row['NamaItem'];
            $kuantitiItemDijual = $row['KuantitiItemDijual'];
            $hargaJualan = $row['HargaJualan'];
            // echo out the contents of each row into a table
            echo "<tr>";

            echo '<td>' . $kodJualan . '</td>';

            echo '<td>' . $tarikhJualan . '</td>';

            echo '<td>' . $namaItem . '</td>';

            echo '<td>' . $kuantitiItemDijual . '</td>';

            echo '<td>' . $hargaJualan . '</td>';

            echo '<td><a href="kemaskiniRekodItem.php?kodJualan=' . $kodJualan . '"><img src="icons/edit.png" alt = "editIcon" class = "editIcon"></a></td>';

            echo '<td><a href="includes/padamRekodJualan.inc.php?kodJualan=' . $kodJualan . '"><img src="icons/delete.png" alt = "deleteIcon" class = "deleteIcon"></a></td>';

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