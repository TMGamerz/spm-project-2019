<!-- Proses untuk menambah rekod pembekal -->
<?php
    include 'dbh.inc.php';

    if (isset($_POST['tambah'])) {
        $kodPembekal = mysqli_real_escape_string($conn, $_POST['kodPembekal']);
        $namaPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
        $telefonPembekal = mysqli_real_escape_string($conn, $_POST['telefonPembekal']);

        $sql1 = "SELECT `KodPembekal` FROM `pembekal` WHERE `KodPembekal` = '$kodPembekal'";
        $hasil1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($hasil1) > 0) {
            // Mesej yang akan dipapar jika tidak berjaya ditambahkan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                    window.location = '../tambahRekodPembekal.php?data=exists';
                  </script>";
            exit();
        } else {
            $hasil2 = mysqli_query($conn, "INSERT INTO `pembekal`(`KodPembekal`, `NamaPembekal`, `TelefonPembekal`) VALUES('$kodPembekal', '$namaPembekal', '$telefonPembekal')");

            if ($hasil2) {
                // Mesej yang akan dipapar jika berjaya ditambahkan
                echo "<script>
                        alert('Anda sudah berjaya menambah rekod pembekal!');
                        window.location.href = '../tambahRekodPembekal.php?tambahPembekal=berjaya';
                      </script>";
                return;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
?>