<?php
session_start();


?>
<DOCTYPE html>
    <html>
    <head>
        <title>Rent a Car</title>
        <link rel="stylesheet" type="text/css" href="views/css/header.scss">
        <link rel="stylesheet" type="text/css" href="views/css/slider.scss">
        <link rel="stylesheet" type="text/css" href="views/css/home.scss">
        <link rel="stylesheet" type="text/css" href="views/css/footer.scss">
        <link rel="stylesheet" type="text/css" href="views/css/bootstrap/bootstrap.min.css">


    </head>
    <body>
    <div class="wrapper">
        <div class="header">
            <?php require_once('views/pages/header.php'); ?>
        </div>
        <div class="main-wrapper">
            <div class="main">
                <div class="sliders">
                    <div class="image">
                        <img src="views/images/banner.jpg">
                    </div>
                    <div class="slogan">
                        <h3>In onze auto's rijdt u als een prins!</h3>
                    </div>
                </div>
                <div class="container">
                    <?php require_once('routes.php'); ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <br/>
            <?php require_once('views/pages/footer.php'); ?>
        </div>
    </div>
    </body>
    </html>

