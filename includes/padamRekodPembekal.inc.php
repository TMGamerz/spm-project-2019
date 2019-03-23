<?php
    require_once('dbh.inc.php');

    $kodPembekal = $_GET['kodPembekal'];

    $sql = "DELETE FROM `pembekal` WHERE `KodPembekal` = '$kodPembekal'";

    if ($conn->query($sql)===true) {
    echo "<script>
        alert('Anda sudah berjaya memadam rekod pembekal!');
        window.location.href = '../viewRekodPembekal.php?padam=berjaya';
    </script>
    ";
    } else {
    echo "<script>
        alert('Anda gagal memadam rekod pembekal! Sila cuba sekali lagi.');
        window.location.href = '../viewRekodPembekal.php?padam=failed';
    </script>
    ";
    }