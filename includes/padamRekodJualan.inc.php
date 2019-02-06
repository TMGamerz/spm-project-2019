<?php
    require_once('dbh.inc.php');

    $KodJualan = $_GET['id'];

    $sql = "DELETE FROM jualan WHERE KodJualan = '$KodJualan'";

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