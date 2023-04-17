<?php
include('../app/config.php');
$titulo = $_GET['titulo'];
$descripcion = $_GET['descripcion'];
$imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

date_default_timezone_set("America/Caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("INSERT INTO tb_anuncios
                                (titulo, descripcion, imagen,fyh_creacion,estado) 
                           VALUES (:titulo,:descripcion,:imagen,:fyh_creacion,:estado)");
                           
$sentencia->bindParam('titulo',$titulo);
$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam('imagen',$imagen);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);



 if($sentencia->execute() ){
    echo 'registro satisfactorio';
    ?>
        <script>location.href = "../anuncios/index.php";</script>

    <?php
}else{
    echo "no se pudo registrar con la BD";
}
?>