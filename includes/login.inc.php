<?php

if (isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
    $pwd = mysqli_real_escape_string($conn, $_POST['kata_laluan']);

    # Error handlers
    // Check if the user exists in the database
    $sql = "SELECT * FROM pengguna WHERE NamaPengguna = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
        header("Location: ../index.php?login=error");
        exit();
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            // De-hashing th password
            $hashedPwdCheck = password_verify($pwd, $row['KataLaluan']);
            if ($hashedPwdCheck == false) {
                header("Location: ../index.php?login=error");
                exit();
            } elseif ($hashedPwdCheck == true) {
                // Log in the user here
                header("Location: ../menu.php");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php?login=error");
    exit();
}