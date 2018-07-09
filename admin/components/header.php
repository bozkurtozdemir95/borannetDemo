<?php

session_start();

if($_SESSION['u_id'] == null){
 header("Location: login.php");
}
    
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <script src="script/jquery.js"></script>
        <script src="script/bootstrap.min.js"></script>
        <script src="script/script.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
            crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>BORANNET ADMİN PANEL</title>
    </head>

    <body class="menu-open">
        <div class="view">
            <div class="overlay"></div>
            <div class="nav-slide side-menu">
                <div class="user-info">
                    <div class="user-img">
                        <img src="img/user.jpg" alt="user">
                    </div>
                    <div class="user-name">
                        <?php 
                    if(isset($_SESSION['u_id'])){
                        echo $_SESSION['u_id'];
                    } else{
                        echo "Unknown User";
                    }
                        
                    ?>
                    </div>
                </div>
                <ul class="main-menu">
                    <li>
                        <a href="index.php">
                            <i class="fas fa-home"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="tournaments.php">
                            <i class="fas fa-trophy"></i>Turnuvalar
                        </a>
                    </li>
                    <li>
                        <a href="news.php">
                            <i class="far fa-newspaper"></i>Haberler
                        </a>
                    </li>
                    <li>
                        <a href="computer-parts.php">
                            <i class="fas fa-headphones-alt"></i>Pc Parçaları
                        </a>
                    </li>
                    <li>
                        <a href="reservations.php">
                            <i class="far fa-address-card"></i>Rezervasyonlar
                        </a>
                    </li>
                    <li>
                        <a href="album.php">
                            <i class="far fa-images"></i>Albüm
                        </a>
                    </li>
                    <li>
                        <a href="messages.php">
                            <i class="far fa-envelope"></i>Mesajlar
                        </a>
                    </li>
                    <li>
                        <a href="settings.php">
                            <i class="fas fa-sliders-h"></i>Ayarlar
                        </a>
                    </li>
                </ul>
            </div>
            <main class="page">
                <div class="transform-container">
                    <div class="catalog">
                        <div class="panel header">
                            <span class="menu-opener">
                                <i class="fas fa-bars"></i>
                            </span>
                            <div class="logo">
                                <img src="img/logo.png" alt="BORANNET ARENA">
                            </div>
                            <div class="logout">
                                <form action="php/logout.php" method="POST">
                                    <button type="submit" name="submit" class="logout-button">
                                        <i class="fas fa-sign-out-alt"></i>Çıkış Yap</button>
                                </form>
                            </div>
                        </div>