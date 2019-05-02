<!-- Halaman untuk mendaftar pengguna-->
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
        <link rel = "icon" href = "icons/pt.png">
    </head>
    <body>
        <div class = "box">
            <h1>SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</h1>

            <h2>Pendaftaran Pengguna</h2>
            <!-- Form untuk mendaftar pengguna baru-->
            <form action = "includes/signup.inc.php" method = "POST">
                <!-- Input nama pengguna-->
                <div class = "inputBox">
                    <input type = "text" name = "nama_pengguna" maxlength = "20" required>
                    <label>Nama Pengguna</label>
                </div>
                <!-- Input kata laluan-->
                <div class = "inputBox">
                    <input type = "password" name = "kata_laluan" maxlength = "30" required>
                    <label>Kata Laluan</label>
                </div>
                <!-- Input kata laluan semula-->
                <div class = "inputBox">
                    <input type = "password" name = "kata_laluan_semula" maxlength = "30" required>
                    <label>Masukkan Kata Laluan Semula</label>
                </div>

                <input type = "submit" name = "submit" value = "Daftar">
            </form>
            
            <!-- Sambungan ke halaman log masuk-->
            <p>Sudah daftar?<a href="index.php"><b> Klik sini</b></a></p>
        </div>

        <div class = "footer">
            <!-- Button untuk membesarkan atau mengecilkan text -->
            <div id = "zoomingButton">
                <button class = "btn1" onclick="resizeText(-1)">Smaller</button>
                <button class = "btn2" onclick="resizeText(1)">Bigger</button>
            </div>
        </div>

        <script type="text/javascript">
            // Function untuk membesarkan atau mengecilkan text
            function resizeText(multiplier) {
                if (document.body.style.fontSize === "") {
                    document.body.style.fontSize = "1.0em";
                }
                document.body.style.fontSize = parseFloat
                (document.body.style.fontSize) + (multiplier * 0.2) + "em";
            }
        </script>
    </body>
</html>
