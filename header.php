<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header-style.css">
    <title>Menu</title>

</head>

<body>
    <header>
        <div class = "logo">SISTEM PENGURUSAN JUALAN KOPERASI SEKOLAH</div>

        <nav>
            <ul>
                <li class = "sub-menu"><a href = "#">Tambah Rekod</a>
                    <ul>
                        <li><a href = "#">Jualan</a></li>
                        <li><a href = "#">Pembekal</a></li>
                        <li><a href = "#">Item</a></li>
                    </ul>
                </li>

                <li class = "sub-menu"><a href = "#">Kemaskini Rekod</a>
                    <ul>
                        <li><a href = "#">Jualan</a></li>
                        <li><a href = "#">Pembekal</a></li>
                        <li><a href = "#">Item</a></li>
                    </ul>
                </li>

                <li class = "sub-menu"><a href = "#">Papar Laporan</a>
                    <ul>
                        <li><a href = "#">Ikut tarikh jualan</a></li>
                        <li><a href = "#">Ikut nama item</a></li>
                    </ul>

                </li>

                <li><a href = "#">Import</a></li>

                <li><a href = "#">Log Keluar</a></li>

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
