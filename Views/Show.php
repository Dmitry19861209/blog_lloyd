<?php include ('header.php')?>
    <h2>Редактирование блога № <?php echo $blog['id'] ?>.</h2><button id="delete_blog" type="button" class="btn btn-sm btn-primary">Удалить</button>

    <form action="/blog/edit" method="get">
        <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog['id'] ?>">
        <div class="form-group">
            <label for="header">Заголовок</label>
            <input type="text" class="form-control" id="header" name="header" value="<?php echo $blog['header'] ?>">
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" name="text"><?php echo $blog['text'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
<span>Дата последнего изменения <?php echo $blog['updated_at'] ?></span>
<?php include ('footer.php')?>

<script>

    $('#delete_blog').click(function () {
        var url = "/blog/delete/" + $('#blog_id').val();

        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                window.location.href = "/";
            }
        });
    });
</script>


