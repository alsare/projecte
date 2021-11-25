<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="ca">
    <?= My\Helpers::render("_commons/head.php")?>
<body>
    <?= My\Helpers::render("_commons/header.php")?>
    <div class="form">
        <form action="register_action.php" >
            <label class="form_leftside" for="name">Nom </label><input class="form_rightside" id="name"><br><br>
            <label class="form_leftside" for="cognom" >Cognom </label><input class="form_rightside" id="cognom"><br><br>
            <label class="form_leftside" for="correu" >Correu </label><input class="form_rightside" id="correu"><br><br>
            <label class="form_leftside" for= "naixement">Data Naixement </label><input class="form_rightside" id="naixement"><br><br>
            <label class="form_leftside" for="pais" >Pais </label><input class="form_rightside" id="pais"><br><br>
              <label class="form_leftside" for="contrasenya">Contrasenya </label><input class="form_rightside" id="contrasenya" type="password"><br><br>
              <label class="form_leftside" for="confirmar_contrasenya">Confirmar Contrasenya </label><input class="form_rightside" id="confirmar_contrasenya" type="password"><br><br>
                  <br>
                  <label class="form_leftside">Descripció:</label><br>
                  <textarea name = "text_descripció"class="form_rightside" cols="50" rows="10"></textarea><br>
  
              <input class="form_rightside--boton" type="submit" value="Guardar"><br>
            
      
        </form>
    </div>
    
</body>
</html>