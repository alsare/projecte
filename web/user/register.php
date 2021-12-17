<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Sign up"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Sign up</h2>
    <p>Create an account.</p>
    <div class="form">
    <form name="register" action="<?= My\Helpers::url("/user/register_action1.php") ?>" method="post" enctype="multipart/form-data">
        <p>
            <label class="form_leftside" >Username</label>
            <input class="form_rightside" type="text" name="username" required>
        </p><br><br>
        <p>
            <label class="form_leftside" >Password</label>
            <input class="form_rightside" type="password" name="password" required>
        </p><br><br>
        <p>
            <label class="form_leftside">Repeat password</label>
            <input class="form_rightside" type="password" name="confirm_password" required>
        </p><br><br>
        <p>
            <label class="form_leftside">E-mail</label>
            <input class="form_rightside" type="email" name="email" required>
        </p><br><br>
        <p>
            <label class="form_leftside">Image</label>
            <input class="form_rightside" type="file" name="avatar">
        </p><br><br>
        <p>
            <label class="form_leftside">
                <input class="form_rightside" type="checkbox" name="terms" required>
                I agree to the <a href="<?= My\Helpers::url("/terms.php")  ?>">terms and conditions</a>
            </label>
        </p><br><br>
        <p>
            <button>Sign up</button>
            <button type="reset">Reset form</button>
        </p>
    </form>
    </div>
</body>
</html>