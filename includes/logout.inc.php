<?php
    require_once 'dbh.inc.php';
    // Mesej mengesah yang akan dipapar sebelum log keluar
    echo "<script>
          if (confirm('Hendak log keluar?')) {
            window.location.href = '../index.php';
          } else {
            window.location.href = '../menu.php';
          }
          </script>";
    exit();
?>