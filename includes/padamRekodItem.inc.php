<?php
    require_once('dbh.inc.php');

    $kodItem = $_GET['kodItem'];

    $sql = "DELETE FROM `item` WHERE `KodItem` = '$kodItem'";

    if ($conn->query($sql)===true) {
        echo "<script>
        alert('Anda sudah berjaya memadam rekod item!');
        window.location.href = '../viewRekodItem.php?padam=berjaya';
        </script>
        ";
    } else {
        echo "<script>
        alert('Anda gagal memadam rekod item! Sila cuba sekali lagi.');
        window.location.href = '../viewRekodItem.php?padam=failed';
        </script>
        ";
    }