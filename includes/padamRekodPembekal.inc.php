<!-- Proses untuk memadam rekod pembekal -->
<?php
    require_once 'dbh.inc.php';

    $kodPembekal = $_GET['kodPembekal'];
    $sql = "DELETE FROM `pembekal` WHERE `KodPembekal` = '$kodPembekal'";

    if ($conn->query($sql) === TRUE) {
        // Mesej yang akan dipapar jika berjaya dipadamkan
        echo "<script>
                alert('Anda sudah berjaya memadam rekod pembekal!');
                window.location.href = '../viewRekodPembekal.php';
              </script>";
    } else {
        // Mesej yang akan dipapar jika tidak berjaya dipadamkan
        echo "<script>
                alert('Anda gagal memadam rekod pembekal!\\nSila cuba sekali lagi.');
                window.location.href = '../viewRekodPembekal.php';
              </script>";
    }