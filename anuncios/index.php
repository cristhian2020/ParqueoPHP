<?php 
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../layout/admin/menu.php');?>
        <div class="content-wrapper">
            <br>
            <div class="container">
                <h2>Listado de Anuncios</h2>
                <br>
                <table class="table table-bordered table-sm ">
                    <th><center>Nro</center> </th>
                    <th><center>Titulo </center> </th>
                    <th><center>Descripcion</center> </th> 
                    <th><center>Imagen</center> </th>
                    <?php
                    $contador = 0;
                    $query_anuncio = $pdo->prepare("SELECT * FROM tb_anuncios WHERE estado = '1' ");
                    $query_anuncio->execute();
                    $anuncios = $query_anuncio->fetchAll(PDO::FETCH_ASSOC);

                    foreach($anuncios as $anuncio){
                        $id_anuncio = $anuncio['id_anuncio'];
                        $titulo = $anuncio['titulo'];
                        $descripcion = $anuncio['descripcion'];
                        $imagen = $anuncio['imagen'];
                        $contador = $contador + 1;
                    ?>
                    <tr>
                        <td> <center><?php echo $contador;?> </center> </td>
                        <td> <center><?php echo $titulo;?></center></td>
                        <td> <center><?php echo $descripcion;?> </center></td>
                        <td> <center><?php echo $imagen;?> </center></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php include('../layout/admin/footer.php');?>
    </div>
    <?php include('../layout/admin/footer_links.php');?>
</body>
</html>
