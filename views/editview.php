<html>
    <head>
        <title>Заведения</title>
    </head>
    <body>
        <form action ="" method = "post">
            <input type="text" name="name" placeholder="Название"><br>
            <input type="text" name="description" placeholder="Описание"><br>
            <input type="text" name="grafik" placeholder="График"><br>

            <select name="manager">
                <option disabled>Выбор менеджера</option>
                <?php foreach ($users as $u) : ?>
                    <option value="<?= $u->email; ?>"><?= $u->email ?>Тип: <?= $u->type; ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="text" name="address" placeholder="Адрес"><br>
            <input type="submit" value="Добавить"><br>
        </form>
    </body>
</html>
