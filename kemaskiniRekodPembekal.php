<?php
    require "header.php";
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/kemaskiniRekod-style.css">
    <title>Kemaskini Rekod</title>
</head>

<body>
<div class = "container">  
    <h1>Kemaskini Rekod Pembekal</h1>

    <form action = "includes/kemaskiniRekod.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_pembekal">Kod Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_pembekal" name = "kodpembekal" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_pembekal">Nama Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "nama_pembekal" name = "namapembekal" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "telefon_pembekal">Telefon Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "telefon_pembekal" name = "telefonpembekal" required>
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "2">
                    <input type="submit" value = "Kemaskini">
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
    require 'footer.php';
?>