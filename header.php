<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta nama = "viewport" content = "width-device-width, initial-scale=1.0">
    <title>Navbar Test</title>
    <link rel = "stylesheet" type = "text/css" href = "css/header-style.css">
    <link rel = "stylesheet" href = "../libraries/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class = "navbar">
        <div class = "nav-container">
            <div class = "logo">
                <a href="#home"><b>SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</b></a>
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
                                <li><a href = "#tambah-jualan">Jualan</a></li>
                                <li><a href = "#tambah-pembekal">Pembekal</a></li>
                                <li><a href = "#tambah-item">Item</a></li>
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
                                <li><a href = "#kemaskini-jualan">Jualan</a></li>
                                <li><a href = "#kemaskini-pembekal">Pembekal</a></li>
                                <li><a href = "#kemaskini-item">Item</a></li>
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
                                <li><a href = "#papar-tarikh">Ikut Tarikh Jualan</a></li>
                                <li><a href = "#papar-nama">Ikut Nama Item</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href = "#import">
                            <div class = "icon">
                                <i class = "fa fa-picture-o" aria-hidden = "true"></i>
                                <i class = "fa fa-picture-o" aria-hidden = "true"></i>
                            </div>
                            <div class = "name"><span  data-text = "Import">Import</span></div>
                        </a>
                    </li>
                    <li>
                        <a href = "#logkeluar">
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