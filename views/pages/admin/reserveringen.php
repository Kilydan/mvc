<h1>Reserveringen overzicht</h1>
Verwijder alle vooraf gaande bestellingen<br/>
    <a href="?controller=orders&action=remove">Verwijder</a>
<div class="order-list row">
    <div class="col-md-3"><b>kenteken</b></div>
    <div class="col-md-2"><b>factuurnummer</b></div>
    <div class="col-md-4"><b>datum</b></div>
    <div class="col-md-3"><b>afgenandeld</b></div>
</div>
<div class="order-list row">
    <?php
    date_default_timezone_set('Europe/Amsterdam');
    $today = date('Y-m-d H:i:s');
//    echo $today;
    foreach ($orders as $order) {
        if($today < $order->end_date) {
        ?>
            <div class="row">
                <div class="col-md-3">
                    <?php echo $order->auto_kenteken; ?>
                </div>
                <div class="col-md-2">
                    <?php echo $order->factuurnummer; ?>
                </div>
                <div class="col-md-4">
                    <?php echo 'van: ' . $order->start_date . ' tot: ' . $order->end_date; ?>
                </div>
                <div class="col-md-3">
                    <form method="get" action="">
                        <input type="hidden" name="controller" value="orders">
                        <input type="hidden" name="action" value="afhandelen">
                        <input type="hidden" name="factuurnummer" value="<?php echo $order->factuurnummer; ?>">
                        <select id="wijziging" name="afgehandeld">
                            <option value="1" <?php if($order->afgehandeld == 1) echo "selected" ?>>Ja</option>
                            <option value="0" <?php if($order->afgehandeld == 0) echo "selected" ?>>Nee</option>
                        </select>
                        <input type="submit" value="Wijzig">
<!--                        <script>-->
<!--                            function wijzig(){-->
<!--                                var test = document.getElementById("wijziging").value;-->
<!--                                alert(test);-->
<!--                            }-->
<!--                        </script>-->
                    </form>
                </div>
            </div>

    <?php }
    }
    ?>
</div>


