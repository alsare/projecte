<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Rakit\Validation\Validator;
use My\Helpers;
use My\Database;
use My\Token;
use My\User;

$url = Helpers::url(""); // Go to homepage

$validator = new Validator();

$validation = $validator->make($_POST, [
    'username' => 'required',
    'password' => 'required'
]);


$validation->validate();

if ($validation->fails()) {

    // See https://github.com/rakit/validation#working-with-error-message
    $errors = $validation->errors();
    $messages = $errors->all();
    foreach ($messages as $message) {
        Helpers::flash($message);
        
    }

} else {

    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);


    try {
        if (User::isAuthenticated()){
        Helpers::log()->debug("Check username and password");
        $db = new Database();
        $sql = "SELECT username FROM users WHERE username='$username' AND password='$password'";
        Helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();
        foreach($stmt as $row){
            $usersearch=$row["username"];
        }
        Helpers::log()->debug($usersearch);


        
        if ($username = $usersearch) {

            Helpers::log()->debug("Username and password OK");


            $datetime = date('Y-m-d H:i:s');
            $uid = $user["id"];
            
            // Update user
            Helpers::log()->debug("Update user last access");
            $sql = "UPDATE users 
                    SET last_access='$datetime' 
                    WHERE id=$uid";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);
            $stmt->execute();
            Helpers::log()->debug("User updated");

            // Create user session token
            // ...
            $db = new Database();
            $token = Token::generate();
            $type = Token::ACTIVATION;
            $sql = "INSERT INTO user_tokens 
                    VALUES ($uid, '$token', 'S', '$datetime')";

                     $stmt = $db->prepare($sql);            
                     $stmt->execute();
            
        
            
            // Create user session cookie
            // ...
            Helpers::log()->debug("Cookie creada");
            setcookie('session_token', $token, time() + (86400 * 30), "/");

        } else {
            Helpers::log()->debug("Invalid username and password");
            Helpers::flash("Error de credencials. Prova de nou");
        }
    }
    } catch (PDOException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut enviar les dades. Prova-ho m??s tard.");
    } catch (Exception $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("Hi hagut un error inesperat. Prova-ho m??s tard.");
    }
}
Helpers::flash("Has tornat a la pagina d'inici.");
Helpers::redirect($url);

$db->close();