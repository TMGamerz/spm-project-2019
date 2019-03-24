<?php
include 'dbh.inc.php';
if (isset($_POST['kemaskini'])) {
    $sql1 = "SELECT * from `pembekal`";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);

    $oldKodPembekal = $row1['KodPembekal'];
    $kodPembekal = mysqli_real_escape_string($conn, $_POST['kodPembekal']);
    $namaPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
    $telefonPembekal = mysqli_real_escape_string($conn, $_POST['telefonPembekal']);

    $sql2 = "UPDATE `pembekal` SET `KodPembekal` = '$kodPembekal', `NamaPembekal` = '$namaPembekal', `TelefonPembekal` = '$telefonPembekal' WHERE `KodPembekal` = '$oldKodPembekal'";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if ($result2) {
        echo "<script>alert('Anda sudah berjaya kemaskini rekod pembekal!');
          window.location.href = '../viewRekodPembekal.php?kemaskiniPembekal=berjaya';
          </script>";
        return;
    } else {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
              window.location.href = '../viewRekodPembekal.php?kemaskiniPembekal=gagal';
              </script>";
        die(mysqli_error($conn));
    }
}
?>
