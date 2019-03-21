<?php
if (isset($_POST['tambah'])) {
    include 'dbh.inc.php';

    $kodPembekal = mysqli_real_escape_string($conn, $_POST['kodPembekal']);
    $namaPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
    $telefonPembekal = mysqli_real_escape_string($conn, $_POST['telefonPembekal']);

    # Error handlers
    // Check if the user exists in the database
    $sql = "SELECT `KodPembekal` FROM `pembekal` WHERE `KodPembekal` = '$kodPembekal'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result)) {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
              window.location = '../tambahRekodPembekal.php?data=exists';
              </script>";
        exit();
    } else {
        $query = mysqli_query($conn, "INSERT INTO `pembekal`(`KodPembekal`, `NamaPembekal`, `TelefonPembekal`) VALUES('$kodPembekal', '$namaPembekal', '$telefonPembekal')");

        if ($query) {
            echo "<script>alert('Anda sudah berjaya menambah rekod pembekal!');
                  window.location.href = '../tambahRekodPembekal.php?tambahPembekal=berjaya';
                  </script>";
            return;
        } else {
            die(mysqli_error($conn));
        }
    }
}
