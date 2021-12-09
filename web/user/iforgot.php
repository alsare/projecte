<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("_commons/head.php")?>
<body>
    <header>
        <div class = "header_lefthead"><h1><a href= <?=$_SERVER['PHP_SELF']?>Projecte J-Suite</a></h1></div>
    </header>
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
