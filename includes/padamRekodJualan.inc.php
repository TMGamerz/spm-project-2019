<!-- Proses untuk memadam rekod jualan -->
<?php
    require_once 'dbh.inc.php';

    $kodJualan = $_GET['kodJualan'];
    $sql = "DELETE FROM `jualan` WHERE `KodJualan` = '$kodJualan'";

    if ($conn->query($sql) === TRUE) {
        // Mesej yang akan dipapar jika berjaya dipadamkan
        echo "<script>
                alert('Anda sudah berjaya memadam rekod jualan!');
                window.location.href = '../viewRekodJualan.php';
              </script>";
    } else {
        // Mesej yang akan dipapar jika tidak berjaya dipadamkan
        echo "<script>
                alert('Anda gagal memadam rekod jualan!\\nSila cuba sekali lagi.');
                window.location.href = '../viewRekodJualan.php';
              </script>";
    }
?>