<!-- Proses untuk mengimport data -->
<?php
    require 'dbh.inc.php';

    if (isset($_POST['import'])) {
        $FileName = $_FILES["importFile"]["tmp_name"];
        $NoFile = $_FILES["importFile"]["size"];

        if ($NoFile < 0) {
            echo "<script>
                      alert('Format fail tidak sah.\\nSila pilihkan fail yang betul.');
                      window.location.href='../import.php';
                  </script>";
        } else {
            $run = fopen($FileName, "r");
            while (($data = fgetcsv($run, 1000, ",")) == TRUE) {
                $KodPembekal = mysqli_real_escape_string($conn,$data[0]);
                $NamaPembekal = mysqli_real_escape_string($conn,$data[1]);
                $TelefonPembekal = mysqli_real_escape_string($conn,$data[2]);

                $sql = "INSERT INTO `pembekal`(`KodPembekal`, `NamaPembekal`, `TelefonPembekal`) VALUES('$KodPembekal', '$NamaPembekal', '$TelefonPembekal')";
                $hasil = mysqli_query($conn, $sql);

                if ($hasil == 0) {
                    // Mesej yang akan dipapar jika tidak berjaya diimport
                    echo "<script>
                            alert('Format fail tidak sah.\\nSila pilihkan fail yang betul.');
                            window.location.href='../import.php';
                          </script>";
                } else {
                    // Mesej yang akan dipapar jika berjaya diimport
                    echo "<script>
                            alert('Fail berjaya diimport.');
                            window.location.href='../viewRekodPembekal.php';
                          </script>";
                }
            }
            fclose($run);
            mysqli_close($conn);
        }
    }
?>