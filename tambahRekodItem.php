<?php
    require "header.php";
?>

<?php
// select option value from database
include 'includes/dbh.inc.php';

$query = "SELECT * FROM `pembekal`";
$result = mysqli_query($conn, $query);

?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/tambahRekod-style.css">
    <title>Tambah Rekod Item</title>
</head>

<body>
<div class = "container">  
    <h1>Tambah Rekod Item</h1>

    <form action = "includes/tambahRekodItem.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_item">Kod Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_item" name = "kodItem" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_item">Nama Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "nama_item" name = "namaItem" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_per_item">Harga Per Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_per_item" name = "hargaPerItem" min="0.00" step="0.01" value = "0.00" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_pembekal">Nama Pembekal: </label>
                </td>

                <td class = "col-75">
                    <select id = "nama_pembekal" name = "namaPembekal" required>
                        <option disabled hidden selected></option>
                        <?php
                            while($row = mysqli_fetch_array($result)) {
                                echo '<option value='.$row['KodPembekal'].'>'.$row['NamaPembekal'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "2">
                    <input type="submit" value = "Tambah" name = "tambah">
                </td>
            </tr>
        </table>
    </form>

</div> 

<?php
    require 'footer.php';
?>