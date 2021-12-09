<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("_commons/head.php")?>
<body>
    <?= My\Helpers::render("_commons/header2.php")?>
    <div class="form">
        <form action="">
            <label class="form_leftside">Contrasenya </label>
            <input class="form_rightside" name="contrasenya" type="password"><br><br>
            <label class="form_leftside">Confirmar Contrasenya </label>
            <input class="form_rightside" name="confirmar_contrasenya" type="password"><br><br>
            <input class="form_rightside--boton" type="submit" value="Recuperar">
        </form>
    </div> 
</body>
</html>