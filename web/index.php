<?php require_once __DIR__ . "/../../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="ca">
<?= My\Helpers::render("/_commons/head.php", ["subtitle" => "Sign in"]) ?>
<body>
    <header>
        <div class = "header_lefthead"><button>|||</button></div>
        <div ><h1><a href= <?php  My\Helpers::url("") ?> Projecte J-Suite</a></h1></div>
        <div class= "header_righthead"><button>SIGN IN</button></div>
        
    </header>
    <div class="cuerpo">
        <div id="flex12" class ="flexcontainer">
            <div id="flex1" class="flexcontainer__element">
                <p>provamos el flex</p>
                <p>provamos el flex</p>
                <p>provamos el flex</p><br>
            </div>
            <div id="flex2" class="flexcontainer__element">
                <p>provamos el flex</p>
                <p>provamos el flex</p>
                <p>provamos el flex</p><br>
            </div>
        </div>
        <div id="flex34" class ="flexcontainer">
            <div id="flex3" class="flexcontainer__element">
                <p>provamos el flex</p>
                <p>provamos el flex</p>
                <p>provamos el flex</p><br>
            </div>
            <div id="flex4" class="flexcontainer__element ">
                <p>provamos el flex</p>
                <p>provamos el flex</p>
                <p>provamos el flex</p><br>
            </div>
        </div>
    </div>
</div>

</body>
</html>
