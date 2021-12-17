<?php require_once __DIR__ . "/../../vendor/autoload.php"; 
use Rakit\Validation\Validator;
use My\Mail;


$validator = new Validator();

$exists = false;
$imagen = $_FILES['imagen1'];
    

// make it
$validation = $validator->make($_POST + $_FILES, [
    'name'                     => 'required|min:6',
    'cognom'                 => 'required',
    'correu'                 => 'required|correu',
    'contrasenya'            => 'required|min:8',
    'confirmar_contrasenya'  => 'required|same:contrasenya',
    'imagen1' => 'uploaded_file:png,gif,jpeg'


]);

$validation->validate();
    
    
    if($validation->fails())
    {
        $errors = $validation->errors();
        
        $url = My\Helpers::url("/user/register.php");
        My\Helpers::redirect($url);
        exit;
    }else
    {
        $connect = new My\Database(); 
        $stmt = $connect->prepare("select * from `2daw.equip06`.users");
        $stmt->execute();
        
        foreach ($stmt as $row)
        {
            //IF EXISTE correu
            if($row['correu']==$_POST['correu']){
                $exists = true;
                break;
           }
        }

        if ($exists == true)  
        {
            My\Helpers::flash("El correu ya existe");
            $url = My\Helpers::url("/user/register.php");
            My\Helpers::redirect($url);            
        }else
        {
            
            $status = 0;
            $username = $_POST['name'];
            $cognom = $_POST["cognom"];
            $correu = $_POST['correu'];
            $encript = hash('sha256', $_POST['contrasenya']);
            $ultimId = "null";
            
            if($imagen != ""){
                $sql = "insert into `2daw.equip06`.files(filepath,filesize,uploaded) VALUES ('{$imagen['name']}',{$imagen['size']},'2020-02-02 00:00:00')";
                $insert2 = $connect->prepare($sql);
                $insert2->execute(); 
                $ultimId = $connect->lastInsertId();  
            }

            $bytes = random_bytes(20);
            $token = bin2hex($bytes);

            $insert = $connect->prepare ("insert into `2daw.equip06`.users(username, password, correu,status,role_id,imagen_id,created, last_access) VALUES ('{$username}', '{$encript}', '{$correu}', {$status}, 1, {$ultimId}  , '2020-02-02 00:00:00','2021-02-02 00:00:00');");
            $insert->execute();
            
           
            
            //AÑADIMOS TOKEN
            $ultimId = $connect->lastInsertId();
            My\Helpers::log()->debug("Ultimo ID de usuario {$ultimId}");
            $dataActual = date("Y-m-d H:i:s");
            $tokenUsuari = "insert into `2daw.equip06`.user_tokens VALUES('{$ultimId}','{$token}', 'A', '{$dataActual}')";
            $tokenDatabase = $connect->prepare($tokenUsuari);
            $tokenDatabase->execute();
            
            //ENVIAMOS EL CORREO
            $url=My\Helpers::url("user/register_action2.php?token={$token}&id={$ultimId}");
            $link = "<a href='{$url}'>Link</a>";
            $sujeto = "Token User";
            $body = "<li>{$link}</li>";
            $isHtml = true;
            $to = ["2daw.equip06@fp.insjoaquimmir.cat"];
            $SendMail = new Mail($sujeto, $body, $isHtml);
            $send = $SendMail->send($to);

            My\Helpers::flash("Todo OKEY");
            My\Helpers::flash($send ? "Correu enviat" : "Error de correu");
            $url = My\Helpers::url("/");
            My\Helpers::redirect($url);
            
    }
}







    