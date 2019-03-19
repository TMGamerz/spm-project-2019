<?php
require "header.php";
require_once 'includes/dbh.inc.php';
session_start();
if (!isset($_SESSION['IDPengguna'])) {
    echo "<script>window.location='error.php';</script>";
}
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/menu-style.css">
    <title>Menu Utama</title>
</head>

<h1><b>Menu Utama</b></h1>
<br>
<p><b>SELAMAT DATANG KE<br>SISTEM PENGURUSAN JUALAN <br> KOPERASI SEKOLAH</b></p>

<?php
    require 'footer.php';
?>