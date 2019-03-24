<?php
include('dbh.inc.php');

$KodItem = $_POST['select-item'];

$sql = "SELECT * FROM `item` WHERE `KodItem` = '$KodItem'";
$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hasil);
$namaItemSelected = $row['NamaItem'];
// Output the nama item selected
if ($row > 0) {
    echo "<h1>".$namaItemSelected."</h1>";
}
$sql2 = "SELECT * FROM `jualan` WHERE `KodItem` = '$KodItem'";
$hasil2 = mysqli_query($conn, $sql2);
// output the rekod jualan where got nama item selected
/*if (mysqli_num_rows($hasil) > 0) {
    echo "<table align = 'center' border='1' cellpadding='10'>";

    echo "<tr> <th>Kod Item</th> <th>Nama Item</th> <th>Harga Per Item</th> <th>Nama Pembekal</th> <th>Kemaskini</th> <th>Padam</th></tr>";

    // loop through results of database query, displaying them in the table
    while($row = mysqli_fetch_array($hasil)) {
        $kodJualan = $row['KodJualan'];
        $tarikhJualan = $row['TarikhJualan'];
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
}*/