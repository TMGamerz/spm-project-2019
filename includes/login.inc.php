<?php

if (isset($_POST['submit'])) {

    require_once 'dbh.inc.php';

    $NamaPengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
    $KataLaluan = mysqli_real_escape_string($conn, $_POST['kata_laluan']);

    # Error handlers
    // Check if the user exists in the database
    $sql = "SELECT * FROM `pengguna` WHERE `NamaPengguna` = '$NamaPengguna'";
    $hasil = mysqli_query($conn, $sql);
    $semakHasil = mysqli_num_rows($hasil);

    if ($semakHasil < 1) {
        echo "<script>
            alert('Maklumat yang anda masuk tidak sah! Sila cuba sekali lagi');
            window.location.href = '../login.php';
          </script>";
        exit();
    } else {
        if ($row = mysqli_fetch_assoc($hasil)) {
            // De-hashing the password
            $hashedKataLaluanSemak = password_verify($KataLaluan, $row['KataLaluan']);
            if ($hashedKataLaluanSemak == false) {
                echo "<script>
                        alert('Maklumat yang anda masuk tidak sah! Sila cuba sekali lagi');
                        window.location.href = '../login.php';
                      </script>";
                exit();
            } elseif ($hashedKataLaluanSemak == true) {
                // Log in the user here
                echo "<script>
                        alert('Anda sudah berjaya log masuk!');
                        window.location.href = '../menu.php';
                      </script>";
                exit();
            }
        }
    }
} else {
    echo "<script>
            alert('Maklumat yang anda masuk tidak sah! Sila cuba sekali lagi');
            window.location.href = '../login.php';
          </script>";
    exit();
}

/*require_once 'dbh.inc.php';

$NamaPengguna = $_POST['nama_pengguna'];
$KataLaluan = $_POST['kata_laluan'];

$sql = "SELECT * FROM `pengguna` WHERE `NamaPengguna` = '$NamaPengguna' AND `KataLaluan` = '$KataLaluan';";
$hasil = mysqli_query($conn, $sql);
$semakHasil = mysqli_num_rows($hasil);

if ($semakHasil < 1) {
    echo "<script>
            alert('Maklumat yang anda masuk tidak sah! Sila cuba sekali lagi');
            window.location.href = '../index.php';
          </script>";
    exit();
} else {
    echo "<script>
            alert('Anda sudah berjaya log masuk!');
            window.location.href = '../menu.php';
          </script>";
}*/