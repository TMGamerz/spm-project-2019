<?php
require_once 'dbh.inc.php';
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

/*echo "<script>confirm('Hendak log keluar?')</script>";

if ($_POST['confirm'] == true) {
    echo "<script>window.location.href = '../index.php';</script>";
    session_destroy();
    session_unset();
    exit();
} else {
    echo "<script>window.location.href = '../menu.php';</script>";
    exit();
}*/
?>