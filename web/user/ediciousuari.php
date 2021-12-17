<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
$db = new My\Database();
// $tokenuser = $_COOKIE[$session_token];
//$search = $db -> prepare("SELECT `user_id` FROM `user_tokens` WHERE `token` = '$tokenuser'");
$search -> execute();?>
<!DOCTYPE html>
    <html lang="ca">
    <?= My\Helpers::render("_commons/head.php")?>
    <body>
    <?= My\Helpers::render("_commons/header.php")?>
    <div class="form">
        <form action="ediciousuari_action.php" method="POST">
        <?php foreach($search as $row){
            $iduser=$row['user_id'];
            $searchinfo = $db -> prepare("SELECT * FROM `users` WHERE `id` = '$iduser'");
            $searchinfo -> execute(); 
            foreach($searchinfo as $row2)?> 
                <label class="form_leftside" for="name"> Username </label><input class="form_rightside" id="name" name="nom" value=<?php echo $row2[username] ?> disabled> <input type="hidden" id="name" name="nom" value=<?php echo $row2[username] ?> disabled><br><br>
                <label class="form_leftside" for="correu" >Email  </label><input class="form_rightside" id="correu" name="correu" value =<?php echo $row2[email] ?>><br><br>
                <label class="form_leftside" for="contrasenya">Contrasenya </label><input class="form_rightside" id="contrasenya" name="contrasenya"type="password"><br><br>
                <label class="form_leftside" for="confirmar_contrasenya">Confirmar Contrasenya </label><input class="form_rightside" id="confirmar_contrasenya" name ="contrasenya2" type="password"><br><br>
                <input type="file" id="avatar" name="avatar">
                <input class="form_rightside--boton" type="submit" value="Guardar"><br>
        <?php } ?>    
        </form>
    </div>
    </body>
</html>
<?php $db->close(); ?>