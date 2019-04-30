<!-- Proses untuk log masuk -->
<?php
    require_once 'dbh.inc.php';
    session_start();

    if (isset($_POST['submit'])) {
        $NamaPengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
        $KataLaluan = mysqli_real_escape_string($conn, $_POST['kata_laluan']);

        $sql = "SELECT * FROM `pengguna` WHERE `NamaPengguna` = '$NamaPengguna'";
        $hasil = mysqli_query($conn, $sql);
        $semakHasil = mysqli_num_rows($hasil);

        if ($semakHasil < 1) {
            // Mesej yang akan dipapar jika tidak berjaya log masuk
            echo "<script>
                alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                window.location.href = '../index.php';
              </script>";
            exit();
        } else {
            // Log masuk
            $row = mysqli_fetch_assoc($hasil);
            $_SESSION['IDPengguna']= $row['IDPengguna'];
            $_SESSION['NamaPengguna']= $row['NamaPengguna'];
            $_SESSION['KataLaluan']= $row['KataLaluan'];
            // Mesej yang akan dipapar jika berjaya log masuk
            echo "<script>
                    alert('Anda sudah berjaya log masuk!');
                    window.location.href = '../menu.php';
                  </script>";
            exit();
        }
    } else {
        // Mesej yang akan dipapar jika tidak berjaya log masuk
        echo "<script>
                alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                window.location.href = '../index.php';
              </script>";
        exit();
    }
