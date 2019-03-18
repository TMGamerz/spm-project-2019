<?php
    require_once('dbh.inc.php');

    $KodPembekal = $_GET['id'];

    $sql = "DELETE FROM `pembekal` WHERE `KodPembekal` = '$KodPembekal'";

    if ($conn->query($sql)===true) {
    echo "<script>
        alert('Item berjaya dipadamkan');
        window.location.href = '../viewRekodPembekal.php';
    </script>
    ";
    } else {
    echo "<script>
        alert('Harap Maaf');
        window.location.href = '../viewRekodPembekal.php';
    </script>
    ";
    }