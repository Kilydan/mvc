<?php
if (isset($_SESSION['user_session'])) {
    if ($_SESSION['role'] == 3) {
        ?>
        <h1>Admin Pannel</h1>
        <h3>Auto's beheren</h3>
        <a href="?controller=car&action=index">Auto overzicht</a><br />
        <a href="?controller=car&action=show">Auto's wijzigen/verwijderen</a><br />
        <a href="?controller=car&action=find">Auto's toevoegen</a><br />
        <h3>Gebruikers beheren</h3>
        <a href="?controller=admin&action=gebruikers">Gebruikers</a><br />
        <h3>Reserveringen</h3>
        <a href="?controller=admin&action=reserveringen">Reserveringen</a>



        <?php
    }else{
        echo "niet de juiste rang, u word over 3 seconden geredirect";
        header("Refresh:3; url=/");
    }
}else {
    echo "u bent niet ingelogd, u word over 3 seconden geredirect naar de login pagina";
    header("Refresh:3; url=/?controller=pages&action=login", true, 303);
}
?>

