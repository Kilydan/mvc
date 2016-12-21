<p>Wijzig gegevens:</p>
<form action="" method="get">
    <?php print_r($_SESSION) ?>
    <input type="hidden" name="controller" value="account">
    <input type="hidden" name="action" value="edit">
    <p>Naam:<input type="text" name="name" value="<?php echo $_SESSION['username']; ?>"></p>
    <p>Email:<input type="email" name="username" value="<?php echo $_SESSION['user_email']; ?>"></p>
<!--    <p>Wachtwoord:<input type="password" name="password" value="--><?php //echo $_SESSION['user_password']; ?><!--"></p>-->
    <p>Adress:<input type="text" name="address" value="<?php echo $_SESSION['user_adres']; ?>"></p>
    <p>Postcode:<input type="text" name="postalcode" value="<?php echo $_SESSION['user_postcode']; ?>"></p>
    <p>Plaats:<input type="text" name="place" value="<?php echo $_SESSION['user_place']; ?>"></p>
    <input type="submit" value="Wijzig">
</form>