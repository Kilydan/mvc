<?php
session_start();
?>
<DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/footer.scss">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/home.scss">

    </head>
    <body>
        <div class="header">
            <?php require_once('views/pages/header.php'); ?>
        </div>
        <div class="main">
            <?php require_once('routes.php'); ?>



        </div>
        <div class="footer">
            <br />
            <?php require_once('views/pages/footer.php'); ?>
        </div>
    </body>
</html>

