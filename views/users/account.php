<?php
if (isset($_SESSION['user_session'])) {
    ?>
    <h1><?php echo $_SESSION['username']; ?></h1>
    <h3>Account beheren</h3>
    <a href="?controller=pages&action=edit_account">Wijzig account gegevens</a><br/>
    <a href="?controller=account&action=invoices">Mijn facturen</a><br/>
    <?php
} else {
    echo "u bent niet ingelogd, u word over 3 seconden geredirect naar de login pagina";
    header("Refresh:3; url=/?controller=pages&action=login", true, 303);
}
?>