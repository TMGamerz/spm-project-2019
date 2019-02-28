<?php
// Tips: If the whole php file is a pure php file, we no need put the php closing tag

session_start();

/* So that people cant access this page by insert the address (for more secure), Want to check if the user have click
the submit button, then going to run the script */
if (isset($_POST['submit'])) { //

    // No need write includes folder, because current file already in the includes folder
    require_once 'dbh.inc.php';

    // Get the data from the form
    // First is the name of the first input in the signup form
    // The function is to convert the input which is code to the text
    $NamaPengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
    $KataLaluan = mysqli_real_escape_string($conn, $_POST['kata_laluan']);
    $KataLaluanSemula = mysqli_real_escape_string($conn, $_POST['kata_laluan_semula']);

    // Create error handlers
    /* Check if the user left anything empty inside the form, we wont let the user sign up if user doesn't fill up all
    the field */
    //Check for empty fields
    // Tips: Always check for error first before check for success
    if (empty($NamaPengguna) || empty($KataLaluan)) {
        // We add signup=empty at the end of the address, that shows the error message
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
                // Hashing the password for secure so that nobody can see the actual password
                // First parameter is the variable that you want to hash which is the password
                // Second parameter is the method
                $hashedKataLaluan = password_hash($KataLaluan, PASSWORD_DEFAULT);
                // Insert the user into the database
                /* So we need to insert which column that you want to insert the data into the first (), user_id no
                need to include in there because we set it to auto increment */
                /* For the second (), we need to insert the actual values that we want to insert inside these column
                which is all the input */
                $sql = "INSERT INTO `pengguna` (`NamaPengguna`, `KataLaluan`) VALUES ('$NamaPengguna', '$hashedKataLaluan');";
                /* We need to write a result is equal to our mysqli_query which will take these data to insert into
                the database */
                /* We can use the same variable names which are $sql because we no need use the code above after we
                went to the checkup there, so we can rename it with the same variables there and won't affect the code above there */
                // We just want to run the function so no need to declare it to $result
                mysqli_query($conn, $sql);
                // Back to the login page once done signed up
                echo "<script>
                        alert('Anda sudah berjaya mendaftar!');
                          window.location.href = '../login.php';
                      </script>";
                exit();
            }
        }
    }
} else {
    // Location, L must capital letter, no spaces between location and ":"
    // This header() will take us back to the page that we mention
    header("Location: ../signup.php");
    // This exit() can stop the script from running the rest of the code down there
    exit();
}
