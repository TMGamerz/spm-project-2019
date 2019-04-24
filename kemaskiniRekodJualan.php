<?php
require 'header.php';
require_once 'includes/dbh.inc.php';

// default values
$jumlahJualanCalc = false;
$kodJualan = "-";
$tarikhJualan = "mm/dd/yyyy";
$hargaPerItem = 0;
$itemTerpilih = "";
$kuantiti = 1;
$jumlahJualan = 0;

// if KodJualan is given, then get data from database and show all data from selected row of jualan
if (isset($_GET['kodJualan'])) {
    $oldKodJualan = $_GET['kodJualan'];
    $sql1 = "SELECT * FROM `jualan` LEFT JOIN `item` ON jualan.KodItem = item.KodItem WHERE `KodJualan` = '$oldKodJualan'";
    $hasil1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($hasil1);
    $oldTarikhJualan = $row1['TarikhJualan'];
    $oldKodItem = $row1['KodItem'];
    $oldKuantitiItemDijual = $row1['KuantitiItemDijual'];
    $oldHargaJualan = $row1['HargaJualan'];
    $oldNamaItem = $row1['NamaItem'];
    $sql = "SELECT `HargaPerItem` FROM `item` WHERE KodItem = '$oldKodItem'";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($hasil);
    $oldHargaPerItem = $row['HargaPerItem'];
}

// Calculate the total sales ONLY WHEN both NamaItem and KuantitiItemDijual is given
// WARNING/NOTE: this will overwrite $kuantiti and $itemTerpilih
if (isset($_POST['kuantiti']) && isset($_POST['namaItem'])) {
    $jumlahJualanCalc = true;

    $itemTerpilih = $_POST['namaItem'];
    $oldKodItem = $itemTerpilih;

    $tarikhJualan = $_POST['tarikhJualan'];
    $oldTarikhJualan = $_POST['tarikhJualan'];

    $kuantiti = $_POST['kuantiti'];
    $oldKuantitiItemDijual = $_POST['kuantiti'];

    $sql3 = "SELECT `NamaItem`,`HargaPerItem` FROM `item` WHERE `KodItem` = '$itemTerpilih'";
    $result3 = mysqli_query($conn, $sql3);
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $oldHargaPerItem = $row3['HargaPerItem'];
        $jumlahJualan = $row3['HargaPerItem'] * $kuantiti;
        $oldHargaJualan = $jumlahJualan;
        $oldNamaItem = $row3['NamaItem'];
    }
}
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/kemaskiniRekod-style.css">
    <title>Kemaskini Rekod Jualan</title>
</head>

<body>
<div class = "container">
    <h1>Kemaskini Rekod Jualan</h1>

    <form name = "kemaskiniJualanForm" action = "includes/kemaskiniRekodJualan.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_jualan">Kod Jualan</label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_jualan" name = "kodJualan" value = "<?php echo $oldKodJualan; ?>" required readonly>
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
                    <select class = "kemaskini-select" id = "nama_item" name = "namaItem" onchange = "reSubmit()" required>
                        <?php
                        // show available option for all item
                        $sql4 = "SELECT * FROM `item`";
                        $hasil4 = mysqli_query($conn, $sql4);
                        while ($row4 = mysqli_fetch_array($hasil4)) {
                            if ($row4['KodItem'] === $oldKodItem) {
                                echo '<option selected value=' . $row4['KodItem'] . '>' . $row4['NamaItem'] . '</option>';
                            } else {
                                echo '<option value=' . $row4['KodItem'] . '>' . $row4['NamaItem'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_per_item">Harga Per Item: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_per_item" name = "hargaPerItem" value = "<?php echo $oldHargaPerItem; ?>" min = "1" required readonly>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "kuantiti_item_dijual">Kuantiti Item Dijual: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "kuantiti_item_dijual" name = "kuantiti" min = "1" value = "<?php echo $oldKuantitiItemDijual; ?>" onchange = "reSubmit()" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_jualan">Harga Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_jualan" name = "hargaJualan" min="0.00" step="0.01" value = "<?php echo $oldHargaJualan; ?>" required readonly>
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

<script>
    function reSubmit() {
        document.getElementsByName("kemaskiniJualanForm")[0].action = "<?php
            echo $_SERVER['PHP_SELF'];
            if (isset($_GET['kodJualan'])) {
                echo '?kodJualan=' . $_GET['kodJualan'];
            }
            ?>";
        document.kemaskiniJualanForm.submit();
    }
</script>

<?php
    require 'footer.php';
?>