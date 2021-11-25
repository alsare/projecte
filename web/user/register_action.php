<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
use Rakit\Validation\Validator;

$validator = new Validator();


// make it
$validation = $validator->validate($_POST + $_FILES, [
    'name'                  => 'required',
    'cognom'                 => 'required',
    'correu'                 => 'required',
    'contrasenya'            => 'required|min:8',
    'confirmar_contrasenya'  => 'required|same:contrasenya'
]);
$name = $_POST["name"];
$cognom = $_POST["cognom"];
$correu = $_POST["correu"];
$contrasenya = $_POST["contrasenya"];
$confirmar_contrasenya = $_POST["confirmar_contrasenya"];


if ($validation->fails()) {
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "</pre>";
    exit;
} else {
    echo "Success!";
}
$back = My\Helpers::url("/user/register.php");
My\MyHelpers::redirect($back);

//if ($validation -> fails()){
//$back = My\Helpers::flash("/user/register.php");
//My\MyHelpers::redirect($back);
//} else {
//    $db = new My\Database();
//    $goin = $db->prepare("SELECT * FROM `users` where `name` != '$name'");
//    $goin -> execute();
//    foreach($goin as $row){
//        if($row["correu"] == $correu){
//            $back = My\Helpers::flash("/user/ediciousuari.php");
//            My\Helpers::redirect($back);
//        }
//    }
//    
//}


