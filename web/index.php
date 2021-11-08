<!DOCTYPE html>
<html lang="ca">
<?php
   My\Helpers::log()->info("Entro a la pàgina d'inici");
   My\Helpers::log()->debug("Entro a una pàgina", ["page" => basename(__FILE__)]);
?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="_commons/css/styles.css" media="screen" />
   <title>Projecte J-Suite</title>
</head>
<body class = "fondo">
   <header>
       <h1><a href= <?=$_SERVER['PHP_SELF']?>>Projecte J-Suite</a></h1>
   </header>
   <h2>Homepage</h2>
   <p>My first PHP web app works!</p>
   <ul>
       <li>Operative system: <?= PHP_OS ?></li>
       <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
       <li>PHP version: <?= phpversion() ?></li>
       <li>IP address: <?= getHostByName(getHostName()) ?></li>
   </ul>
   <footer>
       <p class = "boton">Curs 2021-22 de 2DAW</p>
   </footer>
</body>
</html>
