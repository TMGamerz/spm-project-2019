<?php
    if (isset($_POST['tambah'])) {
        include 'dbh.inc.php';

        $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
        $namaItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
        $hargaPerItem = mysqli_real_escape_string($conn, $_POST['hargaPerItem']);
        $namaPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);

        # Error handlers
        // Check if the inputs are empty
        if (empty($kodItem) || empty($namaItem) || empty($hargaPerItem) || empty($namaPembekal)) {
            header("Location: ../tambahRekodItem.php?input=empty");
            exit();
        } else {
        // Check if the user exists in the database
        $sql = "SELECT KodItem FROM item WHERE KodItem = '$kodItem'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_fetch_array($result)) {
            echo "<script>alert('Data exists');
                  window.location = 'tambahRekodItem.php?data=exists';
                  </script>";
            exit();
        } else {
            $query = mysqli_query($conn, "INSERT INTO item(KodItem, NamaItem, HargaPerItem, NamaPembekal) VALUES('$kodItem', '$namaItem', '$hargaPerItem', '$namaPembekal')");

            if ($query) {
                echo "<script>alert('Berjaya tambah .$namaItem.');
                      window.location.href = 'menu.php?tambah=berjaya';
                      </script>";
                return;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
    } else {
        header("Location: ../tambahRekodItem.php?tambah=error");
        exit();
    }