<?php
if (isset($_SESSION['user_session'])) {
    if ($_SESSION['role'] == 2) {
        ?>


        <p>test</p>


        <?php
    }else{
        echo "niet de juiste rang - plaats redirect naar error";
    }
}else{
    echo "u bent niet ingelogd - plaats redirect naar error";
}
?>

