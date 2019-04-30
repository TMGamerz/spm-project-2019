<!-- Halaman untuk menambah rekod pembekal -->
<?php
    require 'header.php';
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/tambahRekod-style.css">
    <title>Tambah Rekod Pembekal</title>
</head>

<body>
<div class = "container">  
    <h1>Tambah Rekod Pembekal</h1>
    <!-- Form untuk menambah rekod pembekal -->
    <form action = "includes/tambahRekodPembekal.inc.php" method = "POST">
        <table align = "center">
            <!-- Input kod pembekal -->
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_pembekal">Kod Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_pembekal" name = "kodPembekal" maxlength = "5" required>
                </td>
            </tr>
            <!-- Input nama pembekal -->
            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_pembekal">Nama Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "nama_pembekal" name = "namaPembekal" maxlength = "50" required>
                </td>
            </tr>
            <!-- Input telefon pembekal -->
            <tr class = "row">
                <td class = "col-25">
                    <label for = "telefon_pembekal">Telefon Pembekal: </label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "telefon_pembekal" name = "telefonPembekal" maxlength = "15" required>
                </td>
            </tr>

            <tr class = "row">
                <td colspan = "2">
                    <input type="submit" value = "Tambah" name = "tambah">
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
    require 'footer.php';
?>