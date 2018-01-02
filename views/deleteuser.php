<html>
    <head>
        <title>Удаление пользователя</title>
    </head>
    <body>
        <form action="" method="post">
            <select name="id">
                 <option disabled>Удаление пользователя</option>
                <?php foreach ( $delusers as $delus) : ?>
                <option value="<?= $delus->id; ?>">[<?= $delus->type ?>]<?= $delus->phone ?></option>
                <?php endforeach; ?>
            </select><br>
             <input type="submit" value="Удалить"><br>
        </form>
    </body>
</html>