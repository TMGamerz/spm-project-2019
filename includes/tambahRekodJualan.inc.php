<?php
session_start();
include 'dbh.inc.php';

if (isset($_POST['tambah'])) {
    $tarikhJualan = mysqli_real_escape_string($conn, $_POST['tarikhJualan']);
    if (empty($tarikhJualan)) {
        $tarikhJualan = date("Y-m-d");
    }
    $kodItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
    $kuantitiItemDijual = mysqli_real_escape_string($conn, $_POST['kuantiti']);
    $hargaJualan = mysqli_real_escape_string($conn, $_POST['hargaJualan']);
    $IDPengguna = $_SESSION['IDPengguna'];

    # Error handlers
    // Check if the inputs are empty
    if (empty($kodItem) || empty($kuantitiItemDijual) || empty($hargaJualan)) {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                      window.location = '../tambahRekodJualan.php?input=empty';
              </script>";
        exit();
    } else {
        $sql2 = "INSERT INTO `jualan`(`TarikhJualan`, `KodItem`, `KuantitiItemDijual`, `HargaJualan`, `IDPengguna`) VALUES('$tarikhJualan', '$kodItem', '$kuantitiItemDijual', '$hargaJualan', '$IDPengguna')";
        $query = mysqli_query($conn, $sql2);

        if ($query) {
            echo "<script>alert('Anda sudah berjaya menambah rekod jualan!');
                          window.location = '../tambahRekodJualan.php?tambahJualan=berjaya';
                  </script>";
            return;
        } else {
            die(mysqli_error($conn));
        }
    }
    } else {
    echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodJualan.php?tambah=error';
          </script>";
    exit();
}