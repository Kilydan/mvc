<div class="container">
    <?php
    if (isset($_SESSION['user_session'])) {
        echo 'Welkom ' . $_SESSION['username'];
    }else{
        echo 'Welkom!';
    }?>
</div>