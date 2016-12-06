<?php
if (isset($_SESSION['user_session'])) {
    if ($_SESSION['role'] == 2) {
        ?>


        <p>test</p>


        <?php
    }else{
        echo "niet de juiste rang, u word over 3 seconden geredirect";
    }
}else {
    echo "u bent niet ingelogd, u word over 3 seconden geredirect naar de login pagina";
    header("Refresh:3; url=/?controller=pages&action=login", true, 303);
}
?>

