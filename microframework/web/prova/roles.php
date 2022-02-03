<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
use My\Database;
?>

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Roles"]) ?>

<body>
    <?= My\Helpers::render("/_commons/header.php"); 

    $db = new Database();
    $sql = "SELECT * FROM roles";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    

    ?>
    <h2>Llistat actual de rols</h2>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
            </tr>     
        </thead>
        <tbody>
        <?php 
            foreach($stmt as $row){?>
                <tr>
                    <td> <?php echo $row["id"]; ?> </td>
                    <td> <?php echo $row["nom"]; ?> </td>
                </tr>
             <?php }?>  
        </tbody>
    </table>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
