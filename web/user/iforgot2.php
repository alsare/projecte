<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("_commons/head.php")?>
<body>
    <header>
        <div class = "header_lefthead"><h1><a href= <?=$_SERVER['PHP_SELF']?>Projecte J-Suite</a></h1></div>
    </header>
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