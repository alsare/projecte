<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html>
<?= My\Helpers::render("_commons/head.php")?>
<body>
<?= My\Helpers::render("_commons/header2.php")?>

<div class="form">
<form action="login_action.php" method = "POST">
    <label>Sign In</label><br><br>
    <label>Username:</label><br>
    <input type="text" name="username" value=""><br>
    <label>Password:</label><br>
    <input type="password" name="password" value=""><br><br>
    <input type="submit" value="Sign In"><br><br>
    <a href = "iforgot.html" for="forgot">Forgot Password?</a><br><br>
    <label for="newuser">New User</label><br>
    <input type="submit" value="Sign In"><br><br>
</form> 
</div>