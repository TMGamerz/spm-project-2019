<?php
/*include 'dbh.inc.php';
if (isset($_POST['kemaskini'])) {
    $oldKodItem = $_GET['kodItem'];

    $sql1 = "SELECT * FROM `item` LEFT JOIN pembekal ON item.KodPembekal=pembekal.KodPembekal WHERE `KodItem` = '$oldKodItem';";
    $hasil1 = mysqli_query($conn, $sql1);

    $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
    $namaItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
    $kodPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
    $hargaPerItem = mysqli_real_escape_string($conn, $_POST['hargaPerItem']);

    $sql2 = "UPDATE `item` SET `KodItem` = '$kodItem', `NamaItem` = '$namaItem', `KodPembekal` = '$kodPembekal', `HargaPerItem` = '$hargaPerItem' WHERE `KodItem` = '$oldKodItem'";
    $hasil2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

    if ($hasil1 && $hasil2) {
        echo "<script>alert('Anda sudah berjaya kemaskini rekod item!');
          window.location.href = '../viewRekodItem.php?kemaskiniItem=berjaya';
          </script>";
        return;
    } else {
        echo "<script>alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
              window.location.href = '../viewRekodItem.php?kemaskiniItem=gagal';
              </script>";
        die(mysqli_error($conn));
    }
}*/

include 'dbh.inc.php';

$oldKodItem = $_GET['kodItem'];

$kodItem = $_POST['kodItem'];
$namaItem = $_POST['namaItem'];
$hargaPerItem = $_POST['hargaPerItem'];
$kodPembekal = $_POST['namaPembekal'];

$sql = "UPDATE item SET KodItem = '$kodItem', NamaItem = '$namaItem', KodPembekal = '$kodPembekal' WHERE KodItem ='$oldKodItem'";
$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

if ($result)
{
    echo "<script>alert('Anda sudah berjaya kemaskini data!');window.location.replace('../viewRekodItem.php?berjaya');</script>";
}else{
    echo "<script>alert('Harap maaf! Sila kemaskini lagi.');window.location.replace('../kemaskiniRekodItem.php?failed');</script>";
}
$conn->close();

?>