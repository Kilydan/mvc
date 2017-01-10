<h1>Auto Huren</h1>
<div class="rent-view row">
    <?php
    //die(print_r($_SESSION));
    if(isset($_SESSION['user_session'])){ ?>
        <script>
            jQuery(document).ready(function($){

                var disableddates = ["20-05-2015", "12-11-2014", "12-25-2014", "12-20-2014", "01-15-2017"];


                function DisableSpecificDates(date) {
                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                    return [disableddates.indexOf(string) == -1];
                }

                var dateFormat = "mm/dd/yy",
                    from = $( "#start_date" )
                        .datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            numberOfMonths: 1,
                            beforeShowDay: DisableSpecificDates
                        })
                        .on( "change", function() {
                            to.datepicker( "option", "minDate", getDate( this ) );
                        }),
                    to = $( "#end_date" ).datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1,
                        beforeShowDay: DisableSpecificDates
                    })
                        .on( "change", function() {
                            from.datepicker( "option", "maxDate", getDate( this ) );
                        });

                function getDate( element ) {
                    var date;
                    try {
                        date = $.datepicker.parseDate( dateFormat, element.value );
                    } catch( error ) {
                        date = null;
                    }

                    return date;
                }
            } );


            function dateCheck(){
                var startdate = document.getElementById("start_date").value;
                var enddate = document.getElementById("end_date").value;
                if(startdate > enddate){
                    alert("U dient een geldige datum in te voeren");
                    return false;
                }
                return true;
            }
        </script>

        <?php
        foreach ($orders as $order){
            //print_r($order);
        }

        ?>
    <form action="" method="get" onsubmit="return dateCheck(); return false">
        <input type="hidden" name="controller" value="car">
        <input type="hidden" name="action" value="rent">
        <input type="hidden" name="kenteken" value="<?php echo $_SESSION['auto_kenteken']; ?>">
        <p><label for="start_date">Begin datum:</label><input type="text" id="start_date" name="start_date"></p>
        <p><label for="end_date">Eind datum:</label><input type="text" id="end_date" name="end_date"></p>
        <input type="submit" value="Huur">
    </form>


    <?php }else{
        echo "U dient ingelogd te zijn om een auto te kunnen huren. <br />
        Klik <a href='?controller=pages&action=login'>hier</a> om in te loggen.<br/>
        Mocht u nog geen account hebben verzoeken we vriendelijk om <a href='?controller=pages&action=signup'>Hier</a> een account aan te maken";
    } ?>

</div>