<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Daftar Pengguna</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/signup-style.css">
</head>
<body>
    <div class = "box">
        <h1>SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</h1>

        <h2>Pendaftaran Pengguna</h2>

        <form action = "includes/signup.inc.php" method = "POST">
            <div class = "inputBox">
                <input type = "text" name = "nama_pengguna" required>
                <label>Nama Pengguna</label>
            </div>

            <div class = "inputBox">
                <input type = "password" name = "kata_laluan" required>
                <label>Kata Laluan</label>
            </div>

            <div class = "inputBox">
                <input type = "password" name = "kata_laluan_semula" required>
                <label>Masukkan Kata Laluan Semula</label>
            </div>

            <input type = "submit" name = "submit" value = "Daftar">
        </form>

        <p>Sudah daftar?<a href="index.php"><b> Klik sini</b></a></p>
    </div>

    <div class = "footer">
        <div id = "zoomingButton">
            <button onclick="resizeText(-1)">Smaller</button>
            <button onclick="resizeText(1)">Bigger</button>
        </div>
    </div>

    <script type="text/javascript">
        function resizeText(multiplier){
            if(document.body.style.fontSize === ""){
                document.body.style.fontSize = "1.0em";
            }
            document.body.style.fontSize = parseFloat
            (document.body.style.fontSize) + (multiplier * 0.2) + "em";
        }
    </script>
</body>
</html>