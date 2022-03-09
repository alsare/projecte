<<<<<<< HEAD
<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
use My\Database;
?>
=======
<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
>>>>>>> origin/b1.1-bruno

<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Roles"]) ?>
<<<<<<< HEAD

<body>
    <?= My\Helpers::render("/_commons/header.php"); 

    $db = new Database();
    $sql = "SELECT * FROM roles";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    

    ?>
=======
<body>
    <?= My\Helpers::render("/_commons/header.php") ?>
>>>>>>> origin/b1.1-bruno
    <h2>Llistat actual de rols</h2>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
<<<<<<< HEAD
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
=======
            </tr>            
        </thead>
        <tbody>


>>>>>>> origin/b1.1-bruno
        </tbody>
    </table>
    <?= My\Helpers::render("/_commons/footer.php") ?>
</body>
</html>
