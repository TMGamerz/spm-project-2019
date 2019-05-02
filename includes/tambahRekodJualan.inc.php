<!-- Proses untuk menambah rekod jualan -->
<?php
    session_start();
    include 'dbh.inc.php';

    if (isset($_POST['tambah'])) {
        $tarikhJualan = mysqli_real_escape_string($conn, $_POST['tarikhJualan']);
        // Jika input tarikh jualan kosong, sistem akan automatik inout tarikh hari ini
        if (empty($tarikhJualan)) {
            $tarikhJualan = date("Y-m-d");
        }
        $kodItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
        $kuantitiItemDijual = mysqli_real_escape_string($conn, $_POST['kuantiti']);
        $hargaJualan = mysqli_real_escape_string($conn, $_POST['hargaJualan']);
        $IDPengguna = $_SESSION['IDPengguna'];

        if (empty($kodItem) || empty($kuantitiItemDijual) || empty($hargaJualan)) {
            // Mesej yang akan dipapar jika tidak berjaya ditambahkan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                    window.location = '../tambahRekodJualan.php?input=empty';
                  </script>";
            exit();
        } else {
            $sql = "INSERT INTO `jualan`(`TarikhJualan`, `KodItem`, `KuantitiItemDijual`, `HargaJualan`, `IDPengguna`) VALUES('$tarikhJualan', '$kodItem', '$kuantitiItemDijual', '$hargaJualan', '$IDPengguna')";
            $hasil = mysqli_query($conn, $sql);

            if ($hasil) {
                // Mesej yang akan dipapar jika berjaya ditambahkan
                echo "<script>
                        alert('Anda sudah berjaya menambah rekod jualan!');
                        window.location = '../tambahRekodJualan.php?tambahJualan=berjaya';
                      </script>";
                return;
            } else {
                die(mysqli_error($conn));
            }
        }
    } else {
        // Mesej yang akan dipapar jika tidak berjaya ditambahkan
        echo "<script>
                alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                window.location = '../tambahRekodJualan.php?tambah=error';
              </script>";
        exit();
    }
?>