<div class="container">
    <?php
    if (isset($_SESSION['user_session'])) {
        echo $_SESSION['username'];
    }else{
        echo 'Welkom!';
    }?>
</div>