<?php
if (isset($_SESSION['user_session'])) {
    if ($_SESSION['role'] == 2) {
        ?>
        <h1>Admin Pannel</h1>
        <p>test</p>
        <a href="?controller=admin&action=autos">Auto's</a><br />
        <a href="?controller=admin&action=gebruikers">Gebruikers</a><br />
        <a href="?controller=admin&action=reserveringen">Reserveringen</a>



        <?php
    }else{
        echo "niet de juiste rang, u word over 3 seconden geredirect";
    }
}else {
    echo "u bent niet ingelogd, u word over 3 seconden geredirect naar de login pagina";
    header("Refresh:3; url=/?controller=pages&action=login", true, 303);
}
?>

