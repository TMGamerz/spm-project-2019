<!-- Proses untuk mendaftar pengguna baru -->
<?php
    session_start();
    require_once 'dbh.inc.php';

    if (isset($_POST['submit'])) {
        $NamaPengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
        $KataLaluan = mysqli_real_escape_string($conn, $_POST['kata_laluan']);
        $KataLaluanSemula = mysqli_real_escape_string($conn, $_POST['kata_laluan_semula']);

        if (empty($NamaPengguna) || empty($KataLaluan)) {
            // Mesej yang akan dipapar jika tidak berjaya didaftarkan
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                    window.location.href = '../signup.php';
                  </script>";
            exit();
        } else {
            // Semak kata laluan
            if($KataLaluan != $KataLaluanSemula){
                // Mesej yang akan dipapar jika tidak berjaya didaftarkan
                echo "<script>
                        alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                        window.location.href = '../signup.php';
                      </script>";
                exit();
            } else {
                $sql = "SELECT * FROM `pengguna` WHERE `NamaPengguna` = '$NamaPengguna';";
                $hasil = mysqli_query($conn, $sql);
                $semakHasil = mysqli_num_rows($hasil);

                if ($semakHasil > 0) {
                    // Mesej yang akan dipapar jika tidak berjaya didaftarkan
                    echo "<script>
                            alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi.');
                            window.location.href = '../signup.php';
                          </script>";
                    exit();
                } else {
                    $sql = "INSERT INTO `pengguna` (`NamaPengguna`, `KataLaluan`) VALUES ('$NamaPengguna', '$KataLaluan');";
                    mysqli_query($conn, $sql);
                    // Mesej yang akan dipapar jika berjaya didaftarkan dan balik ke halaman log masuk
                    echo "<script>
                            alert('Anda sudah berjaya mendaftar!\\nSila log masuk.');
                            window.location.href = '../index.php';
                          </script>";
                    exit();
                }
            }
        }
    } else {
        header("Location: ../signup.php");
        exit();
    }
?>