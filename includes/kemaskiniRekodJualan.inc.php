<!-- Proses untuk mengemaskini rekod jualan -->
<?php
    session_start();
    include 'dbh.inc.php';
    if (isset($_POST['kemaskini'])) {
        $sql1 = "SELECT * from `jualan`";
        $hasil1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($hasil1);

        $oldKodJualan = $_POST['kodJualan'];
        $tarikhJualan = mysqli_real_escape_string($conn, $_POST['tarikhJualan']);
        $kodItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
        $kuantitiItemDijual = mysqli_real_escape_string($conn, $_POST['kuantiti']);
        $hargaJualan = mysqli_real_escape_string($conn, $_POST['hargaJualan']);
        $IDPengguna = $_SESSION['IDPengguna'];

        $sql2 = "UPDATE `jualan` SET `TarikhJualan` = '$tarikhJualan', `KodItem` = '$kodItem', `KuantitiItemDijual` = '$kuantitiItemDijual', `HargaJualan` = '$hargaJualan', `IDPengguna` = '$IDPengguna' WHERE `KodJualan` = '$oldKodJualan'";
        $hasil2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if ($hasil2) {
            // Mesej yang akan dipapar jika berjaya dikemaskinikan
            echo "<script>
                    alert('Anda sudah berjaya kemaskini rekod jualan!');
                    window.location.href = '../viewRekodJualan.php?kemaskiniJualan=berjaya';
              </script>";
            return;
        } else {
            // Mesej yang akan dipapar jika tidak berjaya dikemaskinikan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                    window.location.href = '../viewRekodJualan.php?kemaskiniJualan=gagal';
                  </script>";
            die(mysqli_error($conn));
        }
    }
?>
