<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Error</title>
        <link rel="stylesheet" type = "text/css" href="css/error.css">
    </head>

    <?php
        session_start();
        session_destroy();
    ?>
    <body>
        <div id="box">
            <div id="word">
                <h3>404 Page not found !</h3>
                <br>
                Error occur, please try again
                <br>
                It may be occur because :
                <b>
                    <ul>
                        <li>Unstable internet connection</li>
                        <li>Link doest not exists</li>
                    </ul>
                </b>
            </div>

            <button id="btn" onclick="window.location.href='index.php'">Menu Utama</button>
            <button id="btn" onclick="window.location.href='login.php'">Log Masuk</button>
            <button id="btn" onclick="window.location.href='signup.php'">Daftar</button>
        </div>
    </body>
</html>