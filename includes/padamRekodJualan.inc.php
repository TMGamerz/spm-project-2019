<!-- Proses untuk memadam rekod jualan -->
<?php
    require_once 'dbh.inc.php';

    $kodJualan = $_GET['kodJualan'];
    $sql = "DELETE FROM `jualan` WHERE `KodJualan` = '$kodJualan'";

    if ($conn->query($sql) === TRUE) {
        // Mesej yang akan dipapar jika berjaya dipadamkan
        echo "<script>
                alert('Item berjaya dipadamkan');
                window.location.href = '../viewRekodJualan.php';
              </script>";
    } else {
        // Mesej yang akan dipapar jika tidak berjaya dipadamkan
        echo "<script>
                alert('Harap Maaf');
                window.location.href = '../viewRekodJualan.php';
              </script>";
    }
?>