<?php
    /*session_start();
    session_unset();
    session_destroy();*/
    echo "<script>
            if (confirm('Hendak log keluar?')) {
                window.location.href = '../index.php';
            } else {
                window.location.href = '../menu.php';
            }
          </script>";
    exit();
?>