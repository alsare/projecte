<?php

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