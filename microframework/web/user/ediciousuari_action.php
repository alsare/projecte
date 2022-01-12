<?php require_once __DIR__ . "/../../vendor/autoload.php";
/*use Rakit\Validation\Validator;
$validator = new Validator;

$validation = $validator->validate($_POST + $_FILES, [
    'nom'                  => 'required',
    'correu'                 => 'required|email/\d/',
    'contrasenya'              => 'required|min:8',
    'contrasenya2'      => 'required|same:contrasenya',
    'avatar'                => 'uploaded_file:0,1240K,png,jpeg,gif'
]);*/
$nom = $_POST["nom"];
$mail = $_POST["correu"];

/*

if ($validation->fails()) {
	$back = My\Helpers::url("/user/ediciousuari.php");
    My\Helpers::redirect($back);
} else {*/
    // validation passes
    $db = new My\Database();
    $tokenuser = $_COOKIE[$session_token];
    $search = $db -> prepare("SELECT `user_id` FROM `user_tokens` WHERE `token` = '$tokenuser'");
    $search -> execute();
    foreach($search as $row){
        $iduser=$row[user_id];
    }
    
    $goin = $db -> prepare("SELECT `email` FROM `users` WHERE `id` != '$iduser'");
    $goin -> execute();
    foreach($goin as $row){
        if($row[email] == $mail){
            $back = My\Helpers::url("/user/ediciousuari.php");
            My\Helpers::redirect($back);
        }
    }

    $emailchange = $db->prepare("SELECT email FROM `users` WHERE `username` = '$nom'");
    $emailchange -> execute();
    foreach($emailchange as $row2){
        if($row2["email"] == $mail){
            $goin2 = $db->prepare("UPDATE `users` SET `correu`='$mail',`contrasenya`='$contrasenya', `status`='0' WHERE `id`='$iduser'");
            $goin2 -> execute();
            $mail = new Mail;
        }
        else{
            $goin2 = $db->prepare("UPDATE `users` SET `contrasenya`='$contrasenya' WHERE `username`='$nom'");
            $goin2 -> execute();
        }
    }
    
    My\Helpers::flash("Dades Actualitzades");
    $back = My\Helpers::url("/user/ediciousuari.php");
    My\Helpers::redirect($back);
    
/*}*/

