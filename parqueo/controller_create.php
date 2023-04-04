<?php
include('../app/config.php');

$nro_espacio = $_GET['nro_espacio'];
$estado_espacio = $_GET['estado_espacio'];
$obs = $_GET['obs'];

//echo $nro_espacio."-".$estado_espacio."-".$obs; 



date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("INSERT INTO tb_mapeos
        (nro_espacio,estado_espacio,obs,  fyh_creacion, estado) 
VALUES (:nro_espacio,:estado_espacio,:obs, :fyh_creacion,:estado)");

$sentencia->bindParam('nro_espacio',$nro_espacio);
$sentencia->bindParam('estado_espacio',$estado_espacio);
$sentencia->bindParam('obs',$obs);

$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);


if($sentencia->execute() ){
    echo 'registro satisfactorio';
    ?>
        <script>location.href = "create.php";</script>

    <?php
}else{
    ?>
    <script>
        alert('El espacio ya fue registrado');
        $('#nro_espacio').focus();
       
    </script>
    <?php
  //  echo "no se pudo registrar en la BD";
   // echo "El espacio ya fue registrado";
}
?>