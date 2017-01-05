<div class="container">
    <div class="logo col-md-2">
        Rent-A-Car
    </div>
    <div class="menu col-md-8">
        <a href="/">Home</a>
        <!--    <a href="?controller=pages&action=login">login</a>-->
        <?php
        if (isset($_SESSION['user_session'])) {
            if ($_SESSION['role'] == 3) {
                ?>
                <a href="?controller=pages&action=admin">Admin</a>
                <?php
            }
        }
        ?>
        <a href="?controller=car&action=index">Showroom</a>
        <a href="?controller=pages&action=voorwaardes">Voorwaardes</a>
        <a href="?controller=pages&action=contact">Contact</a>
        <?php
        if (isset($_SESSION['user_session'])) {
            ?>
            <a href="?controller=pages&action=account">Mijn account</a>
            <a href="?controller=account&action=logout">logout</a>
            <?php
        } else {
            ?>
            <a href="?controller=pages&action=signup">Sign Up</a>
            <a href="?controller=pages&action=login">login</a>
            <?php
        }
        ?>
    </div>
<!--    <div class="searchbar col-md-2">-->
<!--        hihi-->
<!--    </div>-->
</div>