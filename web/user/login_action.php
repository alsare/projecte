<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
use Rakit\Validation\Validator;

$validator = new Validator;

// make it
$validation = $validator->validate($_POST + $_FILES, [
    'username'                  => 'required|min:6',
    'password'                 => 'required|min:8'
]);



if ($validation->fails()) {
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "</pre>";
    exit;
} else {
    echo "Success!";
    
}
$back = My\Helpers::url("/user/login.php");
My\MyHelpers::redirect($back);