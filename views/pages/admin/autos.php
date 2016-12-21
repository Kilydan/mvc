<h1>Auto overzicht</h1>
<div class="showroom-wrapper row">
    <?php foreach ($cars as $car) { ?>
        <div class="showroom col-md-4">
            <div class="car-image">
                <?php echo '<img src="', $car->auto_image, '"/>' ?>
            </div>
            <div class="overzicht row">
                <div class="car-info col-md-6">
                    Merk: <?php echo $car->auto_merk; ?>
                </div>
                <div class="car-info col-md-6">
                    Type: <?php echo $car->auto_type; ?>
                </div>
                <div class="car-info col-md-6">
                    Dag prijs: <?php echo $car->auto_prijs; ?>
                </div>
                <div class="beschrijving col-md-12">
                    <p>Beschrijving: <br/>
                        <?php

                        $beschrijving = strip_tags($car->auto_beschrijving);

                        if (strlen($beschrijving) > 60) {

                            // truncate string
                            $stringCut = substr($beschrijving, 0, 60);

                            // make sure it ends in a word so assassinate doesn't become ass...
                            $beschrijving = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="/">Lees Meer</a>';
                        }
                        echo $beschrijving; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>