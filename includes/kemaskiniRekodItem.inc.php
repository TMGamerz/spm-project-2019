<?php
include 'dbh.inc.php';
if (isset($_POST['kemaskini'])) {
    $sql1 = "SELECT * from `item`";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result1);

    $oldKodItem = $row['KodItem'];
    $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
    $namaItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
    $kodPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
    $hargaPerItem = mysqli_real_escape_string($conn, $_POST['hargaPerItem']);

    $sql2 = "UPDATE `item` SET `KodItem` = '$kodItem', `NamaItem` = '$namaItem', `KodPembekal` = '$kodPembekal', `HargaPerItem` = '$hargaPerItem' WHERE `KodItem` = '$oldKodItem'";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if ($result2) {
        echo "<script>alert('Anda sudah berjaya kemaskini rekod item!');
          window.location.href = '../viewRekodItem.php?kemaskiniItem=berjaya';
          </script>";
        return;
    } else {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
              window.location.href = '../viewRekodItem.php?kemaskiniItem=gagal';
              </script>";
        die(mysqli_error($conn));
    }
}
?>
