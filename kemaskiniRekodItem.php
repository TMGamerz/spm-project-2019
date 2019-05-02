<!-- Halaman untuk mengemaskini rekod item -->
<?php
    require 'header.php';
    include 'includes/dbh.inc.php';

    // Mendapat item yang dipilih untuk pengguna
    $oldKodItem = $_GET['kodItem'];
    // sql untuk mencapai data daripada pangkalan data
    $sql = "SELECT * FROM `item` LEFT JOIN `pembekal` ON item.KodPembekal=pembekal.KodPembekal WHERE `KodItem` = '$oldKodItem';";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($hasil);
    $oldNamaItem = $row['NamaItem'];
    $oldHargaPerItem = $row['HargaPerItem'];
    $oldKodPembekal = $row['KodPembekal'];
    $oldNamaPembekal = $row['NamaPembekal'];
?>

    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/kemaskiniRekod-style.css">
        <title>Kemaskini Rekod Item</title>
    </head>

    <body>
    <div class = "container">
        <h1>Kemaskini Rekod Item</h1>
        <!-- Form untuk mengemaskini rekod item-->
        <form action = "includes/kemaskiniRekodItem.inc.php" method = "POST">
            <table align = "center">
                <tr class = "row">
                    <td class = "col-25">
                        <label for = "kod_item">Kod Item: </label>
                    </td>

                    <td class = "col-75">
                        <input type = "text" id = "kod_item" name = "kodItem" value="<?php echo $oldKodItem;?>" maxlength = "6" required>
                    </td>
                </tr>

                <tr class = "row">
                    <td class = "col-25">
                        <label for = "nama_item">Nama Item: </label>
                    </td>

                    <td class = "col-75">
                        <input type = "text" id = "nama_item" name = "namaItem" value = "<?php echo $oldNamaItem;?>" maxlength = "50" required>
                    </td>
                </tr>

                <tr class = "row">
                    <td class = "col-25">
                        <label for = "harga_per_item">Harga Per Item: </label>
                    </td>

                    <td class = "col-75">
                        <input type = "number" id = "harga_per_item" name = "hargaPerItem" min="0.00" step="0.01" value = "<?php echo $oldHargaPerItem;?>" maxlength = "11" required>
                    </td>
                </tr>

                <tr class = "row">
                    <td class = "col-25">
                        <label for = "nama_pembekal">Nama Pembekal: </label>
                    </td>

                    <td class = "col-75">
                        <select class = "kemaskini-select" id = "nama_pembekal" name = "namaPembekal" required >
                            <?php
                            // Menunjukkan pilihan semua pembekal dari pangkalan data
                            $sql2 = "SELECT * FROM `pembekal`";
                            $hasil2 = mysqli_query($conn, $sql2);
                            while($row2 = mysqli_fetch_array($hasil2)) {
                                if ($row2['KodPembekal'] === $oldKodPembekal) {
                                    echo '<option selected value='.$oldKodPembekal.'>'.$oldNamaPembekal.'</option>';
                                } else {
                                    echo '<option value='.$row2['KodPembekal'].'>'.$row2['NamaPembekal'].'</option>';
                                }
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