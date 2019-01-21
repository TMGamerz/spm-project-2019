<?php
    require "header.php";
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
    <title>Papar Laporan</title>
</head>

<body>
<div class = "container">  
    <h1>Papar Laporan Ikut Tarikh Jualan</h1>

    <form action = "includes/import.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-35">
                    <input type = "date" id = "tarikh_jualan1" name = "tarikhjualan1" required>
                </td>

                <td class = "col-15">
                    <p>hingga</p>
                </td>

                <td class = "col-35">
                    <input type = "date" id = "tarikh_jualan1" name = "tarikhjualan1" required>
                </td>

                <td></td>
            </tr>

            <tr class = "row">
                <td></td>
                <td></td>
                <td></td>
                <td class = "col-submit">
                    <input type = "submit" value = "Papar">
                </td>
            </tr>
        </table>
    </form>
</div> 

<?php
    require 'footer.php';
?>