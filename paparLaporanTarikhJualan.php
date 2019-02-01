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

    <form action = "includes/" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-40">
                    <input type = "date" id = "tarikh_jualan1" name = "tarikhjualan1" required>
                </td>

                <td class = "col-20">
                    <p>hingga</p>
                </td>

                <td class = "col-40">
                    <input type = "date" id = "tarikh_jualan1" name = "tarikhjualan1" required>
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