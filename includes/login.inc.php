<?php
    require_once 'dbh.inc.php';
    session_start();

    if (isset($_POST['submit'])) {
        $NamaPengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
        $KataLaluan = mysqli_real_escape_string($conn, $_POST['kata_laluan']);

        // Check whether the user exists in the database
        $sql = "SELECT * FROM `pengguna` WHERE `NamaPengguna` = '$NamaPengguna'";
        $hasil = mysqli_query($conn, $sql);
        $semakHasil = mysqli_num_rows($hasil);

        if ($semakHasil < 1) {
            echo "<script>
                alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                window.location.href = '../index.php';
              </script>";
            exit();
        } else {
            // Log in the user
            $row = mysqli_fetch_assoc($hasil);
            $_SESSION['IDPengguna']= $row['IDPengguna'];
            $_SESSION['NamaPengguna']= $row['NamaPengguna'];
            $_SESSION['KataLaluan']= $row['KataLaluan'];
            echo "<script>
                    alert('Anda sudah berjaya log masuk!');
                    window.location.href = '../menu.php';
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                window.location.href = '../index.php';
              </script>";
        exit();
    }
