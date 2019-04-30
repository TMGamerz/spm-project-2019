<!-- Proses untuk menambah rekod item -->
<?php
    include 'dbh.inc.php';

    if (isset($_POST['tambah'])) {
        $kodItem = mysqli_real_escape_string($conn, $_POST['kodItem']);
        $namaItem = mysqli_real_escape_string($conn, $_POST['namaItem']);
        $hargaPerItem = mysqli_real_escape_string($conn, $_POST['hargaPerItem']);
        $kodPembekal = mysqli_real_escape_string($conn, $_POST['namaPembekal']);

        if (empty($kodItem) || empty($namaItem) || empty($hargaPerItem) || empty($kodPembekal)) {
            // Mesej yang akan dipapar jika tidak berjaya ditambahkan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                    window.location = '../tambahRekodItem.php?input=empty';
                  </script>";
            exit();
        } else {
            $sql1 = "SELECT `KodItem` FROM `item` WHERE `KodItem` = '$kodItem'";
            $hasil1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($hasil1) > 0) {
                // Mesej yang akan dipapar jika tidak berjaya ditambahkan
                echo "<script>
                        alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                        window.location = '../tambahRekodItem.php?data=exists';
                      </script>";
                exit();
            } else {
                $sql2 = "INSERT INTO `item`(`KodItem`, `NamaItem`, `HargaPerItem`, `KodPembekal`) VALUES('$kodItem', '$namaItem', '$hargaPerItem', '$kodPembekal')";
                $hasil2 = mysqli_query($conn, $sql2);

                if ($hasil2) {
                    // Mesej yang akan dipapar jika berjaya ditambahkan
                    echo "<script>
                            alert('Anda sudah berjaya menambah rekod item!');
                            window.location.href = '../tambahRekodItem.php?tambahItem=berjaya';
                          </script>";
                    return;
                } else {
                    die(mysqli_error($conn));
                }
            }
        }
    } else {
        // Mesej yang akan dipapar jika tidak berjaya ditambahkan
        echo "<script>
                alert('Maklumat yang anda masuk tidak sah! Sila masuk semula.');
                window.location = '../tambahRekodItem.php?tambah=error';
              </script>";
        exit();
    }
?>