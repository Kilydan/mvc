<div class="menu">
    <a href="/">Home</a>
    <!--    <a href="?controller=pages&action=login">login</a>-->
    <?php
    if (isset($_SESSION['user_session'])) {
        if ($_SESSION['role'] == 2) {
            ?>
            <a href="?controller=pages&action=admin">Admin</a>
            <?php
        }
    }
    ?>
    <a href="?controller=posts&action=index">Posts</a>
    <?php
    if (isset($_SESSION['user_session'])) {
        ?>
        <a href="?controller=account&action=logout">logout</a>
        <?php
    } else {
        ?>
        <a href="?controller=pages&action=signup">Sign Up</a>
        <a href="?controller=pages&action=login">login</a>
        <?php
    }
    ?>
</div>
