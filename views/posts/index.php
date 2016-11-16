list of all posts:
<?php foreach($posts as $post) { ?>
<p>
    <?php echo $post->author; ?>
    <a href="?controller=posts&action=show&id=<?php echo $post->id; ?>">see content</a>
</p>
<?php } ?>