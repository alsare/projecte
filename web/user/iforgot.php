<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("_commons/head.php")?>
<body>
    <?= My\Helpers::render("_commons/header2.php")?>
    <div class="form" action="">
        <form>
            <h3>Recuperar contrasenya</h1><br>
            <label class="form_leftside">Correu</label>
            <input class="form_rightside" type="text"><br>
            <p class="form_rightside">S'enviará un correu amb la nova contrasenya</p><br><br>
            <input class="form_rightside--boton"type="submit">
        </form>
    </div>
</body>
</html>
