<div class="container row">
    <h2>Contact</h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget erat id nibh ultricies scelerisque. Donec
        tellus nibh, egestas eu vestibulum sed, efficitur ut felis. Ut ultricies placerat turpis at dictum. Etiam et
        mauris at eros tempor egestas et in enim. Nam pulvinar risus sit amet dignissim bibendum. Etiam aliquet sed quam
        quis feugiat. Morbi pretium leo a placerat convallis.
    </p>
    <div class="col-md-12">
        <form action="" method="get">
            <input type="hidden" name="controller" value="account">
            <input type="hidden" name="action" value="mail">
            <p>Naam:<br/><input type="text" name="username" value="<?php if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                } ?>"></p>
            <p>Email:<br/><input type="email" name="user_email" value="<?php if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_email'];
                } ?>"></p>
            <!--    <p>Wachtwoord:<input type="password" name="password" value="-->
            <?php //echo $_SESSION['user_password']; ?><!--"></p>-->
            <p>Bericht:<br/>
                <textarea type="text" name="bericht" value="" style="width: 300px; height:200px;">

            </textarea>
            </p>
            <p><input type="submit" value="Verstuur"></p>
        </form>
    </div>
</div>