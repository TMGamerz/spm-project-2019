<?php
require 'dbh.inc.php';
if(isset($_POST["submit"])){

    $filename=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0)
    {
        $handle = fopen($_FILES['file']['tmp_name'], "r");
        while (($data =fgetcsv($handle, 1000, ",")) !== FALSE) {
            $item1 = mysqli_real_escape_string($conn,$data[0]);
            $item2 = mysqli_real_escape_string($conn,$data[1]);
            $item3 = mysqli_real_escape_string($conn,$data[2]);
            $sql = "INSERT INTO pembekal(KodPembekal, NamaPembekal, TelefonPembekal) VALUES('$item1', '$item2', '$item3')";
            $hasil = mysqli_query($conn, $sql);

            if ($hasil)
            {
                echo "<script>
                  alert('Fail berjaya diimport.');
                  window.location.href='../viewRekodPembekal.php';
                  </script>";
            }
            else
            {
                echo "<script>
                  alert('Format fail tidak sah.\\nSila pilihkan fail yang betul.');
                  window.location.href='../import.php';
                  </script>";
            }
        }
        mysqli_close($conn);
    }
}
?>