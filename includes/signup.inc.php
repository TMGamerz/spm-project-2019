<?php
session_start();

if (isset($_POST['submit'])) {
    require_once 'dbh.inc.php';

    // Get the data from the form
    $NamaPengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
    $KataLaluan = mysqli_real_escape_string($conn, $_POST['kata_laluan']);
    $KataLaluanSemula = mysqli_real_escape_string($conn, $_POST['kata_laluan_semula']);

    //Check for empty fields
    if (empty($NamaPengguna) || empty($KataLaluan)) {
        echo "<script>
                alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                window.location.href = '../signup.php';
              </script>";
        exit();
    } else {
        // Comfirm Password
        if($KataLaluan != $KataLaluanSemula){
            echo "<script>
                    alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                    window.location.href = '../signup.php';
                  </script>";
            exit();
        } else {
            /* Connect to the database to check whether the username that typed in had already been taken by other
            user in the database */
            $sql = "SELECT * FROM `pengguna` WHERE `NamaPengguna` = '$NamaPengguna';";
            // Return the result
            // First parameter is the connection to the database, second is the variables of our code
            $hasil = mysqli_query($conn, $sql);
            // Check if we have any kind of result
            $semakHasil = mysqli_num_rows($hasil);

            if ($semakHasil > 0) {
                echo "<script>
                        alert('Maklumat yang anda masuk tidak sah!\\nSila cuba sekali lagi');
                        window.location.href = '../signup.php';
                      </script>";
                exit();
            } else {
                // Insert the user into the database
                $sql = "INSERT INTO `pengguna` (`NamaPengguna`, `KataLaluan`) VALUES ('$NamaPengguna', '$KataLaluan');";
                // mysqli_query takes these data to insert into the database
                mysqli_query($conn, $sql);
                // Back to the login page once done signed up
                echo "<script>
                        alert('Anda sudah berjaya mendaftar!');
                        window.location.href = '../index.php';
                      </script>";
                exit();
            }
        }
    }
} else {
    // header() will take us back to the page that we mention
    header("Location: ../signup.php");
    // exit() can stop the script from running the rest of the code down there
    exit();
}
