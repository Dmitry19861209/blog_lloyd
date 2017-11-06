<?php include ('header.php')?>
    <h2>Добавить блог.</h2>

    <form action="/blog/add" method="get">
        <input type="hidden" name="blog_id" id="blog_id" value="">
        <div class="form-group">
            <label for="header">Заголовок</label>
            <input type="text" class="form-control" id="header" name="header" required>
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" name="text" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
<?php include ('footer.php')?>