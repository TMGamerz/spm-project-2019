<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/header-style.css">
    <link rel = "stylesheet" href = "../libraries/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class = "navbar">
        <div class = "nav-container">
            <div class = "logo">
                <a href="menu.php"><b>SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</b></a>
            </div>
            <nav>
                <div class = "nav-responsive">
                    <a id = "nav-toggle" href = "#"><span></span></a>
                </div>

                <ul class = "nav-list">
                    <li>
                        <a href = "#tambah">
                            <div class = "icon">
                                <i class = "fa fa-home" aria-hidden = "true"></i>
                                <i class = "fa fa-home" aria-hidden = "true"></i>
                            </div>
                            <div class = "name"><span  data-text = "Tambah Rekod▲">Tambah Rekod▼</span></div>
                        </a>

                        <ul class = "nav-dropdown">
                                <li><a href = "tambahRekodJualan.php">Jualan</a></li>
                                <li><a href = "tambahRekodPembekal.php">Pembekal</a></li>
                                <li><a href = "tambahRekodItem.php">Item</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href = "#kemaskini">
                            <div class = "icon">
                                <i class = "fa fa-file-text-o" aria-hidden = "true"></i>
                                <i class = "fa fa-file-text-o" aria-hidden = "true"></i>
                            </div>
                            <div class = "name"><span  data-text = "Kemaskini Rekod▲">Kemaskini Rekod▼</span></div>
                        </a>

                        <ul class = "nav-dropdown">
                                <li><a href = "kemaskiniRekodJualan.php">Jualan</a></li>
                                <li><a href = "kemaskiniRekodPembekal.php">Pembekal</a></li>
                                <li><a href = "kemaskiniRekodItem.php">Item</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href = "#papar">
                            <div class = "icon">
                                <i class = "fa fa-cogs" aria-hidden = "true"></i>
                                <i class = "fa fa-cogs" aria-hidden = "true"></i>
                            </div>
                            <div class = "name"><span  data-text = "Papar Laporan▲">Papar Laporan▼</span></div>
                        </a>

                        <ul class = "nav-dropdown">
                                <li><a href = "paparLaporanTarikhJualan.php">Ikut Tarikh Jualan</a></li>
                                <li><a href = "paparLaporanNamaItem.php">Ikut Nama Item</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href = "import.php">
                            <div class = "icon">
                                <i class = "fa fa-picture-o" aria-hidden = "true"></i>
                                <i class = "fa fa-picture-o" aria-hidden = "true"></i>
                            </div>
                            <div class = "name"><span  data-text = "Import">Import</span></div>
                        </a>
                    </li>
                    <li>
                        <a href = "logKeluar.php">
                            <div class = "icon">
                                <i class = "fa fa-users" aria-hidden = "true"></i>
                                <i class = "fa fa-users" aria-hidden = "true"></i>
                            </div>
                            <div class = "name"><span  data-text = "Log Keluar">Log Keluar</span></div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <script src = "libraries/jquery-3.3.1.min.js"></script>
        <script type = "text/javascript">
            $(document).ready(function() {
            $('nav .nav-list li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });

            $('html').click(function() {
                $('.nav-dropdown').hide();
            });

            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });

            $('#nav-toggle').click(function() {
                $('nav ul').toggle();
            });
        });
        </script>
</body>
</html>