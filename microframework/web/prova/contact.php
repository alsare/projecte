<<<<<<< HEAD
<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
use My\User;
use My\Helpers;
?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Contact us"]) ?>
=======
<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
>>>>>>> origin/b1.1-bruno
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Contacte</h2>
    <p>Omple les dades i et contactarem:</p>
    <form name="contact">
        <p>
            <label>Assumpte</label><br>
            <input type="text" name="subject" required>
        </p>
        <p>
            <label>Cos</label><br>
            <textarea name="body" required></textarea>
        </p>
<<<<<<< HEAD
        <?php if(!User::isAuthenticated()) {?>
            <p>
                <label>Nom</label><br>
                <input type="text" name="username">
            </p>
        <?php }?>
        <?php session_start();
        if (isset($_SESSION["correu"])) {?>
            <p>
                <label>Correu electrònic</label><br>
                <input type="email" name="email" value=<?php $_SESSION["correu"] ?> required>
            </p>
        <?php } else {?>
            <p>
                <label>Correu electrònic</label><br>
                <input type="email" name="email" required>
            </p>
        <?php } ?>
=======
        <p>
            <label>Nom</label><br>
            <input type="text" name="username">
        </p>
        <p>
            <label>Correu electrònic</label><br>
            <input type="email" name="email" required>
        </p>
>>>>>>> origin/b1.1-bruno
        <p>
            <label>Adjunt</label><br>
            <input type="file" name="attachment">
        </p>
        <p>
            <button>Send message</button>
            <button type="reset">Reset form</button>
        </p>
    </form>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>