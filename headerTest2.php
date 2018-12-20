<!DOCTYPE html>
<html>
<head>
    <meta nama = "viewport" content = "width-device-width, initial-scale=1.0">
    <title>Navbar Test</title>
    <link rel = "stylesheet" type = "text/css" href = "css/header-styleTest2.css">
    <link rel = "stylesheet" href = "libraries/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class = "menuToggle">Menu</div>
    <ul>
        <li>
            <a href = "#">
                <div class = "icon">
                    <i class = "fa fa-home" aria-hidden = "true"></i>
                    <i class = "fa fa-home" aria-hidden = "true"></i>
                </div>
                <div class = "name"><span  data-text = "Home">Home</span></div>
            </a>
        </li>
        <li>
            <a href = "#">
                <div class = "icon">
                    <i class = "fa fa-file-text-o" aria-hidden = "true"></i>
                    <i class = "fa fa-file-text-o" aria-hidden = "true"></i>
                </div>
                <div class = "name"><span  data-text = "About">About</span></div>
            </a>
        </li>
        <li>
            <a href = "#">
                <div class = "icon">
                    <i class = "fa fa-cogs" aria-hidden = "true"></i>
                    <i class = "fa fa-cogs" aria-hidden = "true"></i>
                </div>
                <div class = "name"><span  data-text = "Services">Services</span></div>
            </a>
        </li>
        <li>
            <a href = "#">
                <div class = "icon">
                    <i class = "fa fa-picture-o" aria-hidden = "true"></i>
                    <i class = "fa fa-picture-o" aria-hidden = "true"></i>
                </div>
                <div class = "name"><span  data-text = "Portfolio">Portfolio</span></div>
            </a>
        </li>
        <li>
            <a href = "#">
                <div class = "icon">
                    <i class = "fa fa-users" aria-hidden = "true"></i>
                    <i class = "fa fa-users" aria-hidden = "true"></i>
                </div>
                <div class = "name"><span  data-text = "Team">Team</span></div>
            </a>
        </li>
        <li>
            <a href = "#">
                <div class = "icon">
                    <i class = "fa fa-envelope" aria-hidden = "true"></i>
                    <i class = "fa fa-envelope" aria-hidden = "true"></i>
                </div>
                <div class = "name"><span data-text = "Contact">Contact</span></div>
            </a>
        </li>
    </ul>

    <script src = "libraries/jquery-3.3.1.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function () {
            $('.menuToggle').click(function() {
                $('ul').toggleClass('active')
            })
        })
    </script>
</body>
</html>