<?php
    require "header.php";
    include 'includes/dbh.inc.php';

    // show all data from selected row of jualan
    $oldKodJualan = $_GET['kodJualan'];
    $sql = "SELECT * FROM `jualan` LEFT JOIN `item` ON jualan.KodItem = item.KodItem WHERE `KodJualan` = '$oldKodJualan'";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($hasil);

    $oldTarikhJualan = $row['TarikhJualan'];
    $oldKodItem = $row['KodItem'];
    $oldKuantitiItemDijual = $row['KuantitiItemDijual'];
    $oldHargaJualan = $row['HargaJualan'];
    $oldIDPengguna = $row['IDPengguna'];

    $oldNamaItem = $row['NamaItem'];
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/kemaskiniRekod-style.css">
    <title>Kemaskini Rekod Jualan</title>
</head>

<body>
<div class = "container">  
    <h1>Kemaskini Rekod Jualan</h1>

    <form action = "includes/kemaskiniRekodJualan.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_jualan">Kod Jualan</label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_jualan" name = "kodJualan" value = "<?php echo $oldKodJualan; ?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "tarikh_jualan">Tarikh Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "date" id = "tarikh_jualan" name = "tarikhJualan" value = "<?php echo $oldTarikhJualan; ?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_item">Nama Item: </label>
                </td>

                <td class = "col-75">
                    <select id = "nama_item" name = "namaItem" required>
                        <?php
                        // show available option for all item
                        $sql2 = "SELECT * FROM `item`";
                        $hasil2 = mysqli_query($conn, $sql2);
                        while($row2 = mysqli_fetch_array($hasil2)) {
                            if ($row2['KodItem'] === $oldKodItem) {
                                echo '<option selected value='.$oldKodItem.'>'.$oldNamaItem.'</option>';
                            } else {
                                echo '<option value='.$row2['KodItem'].'>'.$row2['NamaItem'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "kuantiti_item_dijual">Kuantiti Item Dijual: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "kuantiti_item_dijual" name = "kuantiti" min = "1" value = "<?php echo $oldKuantitiItemDijual; ?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_jualan">Harga Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_jualan" name = "hargaJualan" min="0.00" step="0.01" value = "<?php echo $oldHargaJualan; ?>" required>
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
    require "footer.php";
?>