<!-- Proses untuk memadam rekod item -->
<?php
    require_once 'dbh.inc.php';

    $kodItem = $_GET['kodItem'];
    $sql = "DELETE FROM `item` WHERE `KodItem` = '$kodItem'";

    if ($conn->query($sql) === TRUE) {
        // Mesej yang akan dipapar jika berjaya dipadamkan
        echo "<script>
                alert('Anda sudah berjaya memadam rekod item!');
                window.location.href = '../viewRekodItem.php';
              </script>";
    } else {
        // Mesej yang akan dipapar jika tidak berjaya dipadamkan
        echo "<script>
                alert('Anda gagal memadam rekod item!\\nSila cuba sekali lagi.');
                window.location.href = '../viewRekodItem.php';
              </script>";
    }
?>