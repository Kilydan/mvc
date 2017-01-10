<p>Registreer:</p>
<form action="" method="get">
    <input type="hidden" name="controller" value="car">
    <input type="hidden" name="action" value="addCar">
    <div class="row">
        <div class="col-md-6">
            <h3>Auto omschrijving</h3>
            <p>Kenteken:<br/><input type="text" name="kenteken" placeholder="Kenteken"></p>
            <p>Merk:<br/><input type="text" name="brand" placeholder="Merk"></p>
            <p>Type:<br/><input type="text" name="type" placeholder="Type"></p>
            <input type="submit" value="Voeg auto toe!">
        </div>
        <div class="col-md-6">
            <h3>Informatie gegevens</h3>
            <p>Auto prijs:<br/><input type="text" name="price" placeholder="Prijs"></p>
            <p>Beschrijving:<br/><textarea name="description" placeholder=""></textarea></p>
            <p>Image:<br/><input type="text" name="image" placeholder="Link naar 1920x1080 image"></p>
        </div>
    </div>
</form>