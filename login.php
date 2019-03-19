<?php
session_start();
?>
<html>
<head>
    <meta charset = "utf-8">
    <title>Selamat datang!</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/login-style.css">
</head>

<body>

<div class = "box">
    <h1>SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</h1>

    <h2>Log Masuk</h2>

    <form action = "includes/login.inc.php" method = "POST">
        <div class = "inputBox">
            <input type="text" name="nama_pengguna" required>
            <label>Nama Pengguna</label>
        </div>

        <div class = "inputBox">
            <input type="password" name="kata_laluan" required>
            <label>Kata Laluan</label>
        </div>

        <input type="submit" name = "submit" value="Log Masuk">
    </form>

    <p>Belum daftar?<a href="signup.php"><b> Klik sini</b></a></p>
</div>

</body>
</html>