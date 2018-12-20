<?php

// Menghubungkan laman web dengan ip "localhost" atau "127.0.0.1"
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
// Menghubungkan laman web dengan pangkalan data
$dbName = "spm";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) OR
die('Tidak dapat menyambung ke pelayan pangkalan data' .mysqli_connect_error());
// laman web dimatikan jika berlakunya masalah