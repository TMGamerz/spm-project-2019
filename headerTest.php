<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel = "stylesheet" href="libraries/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header-styleTest.css">
    <title>Menu</title>

</head>

<body>
    <header>
        <div class = "logo">SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</div>

        <nav>
            <ul>
                <li class = "sub-menu">
                    <a href = "#">
                        <div class = "icon">
                            <img style = "width: 50px; height : 50px;" src="icons/tambahRekod.png" alt ="Tambah Rekod"/>
                        </div>
                        <div class = "name" data-text = "tambahRekod"><b>Tambah Rekod</b></div>
                    </a>
                    <ul>
                        <li><a href = "#">Jualan</a></li>
                        <li><a href = "#">Pembekal</a></li>
                        <li><a href = "#">Item</a></li>
                    </ul>
                </li>

                <li class = "sub-menu">
                    <a href = "#">
                        <div class = "icon">
                            <img style = "width: 50px; height: 50px;" src="icons/kemaskiniRekod.png" alt = "Kemaskini Rekod"/>
                        </div>
                        <div class = "name" data-text = "kemaskiniRekod"><b>Kemaskini Rekod</b></div>
                    </a>
                    <ul>
                        <li><a href = "#">Jualan</a></li>
                        <li><a href = "#">Pembekal</a></li>
                        <li><a href = "#">Item</a></li>
                    </ul>
                </li>

                <li class = "sub-menu">
                    <a href = "#">
                        <div class = "icon">
                            <img style = "width: 50px; height: 50px;" src="icons/paparLaporan.png" alt = "Papar Laporan"/>
                        </div>
                        <div class = "name" data-text = "paparLaporan"><b>Papar Laporan</b></div>
                    </a>
                    <ul>
                        <li><a href = "#">Ikut tarikh jualan</a></li>
                        <li><a href = "#">Ikut nama item</a></li>
                    </ul>
                </li>

                <li>
                    <a href = "#">
                        <div class = "icon">
                            <img style = "width: 50px; height: 50px;" src="icons/import.png" alt ="Import"/>
                        </div>
                        <div class = "name" data-text = "import"><b>Import</b></div>
                    </a>

                </li>

                <li>
                    <a href = "#">
                        <div class = "icon">
                            <img style = "width: 50px; height: 50px;" src="icons/logKeluar.png" alt ="Log Keluar"/>
                        </div>
                        <div class = "name" data-text = "logKeluar"><b>Log Keluar</b></div>
                    </a>

                </li>

            </ul>

        </nav>

        <div class = "menu-toggle">
            <i class = "fa fa-bars" aria-hidden = "true"></i>
        </div>

    </header>

    <script src = "libraries/jquery-3.3.1.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('nav').toggleClass('active')
            });
            $('ul li').click(function() {
                $(this).siblings().removeClass('active');
                $(this).toggleClass('active');
            })
        })
    </script>

</body>
