<?php
require "header.php";
include 'includes/dbh.inc.php';

// show all data from selected row of item
$oldKodItem = $_GET['kodItem'];
$sql2 = "SELECT * FROM `item` LEFT JOIN pembekal ON item.KodPembekal=pembekal.KodPembekal WHERE `KodItem` = '$oldKodItem';";
$hasil2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($hasil2);
$namaItem = $row2['NamaItem'];
$hargaPerItem = $row2['HargaPerItem'];
$oldKodPembekal = $row2['KodPembekal'];
$oldNamaPembekal = $row2['NamaPembekal'];
?>

    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/kemaskiniRekod-style.css">
        <title>Kemaskini Rekod</title>
    </head>

    <body>
<div class = "container">
    <h1>Kemaskini Rekod Item</h1>

    <form action = "includes/kemaskiniRekodItem.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_item">Kod Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_item" name = "kodItem" value="<?php echo $oldKodItem;?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_item">Nama Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "nama_item" name = "namaItem" value = "<?php echo $namaItem;?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_per_item">Harga Per Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_per_item" name = "hargaPerItem" min="0.00" step="0.01" value = "<?php echo $hargaPerItem;?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_pembekal">Nama Pembekal: </label>
                </td>

                <td class = "col-75">

                    <select id = "nama_pembekal" name = "namaPembekal" required >
                        <option selected value='<?php echo $oldKodPembekal; ?>'><?php echo $oldNamaPembekal; ?></option>
                        <?php
                        // show available option for all pembekal
                        $sql = "SELECT * FROM `pembekal`";
                        $hasil = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($hasil)) {
                            echo '<option value='.$row['KodPembekal'].'>'.$row['NamaPembekal'].'</option>';
                        }
                        ?>
                    </select>
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