<?php include ('header.php')?>
<h2>Список блогов.</h2>

<div class="blog-main">
    <?php foreach ($blogs as $blog) { ?>
        <a href="<?php echo "/blog/show/" . $blog['id']?>">
            <div class="well well-sm blog-item">
                <h4><?php echo $blog['header'] ?></h4>
                <p><?php echo $blog['text'] ?></p>
            </div>
        </a>
    <?php } ?>
</div>
<?php include ('footer.php')?>