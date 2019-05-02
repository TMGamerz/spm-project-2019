<!-- Proses untuk mengemaskini rekod item -->
<?php
    include 'dbh.inc.php';
    if (isset($_POST['kemaskini'])) {
        $sql1 = "SELECT * from `item`";
        $hasil1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($hasil1);

        $oldKodItem = $row1['KodItem'];
        $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
        $namaItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
        $kodPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);
        $hargaPerItem = mysqli_real_escape_string($conn, $_POST['hargaPerItem']);

        $sql2 = "UPDATE `item` SET `KodItem` = '$kodItem', `NamaItem` = '$namaItem', `KodPembekal` = '$kodPembekal', `HargaPerItem` = '$hargaPerItem' WHERE `KodItem` = '$oldKodItem'";
        $hasil2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if ($hasil2) {
            // Mesej yang akan dipapar jika berjaya dikemaskinikan
            echo "<script>
                    alert('Anda sudah berjaya kemaskini rekod item!');
                    window.location.href = '../viewRekodItem.php?kemaskiniItem=berjaya';
              </script>";
            return;
        } else {
            // Mesej yang akan dipapar jika tidak berjaya dikemaskinikan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                    window.location.href = '../viewRekodItem.php?kemaskiniItem=gagal';
                  </script>";
            die(mysqli_error($conn));
        }
    }
?>