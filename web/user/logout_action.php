<?php
session_start();
use My\Helpers;
use My\Database;
use My\User;
if (User::isAuthenticated()){
    if (isset($_COOKIE)){
        $search = $_COOKIE[User::COOKIE_NAME];
        setcookie(User::COOKIE_NAME, "", time() - 3600);
        unset($_SESSION["uid"]);
        $db = new My\Database();
        $searchinfo = $db -> prepare("DELETE FROM `user_tokens` WHERE `user_id` = '$search'");
        $searchinfo -> execute(); 
    }
}
$back = My\Helpers::url("index.php");
Helpers::flash("Sesió tencada");
My\Helpers::redirect($back);
?>