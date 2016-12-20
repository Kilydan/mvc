<h1>Auto overzicht</h1>
list of all cars:
<?php foreach($cars as $car) { ?>
    <p>
        <?php echo $car->auto_kenteken; ?>
        <?php echo $car->auto_merk; ?>
        <?php echo $car->auto_type; ?>
        <?php echo $car->auto_prijs; ?>
        <?php echo $car->auto_beschrijving; ?>
    </p>
<?php } ?>