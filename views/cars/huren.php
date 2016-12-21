<h1>Auto Huren</h1>
<div class="rent-view row">
    <?php if(isset($_SESSION['user_session'])){ ?>
    <form action="" method="get" onsubmit="return dateCheck(); return false">
        <input type="hidden" name="controller" value="car">
        <input type="hidden" name="action" value="rent">
        <input type="hidden" name="kenteken" value="<?php echo $_SESSION['auto_kenteken']; ?>">
        <p>Begin datum:<input type="date" id="start_date" name="start_date" placeholder="Begin datum"></p>
        <p>Eind datum:<input type="date" id="end_date" name="end_date" placeholder="Email"></p>
        <input type="submit" value="Huur">
    </form>
    <script>
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
    <?php }else{
        echo "U dient ingelogd te zijn om een auto te kunnen huren. <br />
        Klik <a href='?controller=pages&action=login'>hier</a> om in te loggen.<br/>
        Mocht u nog geen account hebben verzoeken we vriendelijk om <a href='?controller=pages&action=signup'>Hier</a> een account aan te maken";
    } ?>
</div>