<?php 

include('../app/config.php');
session_start();
/*
 $usuario_user = $_POST['usuario'];
 $password_user = $_POST['password_user'];

*/
// Validar los datos ingresados por el usuario
$usuario_user = filter_var($_POST['usuario'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password_user = filter_var($_POST['password_user'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

 //echo $usuario." - ".$password_user;

$email_tabla = '';
$password_tabla ='';
/*
$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1 ' ");
$query_login->execute();
*/
// Utilizar los datos validados en la consulta a la base de datos
$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = ? AND password_user = ? AND estado = '1'");
$query_login->execute([$usuario_user, $password_user]);
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);

foreach($usuarios as $usuario){
     $email_tabla = $usuario['email'];
     $password_tabla = $usuario ['password_user'];
}
 if($usuario_user == $email_tabla && ($password_user == $password_tabla)){
    ?>
        <div class="alert alert-success" role="alert">
            usuario correcto
        </div>
        <script>location.href = "principal.php";</script>
        <?php
        $_SESSION['usuario_sesion']= $email_tabla;
        
    }else{
    ?>
        <div class="alert alert-danger" role="alert">
            Verifique que el Usuario y Contraceña sean los correctos
        </div>
        <script>$('#password').val("");$('#password').focus();</script>

    <?php
    }
