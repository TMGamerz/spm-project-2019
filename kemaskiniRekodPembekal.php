<?php
require 'header.php';
include 'includes/dbh.inc.php';
$oldKodPembekal = $_GET['kodPembekal'];
$sql = "SELECT * FROM `pembekal` WHERE `KodPembekal` = '$oldKodPembekal'";
$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hasil);
$namaPembekal = $row['NamaPembekal'];
$telefonPembekal = $row['TelefonPembekal'];
?>

    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/kemaskiniRekod-style.css">
        <title>Kemaskini Rekod Pembekal</title>
    </head>

    <body>
<div class = "container">
    <h1>Kemaskini Rekod Pembekal</h1>

    <form action = "includes/kemaskiniRekodPembekal.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_pembekal">Kod Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_pembekal" name = "kodPembekal" value = "<?php echo $oldKodPembekal;?>" maxlength = "5">
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_pembekal">Nama Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "nama_pembekal" name = "namaPembekal" value = "<?php echo $namaPembekal;?>" maxlength = "50">
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "telefon_pembekal">Telefon Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "telefon_pembekal" name = "telefonPembekal" value = "<?php echo $telefonPembekal;?>" maxlength = "15">
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "2">
                    <input type="submit" value = "Kemaskini" name = "kemaskini">
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
require 'footer.php';
?>