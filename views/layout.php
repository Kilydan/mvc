
<DOCTYPE html>
    <html>
    <head>
        <title>Rent a Car</title>
        <link rel="stylesheet" type="text/css" href="views/css/header.css">
        <link rel="stylesheet" type="text/css" href="views/css/slider.css">
        <link rel="stylesheet" type="text/css" href="views/css/home.css">
        <link rel="stylesheet" type="text/css" href="views/css/footer.css">
        <link rel="stylesheet" type="text/css" href="views/css/bootstrap/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body>
    <?php
    session_start();

    ?>
<!--    <div class="wrapper">-->
        <div class="mini-header col-md-12">
            <?php require_once('views/pages/miniheader.php'); ?>
        </div>
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
<!--    </div>-->
    </body>
    </html>

