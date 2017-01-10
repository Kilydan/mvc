<p>Wijzig gegevens:</p>
<form action="" method="get">
    <input type="hidden" name="controller" value="car">
    <input type="hidden" name="action" value="change">
    <div class="row">
        <div class="col-md-6">
            <h3>Auto omschrijving</h3>
            <p>Kenteken:<br/><input type="text" name="kenteken" value="<?php echo $_SESSION['auto_kenteken']; ?>"></p>
            <p>Merk:<br/><input type="text" name="brand" value="<?php echo $_SESSION['auto_merk']; ?>"></p>
            <p>Type:<br/><input type="text" name="type" value="<?php echo $_SESSION['auto_type']; ?>"></p>
            <input type="submit" value="Wijzig auto">
        </div>
        <div class="col-md-6">
            <h3>Informatie gegevens</h3>
            <p>Auto prijs:<br/><input type="text" name="price" value="<?php echo $_SESSION['auto_prijs']; ?>"></p>
            <p>Beschrijving:<br/><textarea name="description" placeholder=""><?php echo $_SESSION['auto_beschrijving']; ?></textarea></p>
            <p>Image:<br/><input type="text" name="image" value="<?php echo $_SESSION['auto_image']; ?>"></p>
        </div>
    </div>
</form>

<a href="?controller=car&action=remove" class="removeAlert">Verwijder auto</a>

<script type="text/javascript">
    var elems = document.getElementsByClassName('removeAlert');
    var confirmIt = function (e) {
        if (!confirm('Weet u zeker dat u de auto inclusief alle bestaande bestellingen wilt verwijderen?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>