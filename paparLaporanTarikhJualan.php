<!-- Halaman untuk memilih tarikh jualan bagi memaparkan laporan -->
<?php
    require 'header.php';
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
    <title>Papar Laporan Ikut Tarikh Jualan</title>
</head>

<body>
<div class = "container">  
    <h1>Papar Laporan Ikut Tarikh Jualan</h1>
    <!-- Form untuk memilih tarikh jualan bagi memaparkan laporan-->
    <form action = "viewLaporanIkutTarikh.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-40">
                    <input type = "date" id = "tarikh_jualan1" name = "tarikhJualanMula" required>
                </td>

                <td class = "col-20">
                    <p>hingga</p>
                </td>

                <td class = "col-40">
                    <input type = "date" id = "tarikh_jualan1" name = "tarikhJualanAkhir" required>
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "3" class = "col-submit">
                    <input type = "submit" value = "Papar">
                </td>
            </tr>
        </table>
    </form>
</div> 

<?php
    require 'footer.php';
?>