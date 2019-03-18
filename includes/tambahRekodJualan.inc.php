<?php
if (isset($_POST['tambah'])) {
    include 'dbh.inc.php';

    $kodJualan = mysqli_real_escape_string($conn, $_POST['kodJualan']);
    $tarikhJualan = mysqli_real_escape_string($conn, $_POST['tarikhJualan']);
    $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
    $kuantitiItemDijual = mysqli_real_escape_string($conn, $_POST['kuantiti']);
    $hargaJualan = mysqli_real_escape_string($conn, $_POST['hargaJualan']);
    $IDPengguna = mysqli_fetch_array(mysqli_query($conn, "SELECT `IDPengguna` FROM pengguna"));

    # Error handlers
    // Check if the inputs are empty
    if (empty($kodJualan) || empty($tarikhJualan) || empty($kodItem) || empty($kuantitiItemDijual) || empty($hargaJualan)) {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodJualan.php?input=empty';
                  </script>";
        exit();
    } else {
        // Check if the user exists in the database
        $sql = "SELECT `KodJualan` FROM `jualan` WHERE `KodJualan` = '$kodJualan'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_fetch_array($result)) {
            echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodJualan.php?data=exists';
                  </script>";
            exit();
        } else {
            $query = mysqli_query($conn, "INSERT INTO `jualan`(`KodJualan`, `TarikhJualan`, `KodItem`, `KuantitiItemDijual`, `HargaJualan`, `IDPengguna`) VALUES('$kodjualan', '$tarikhJualan', '$kodItem', '$hargaJualan', `$IDPengguna`");

            if ($query) {
                echo "<script>alert('Anda sudah berjaya menambah rekod jualan!');
                      window.location.href = '../tambahRekodJualan.php?tambahJualan=berjaya';
                      </script>";
                return;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
} else {
    echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                  window.location = '../tambahRekodJualan.php?tamabh=error';
                  </script>";
    exit();
}