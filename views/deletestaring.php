<html>
    <head>
        <title>Удаление заведения</title>
    </head>
    <body>
        <form action="" method="post">
            <select name="id">
                <option disabled>Удаление заведения</option>
                <?php foreach ($delete as $del) : ?>
                    <option value="<?= $del->id; ?>"><?= $del->name ?><?= $del->id ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="submit" value="Удалить"><br>
        </form>
    </body>
</html>

