<?php
    require_once('dbh.inc.php');

    $kodJualan = $_GET['kodJualan'];

    $sql = "DELETE FROM `jualan` WHERE `KodJualan` = '$kodJualan'";

    if ($conn->query($sql)===true) {
    echo "<script>
        alert('Item berjaya dipadamkan');
        window.location.href = '../viewRekodJualan.php';
    </script>
    ";
    } else {
    echo "<script>
        alert('Harap Maaf');
        window.location.href = '../viewRekodJualan.php';
    </script>
    ";
    }