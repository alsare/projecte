<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?= My\Helpers::render("_commons/head.php")?>
<body>
<?= My\Helpers::render("_commons/header.php")?>
    <div class="form">
    <form action="register_action.php" method = "POST">    
            <label class="form_leftside">Nom </label>
            <input class="form_rightside" name="name"><br><br>
            <label class="form_leftside">Cognom </label>
            <input class="form_rightside" name="cognom"><br><br>
            <label class="form_leftside">Correu </label>
            <input class="form_rightside" name="correu"><br><br>
            <label class="form_leftside">Contrasenya </label>
            <input class="form_rightside" name="contrasenya" type="password"><br><br>
            <label class="form_leftside">Confirmar Contrasenya </label>
            /* Container for flexboxes */
.container {
    display: flex;
    flex-direction: row; /* default */
}

.column1 {
    flex: 1;
}

.column2 {
    flex: 3;
}

*[class^="column"] {
    padding: 20px;
}

/*  Responsive layout - 
    makes the menu and the content (inside the section) 
    sit on top of each other instead of next to each other */
@media (max-width: 600px) {
    .container {
        flex-direction: column;
    }
}<input class="form_rightside" name="confirmar_contrasenya" type="password"><br><br>
            
            
                <br><br><br>
            <input type="file" name="imagen1" /><br><br>
            <input class="form_rightside" type="submit" value="Sign Up"><br>
            
        </form>
    </div>
    
</body>
</html>
