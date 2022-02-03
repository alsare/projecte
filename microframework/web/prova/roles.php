<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Roles"]) ?>
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
    <h2>Llistat actual de rols</h2>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
            </tr>            
        </thead>
        <tbody>


        </tbody>
    </table>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
