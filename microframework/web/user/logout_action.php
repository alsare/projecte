<?php
setcookie("session_token", "", time() - 3600);
$back = My\Helpers::url("/index.php");
My\Helpers::redirect($back);
?>