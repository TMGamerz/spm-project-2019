<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
    /*if(isset($_GET['token'])){
        if($_GET['token'] == $_SESSION['token']){
            $_SESSION['select'] = 1;
            require 'header.php';
        }else{
            header('location:error.php');
        }
    }else{
        header('location:error.php');
    }*/

?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/menu-style.css">
    <title>Menu Utama</title>
</head>

<h1><b>Menu Utama</b></h1>
<br>
<div class = "container">
    <p><b>SELAMAT DATANG KE<br>SISTEM PENGURUSAN JUALAN <br> KOPERASI SEKOLAH</b></p>
</div>

<?php
    require 'footer.php';
?>