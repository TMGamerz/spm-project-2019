<?php
require 'header.php';
?>

<?php
// select option value from database
include 'includes/dbh.inc.php';
$query = "SELECT * FROM `item`";
$result = mysqli_query($conn, $query);

// calculate total sales
$jumlahJualanCalc = false;
$kodJualan = "";
$tarikhJualan = "";
$kuantiti = 1;
$itemTerpilih = "";
$jumlahJualan = 0;

if (isset($_POST['kuantiti']) && isset($_POST['namaItem'])) {
    $jumlahJualanCalc = true;
    $kodJualan = $_POST['kodJualan'];
    $tarikhJualan = $_POST['tarikhJualan'];
    $kuantiti = $_POST['kuantiti'];
    $itemTerpilih = $_POST['namaItem'];
    $sql2 = "SELECT `HargaPerItem` FROM `item` WHERE `KodItem` = '$itemTerpilih'";
    $result2 = mysqli_query($conn, $sql2);
    $jumlahJualan = mysqli_fetch_assoc($result2)['HargaPerItem'] * $kuantiti;
}
?>

    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/tambahRekod-style.css">
        <title>Tambah Rekod Jualan</title>
    </head>

    <body>
<div class = "container">
    <h1>Tambah Rekod Jualan</h1>

    <form name = "tambahJualanForm" action = "includes/tambahRekodJualan.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_jualan">Kod Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_jualan" name = "kodJualan" value = "<?php echo $kodJualan ?>" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "tarikh_jualan">Tarikh Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "date" id = "tarikh_jualan" name = "tarikhJualan" value = "<?php echo $tarikhJualan ?>">
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_item">Nama Item: </label>
                </td>

                <td class = "col-75">
                    <select id = "nama_item" name = "namaItem" onChange="reSubmit();" required>
                        <option disabled hidden selected></option>
                        <?php
                        $sql3 = "SELECT KodItem, NamaItem FROM item";
                        $result3 = mysqli_query($conn, $sql3);
                        while ($row = mysqli_fetch_assoc($result3)){
                            $kodItem = $row['KodItem'];
                            $namaItem = $row["NamaItem"];
                            if ($kodItem != $itemTerpilih){
                                echo "<option value=\"" . $kodItem . "\">" . $namaItem . "</option>";
                            } else {
                                echo "<option selected value=\"" . $kodItem . "\">" . $namaItem . "</option>";
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
                    <input type = "number" id = "kuantiti_item_dijual" name = "kuantiti" onChange="reSubmit()" value = "<?php echo $kuantiti; ?>" min = "1" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_jualan">Harga Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_jualan" name = "hargaJualan" min="0.00" step="0.01" value = "<?php echo $jumlahJualan; ?>" required readonly>
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

<script>
    function reSubmit() {
        document.getElementsByName("tambahJualanForm")[0].action = "<?php echo $_SERVER["PHP_SELF"]; ?>";
        document.tambahJualanForm.submit();
    }
</script>

<?php
require "footer.php";
?>