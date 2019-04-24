<?php
require_once 'dbh.inc.php';

echo "<script>
      if (confirm('Hendak log keluar?')) {
        window.location.href = '../index.php';
      } else {
        window.location.href = '../menu.php';
      }
      </script>";
exit();
?>