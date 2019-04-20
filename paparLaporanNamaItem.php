<?php
    require "header.php";
?>
<head>
    <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
    <title>Papar Laporan Ikut Nama Item</title>
</head>

<body>
<div class = "container">  
    <h1>Papar Laporan Ikut Nama Item</h1>

    <form action = "viewLaporanIkutItem.php" method = "GET">
        <table align = "center">
            <tr class = "row">
                <td>
                    <select class = "papar-select" id="select-item" name="select-item" required>
                        <option disabled hidden selected>Pilih item</option>
                        <?php
                            include 'includes/dbh.inc.php';
                            // show available option for all item
                            $sql = "SELECT * FROM `item`";
                            $hasil = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($hasil)) {
                                echo '<option value='.$row['KodItem'].'>'.$row['NamaItem'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "3" class = "col-submit">
                    <input type="submit" value = "Papar" name = "papar">
                </td>
            </tr>
        </table>
    </form>
</div> 

<?php
    require 'footer.php';
?>