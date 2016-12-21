<?php SESSION_START();
print_r($_SESSION);
?>
<table style="width:100%">
    <!--    Factuur informatie     -->
    <tr>
        <td style="width:25%">
        </td>
        <td style="width:25%">
        </td>
        <td style="width:25%">
            <h3>Factuur Overzicht</h3>
        </td>
        <td style="width:25%">
        </td>
    </tr>
    <tr>
        <td style="width:25%">
        </td>
        <td style="width:25%">
        </td>
        <td style="width:25%">
            Factuur nummer:
        </td>
        <td style="width:25%">
            <?php echo $_SESSION['factuurnummer']; ?>
        </td>
    </tr>
    <!--   persoons gegevens    -->
    <tr>
        <td style="width:25%">
        </td>
        <td style="width:25%">
        </td>
        <td style="width:25%">
            Order datum:
        </td>
        <td style="width:25%">
            <?php echo $_SESSION['orderdatum']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width:50%">
            <b>Van</b>
        </td>
        <td colspan="2" style="width:50%; padding-top:15px;">
            <b>Factuur adres</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width:50%">
            Rent-A-Car
        </td>
        <td colspan="2" style="width:50%">
            <?php echo $_SESSION['username']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width:50%">
            Almere
        </td>
        <td colspan="2" style="width:50%">
            <?php echo $_SESSION['gebruiker_adres']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width:50%">
        </td>
        <td colspan="2" style="width:50%">
            <?php echo $_SESSION['gebruiker_plaats']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width:50%">
        </td>
        <td colspan="2" style="width:50%">
            <?php echo $_SESSION['gebruiker_postcode']; ?>
        </td>
    </tr>
    <!--    auto gegevens     -->
    <tr>
        <td style="width:20%; padding-top:15px;">
            <b>Auto</b>
        </td>
        <td style="width:20%">
            <b>Dagen</b>
        </td>
        <td style="width:20%">
            <b>Belasting</b>
        </td>
        <td style="width:20%">
            <b>Dag prijs</b>
        </td>
        <td style="width:20%">
            <b>Totaal</b>
        </td>
    </tr>
    <tr>
        <td style="width:20%">
            <?php echo $_SESSION['auto_type']; ?>
        </td>
        <td style="width:20%">
        </td>
        <td style="width:20%">
        </td>
        <td style="width:20%">
        </td>
        <td style="width:20%">
        </td>
    </tr>
    <tr>
        <td style="width:20%">
            <?php echo $_SESSION['auto_merk']; ?>
        </td>
        <td style="width:20%">
            <?php
            $diff = abs(strtotime($_SESSION['end_date']) - strtotime($_SESSION['start_date']));

            echo $date_diff = date('d', $diff);
            ?>
        </td>
        <td style="width:20%">
            21%
        </td>
        <td style="width:20%">
            <?php echo $_SESSION['auto_prijs']; ?>
        </td>
        <td style="width:20%">
            <?php $totaal_prijs = $_SESSION['auto_prijs'] * $date_diff / 100 * 121;
            echo $totaal_prijs; ?>
        </td>
    </tr>
    <tr>
        <td style="width:20%">
            van: <?php echo $_SESSION['start_date']; ?> tot: <?php echo $_SESSION['end_date']; ?>
        </td>
        <td style="width:20%">

        </td>
        <td style="width:20%">

        </td>
        <td style="width:20%">

        </td>
        <td style="width:20%">

        </td>
    </tr>
<!--    brekeningen     -->
    <tr>
        <td colspan="3" style="width:20%">

        </td>
        <td style="width:20%">
            Subtotaal
        </td>
        <td style="width:20%">
            <?php $subtotaal_prijs = $_SESSION['auto_prijs'] * $date_diff;
            echo $subtotaal_prijs .',-'; //bereken: dagprijs x dagen / 100 x 121 ?>

        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:20%">

        </td>
        <td style="width:20%">
            BTW @ 21%
        </td>
        <td style="width:20%">
            <?php $btw_prijs = $_SESSION['auto_prijs'] * $date_diff / 100 * 21;
            echo $btw_prijs .',-'; //bereken: dagprijs x dagen / 100 x 121 ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="width:60%">

        </td>
        <td style="width:20%">
            totaal:
        </td>
        <td style="width:20%">
            <?php $totaal_prijs = $_SESSION['auto_prijs'] * $date_diff / 100 * 121;
            echo $totaal_prijs .',-'; ?>
        </td>
    </tr>
<!--    Betalings informatie    -->
    <tr>
        <td colspan="5">
            <h3>Betalings informatie</h3>
        </td>
    </tr>
    <tr>
        <td colspan="5">
            U kunt u auto in ontvangst nemen zodra u betaald heeft. <br/>
            Mocht u minder dagen hebben gebruikt dan de bestelling kunt u uw geld van de resterende dagen terug vragn.<br/>
            LET OP!: Dit moet u zelf regelen.<br/><br/>
            U kunt u auto om <?php echo $_SESSION['start_date']; ?> om 9.00 in ontvangst nemen. <br/>
            Mochten er nog vrijgen zijn kan er altijd gemaild worden naar info@rent-a-car.com
        </td>
    </tr>
</table>
