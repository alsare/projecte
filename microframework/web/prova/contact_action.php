<?php

<<<<<<< HEAD
require_once __DIR__ . "/../../vendor/autoload.php";
use Rakit\Validation\Validator;
use My\Helpers;
use My\Mail;
// ...

$validator = new Validator();
$validation = $validator->make($_POST + $_FILES,  [
    'subject'                 => 'required',
    'body'                 => 'required|max:255',
    'email'                 => 'required|email',
    'attachment'                 => 'uploaded_file|max:1M'
]);
$validation->validate();

    if ($validation->fails()) {
        $errors = $validation->errors();
        $messages = $errors->all();
        foreach ($messages as $message) {
            Helpers::log()->debug("Error: {$message}");
            Helpers::flash($message);
        }
        
    } else {
        $subject = $POST["subject"];
        $mail = $_POST["email"];
        $cos = $_POST["body"];
        $username = $_POST["username"];
        session_start();
        $_SESSION["correu"] = $mail;

        if (!empty($_FILES["attachment"]["name"])) {
            $filepath = $_FILES["avatar"]["tmp_name"];
            Helpers::log()->debug("New file saved in {$filepath}");
        }else{
            Helpers::log()->debug("No s'ha pujat archiu");
        }
        
        $url = Helpers::url("/prova/contract.php");
        $mail = new Mail("Missatge de {$username}: {$cos}. Enviat des de {$url}");
        $send = $mail->send([$mail]);

        Helpers::flash("Tot bé"); 
        Helpers::redirect($url);
    }
    $url = Helpers::url("/prova/contract.php");
        Helpers::redirect($url);
=======
use My\Database;
use My\Helpers;
use My\Mail;
use PHPUnit\Framework\TestCase;
use Rakit\Validation\Validator;

require_once __DIR__ . "/../../vendor/autoload.php";


$validator = new Validator();

$validation = $validator->make($_POST + $_FILES, [
    'subject'              => '',
    'body'                  => 'required|max 255',
    'email'                 => 'required|email',
    'password'              => 'required',
]);

$validation->validate();

$username = $_POST("username");
$email = $_POST("email");
$body = $_POST("body");
$subject = $_POST("subject");

if ($validation ->fails()) {
    $url = Helpers::url("prova/roles.php");
    Helpers::log()->debug($url);
    Helpers::redirect($url);
}else{
    $url = Helpers::url("prova/roles.php");
    Helpers::log()->debug($url);
    Helpers::redirect($url);
    $url2 = "http://localhost/tarda/projecte/microframework/web/prova/";
    $link = "Link";
    $isHtml = "true";
    $body2 = "Mensaje de " +$username + "($body)" + "envio realizado desde" + $url2 ;
    Helpers::log()->debug($body2);

    }
    $db = new database();
    $sentence = $db->prepare("SELECT * FROM users WHERE email=($email)");
    $sentence = execute();
    $resultado = $sentence->fetchAll();
    $contador = count($resultado);

    if($contador >= 1){
        $body2 = ($body);
        $url2 = "http://localhost/tarda/projecte/microframework/web/prova/contact.php";
        $isHtml = true;
        $to = [$email];
        $sendMail = new Mail($subject, $body2, $isHtml);
        $send = $sendMail->send($to);
        Helpers::log()->debug($body2);

    }else{
        $url = Helpers::url("/prova/contact.php");
        Helpers::log()->debug($url);
        Helpers::redirect($url);
    }


>>>>>>> origin/b1.1-bruno
