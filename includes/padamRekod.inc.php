<?php
require_once('dbh.inc.php');

$KodItem = $_GET['id'];

$sql = "DELETE FROM item WHERE KodItem = '$KodItem'";
echo $KodItem;

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