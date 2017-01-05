<h1>Reserveringen overzicht</h1>
<div class="order-list row">
    <div class="col-md-4" style="margin-left:15px;"><b>kenteken</b></div>
    <div class="col-md-4"><b>factuurnummer</b></div>
    <div class="col-md-3"><b>datum</b></div>
</div>
<div class="order-list row">
    <?php
    foreach ($orders as $order) { ?>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6"><?php echo $order->auto_kenteken; ?></div>
                <div class="col-md-6"><?php echo $order->factuurnummer; ?></div>
            </div>
        </div>
        <div class="col-md-4">
            <?php echo 'van: ' . $order->start_date . ' tot: ' . $order->end_date; ?>
        </div>

    <?php }
    ?>
</div>