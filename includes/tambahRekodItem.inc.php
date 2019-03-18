<?php
    if (isset($_POST['tambah'])) {
        include 'dbh.inc.php';

        $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
        $namaItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
        $hargaPerItem = mysqli_real_escape_string($conn, $_POST['hargaPerItem']);
        $kodPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);

        # Error handlers
        // Check if the inputs are empty
        if (empty($kodItem) || empty($namaItem) || empty($hargaPerItem) || empty($kodPembekal)) {
            echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodItem.php?input=empty';
                  </script>";
            exit();
        } else {
        // Check if the user exists in the database
        $sql = "SELECT `KodItem` FROM `item` WHERE `KodItem` = '$kodItem'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_fetch_array($result)) {
            echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodItem.php?data=exists';
                  </script>";
            exit();
        } else {
            $query = mysqli_query($conn, "INSERT INTO `item`(`KodItem`, `NamaItem`, `HargaPerItem`, `KodPembekal`) VALUES('$kodItem', '$namaItem', '$hargaPerItem', '$kodPembekal')");

            if ($query) {
                echo "<script>alert('Anda sudah berjaya menambah rekod item!');
                      window.location.href = '../tambahRekodItem.php?tambahItem=berjaya';
                      </script>";
                return;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
    } else {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodItem.php?tambah=error';
                  </script>";
        exit();
    }