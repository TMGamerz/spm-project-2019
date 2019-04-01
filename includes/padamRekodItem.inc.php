<?php
    require_once('dbh.inc.php');

    $kodItem = $_GET['kodItem'];

    $sql = "DELETE FROM `item` WHERE `KodItem` = '$kodItem'";

    if ($conn->query($sql)===true) {
        echo "<script>
        alert('Item berjaya dipadamkan');
        window.location.href = '../viewRekodItem.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Harap Maaf');
        window.location.href = '../viewRekodItem.php';
        </script>
        ";
    }