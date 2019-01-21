<?php
    require "header.php";
?>
<head>
    <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
    <title>Papar Laporan</title>
</head>

<body>
<div class = "container">  
    <h1>Papar Laporan Ikut Nama Item</h1>

    <form action = "includes/import.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-70">
                    <select name="select-item" id="select-item" required>
                        <option disabled hidden selected>Pilih item</option>
                        <option value="Item 1">Item 1</option>
                        <option value="Item 2">Item 2</option>
                        <option value="Item 3">Item 3</option>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td></td>
                <td></td>

                <td class = "col-submit">
                    <input type="submit" value = "Papar">
                </td>
            </tr>
        </table>
    </form>
</div> 

<?php
    require 'footer.php';
?>