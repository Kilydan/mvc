<div class="single-car-show row">
    <h2><?php echo $_SESSION['auto_merk']; ?> <?php echo $_SESSION['auto_type']; ?></h2>
    <div class="beschrijving col-md-12">
        <p>Beschrijving: <br/>
            <?php echo $_SESSION['auto_beschrijving']; ?>
        </p>
        <div class="information col-md-6">
            <div class="car-info col-md-12">
                Merk: <?php echo $_SESSION['auto_merk']; ?>
            </div>
            <div class="car-info col-md-12">
                Type: <?php echo $_SESSION['auto_type']; ?>
            </div>
            <div class="car-info col-md-12">
                Dag prijs: &euro;<?php echo $_SESSION['auto_prijs'];?>,-
            </div>
            <div class="huur-knop col-md-12">
                <a href="?controller=pages&action=huren"><h3>Huren</h3></a>
            </div>
        </div>
        <div class="image col-md-6">
            <div class="car-image col-md-12">
                <?php echo '<img src="', $_SESSION['auto_image'], '"/>' ?>
            </div>
        </div>
    </div>

</div>
