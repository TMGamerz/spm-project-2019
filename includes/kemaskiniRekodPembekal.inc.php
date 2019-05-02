<!-- Proses untuk mengemaskini rekod jualan -->
<?php
    include 'dbh.inc.php';
    if (isset($_POST['kemaskini'])) {
        $sql1 = "SELECT * from `pembekal`";
        $hasil1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($hasil1);

        $oldKodPembekal = $row1['KodPembekal'];
        $kodPembekal = mysqli_real_escape_string($conn, $_POST['kodPembekal']);
        $namaPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
        $telefonPembekal = mysqli_real_escape_string($conn, $_POST['telefonPembekal']);

        $sql2 = "UPDATE `pembekal` SET `KodPembekal` = '$kodPembekal', `NamaPembekal` = '$namaPembekal', `TelefonPembekal` = '$telefonPembekal' WHERE `KodPembekal` = '$oldKodPembekal'";
        $hasil2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if ($hasil2) {
            // Mesej yang akan dipapar jika berjaya dikemaskinikan
            echo "<script>
                    alert('Anda sudah berjaya kemaskini rekod pembekal!');
                    window.location.href = '../viewRekodPembekal.php?kemaskiniPembekal=berjaya';
              </script>";
            return;
        } else {
            // Mesej yang akan dipapar jika tidak berjaya dikemaskinikan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                    window.location.href = '../viewRekodPembekal.php?kemaskiniPembekal=gagal';
                  </script>";
            die(mysqli_error($conn));
        }
    }
?>
