<?php
    require "header.php";
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/tambahRekod-style.css">
    <title>Tambah Rekod</title>
</head>

<body>
<div class = "container">  
    <h1>Tambah Rekod Jualan</h1>

    <form action = "includes/tambahRekodJualan.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_jualan">Kod Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_jualan" name = "kodJualan" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "tarikh_jualan">Tarikh Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "date" id = "tarikh_jualan" name = "tarikhJualan" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_item">Nama Item: </label>
                </td>

                <td class = "col-75">
                    <select id = "nama_item" name = "namaItem" required>
                        <option disabled hidden selected></option>
                        <option value="Item 1">Item 1</option>
                        <option value="Item 2">Item 2</option>
                        <option value="Item 3">Item 3</option>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "kuantiti_item_dijual">Kuantiti Item Dijual: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "kuantiti_item_dijual" name = "kuantiti" value = "1" min = "1" required>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_jualan">Harga Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_jualan" name = "hargaJualan" min="0.00" step="0.01" value = "0.00" required>
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "2">
                    <input type="submit" value = "Tambah">
                </td>
            </tr>
        </table>
    </form>
</div> 

<?php
    require "footer.php";
?>