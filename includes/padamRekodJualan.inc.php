<?php
    require_once('dbh.inc.php');

    $kodJualan = $_GET['kodJualan'];

    $sql = "DELETE FROM `jualan` WHERE `KodJualan` = '$kodJualan'";

    if ($conn->query($sql)===true) {
    echo "<script>
        alert('Anda sudah berjaya memadam rekod jualan!');
        window.location.href = '../viewRekodJualan.php?padam=berjaya';
    </script>
    ";
    } else {
    echo "<script>
        alert('Anda gagal memadam rekod jualan! Sila cuba sekali lagi.');
        window.location.href = '../viewRekodJualan.php?padam=failed';
    </script>
    ";
    }