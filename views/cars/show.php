<div class="single-car-show row">
    <h2><?php echo $car->auto_merk; ?> <?php echo $car->auto_type; ?></h2>
    <div class="beschrijving col-md-12">
        <p>Beschrijving: <br/>
            <?php echo $car->auto_beschrijving; ?>
        </p>
        <div class="information col-md-6">
            <div class="car-info col-md-12">
                Merk: <?php echo $car->auto_merk; ?>
            </div>
            <div class="car-info col-md-12">
                Type: <?php echo $car->auto_type; ?>
            </div>
            <div class="car-info col-md-12">
                Dag prijs: &euro;<?php echo $car->auto_prijs; ?>,-
            </div>
            <div class="huur-knop col-md-12">
                <a href="?controller=pages&action=huren&kenteken=<?php echo $car->auto_kenteken; ?>"><h3>Huren</h3></a>
            </div>
        </div>
        <div class="image col-md-6">
            <div class="car-image col-md-12">
                <?php echo '<img src="', $car->auto_image, '"/>' ?>
            </div>
        </div>
    </div>

</div>
