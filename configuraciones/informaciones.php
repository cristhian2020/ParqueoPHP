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
    
      <h2>Informaciones</h2>
    
      <br>
      <a href="create_informaciones.php" class="btn btn-primary">Registrar Nuevo</a><br>
        <br>
        <br>
      <table id="table_id" class="table table-bordered table-sm table-striped">
           
      <thead>
                <th><center>Nro</center></th>
                <th>Nombre del parqueo</th>
                <th>Actividad de la Empresa</th>
                <th>Sucursal</th>
                <th>Dirección</th>
                <th>Zona</th>
                <th>Teléfono</th>
                <th>Departamento o ciudad</th>
                <th>País</th>
                <th><center>Acción</center></th>
                </thead>
          <?php
                $contador = 0;
                $query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
                $query_informacions->execute();
                $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
                foreach($informacions as $informacion){
                    $id_informacion = $informacion['id_informacion'];
                    $nombre_parqueo = $informacion['nombre_parqueo'];
                    $actividad_empresa = $informacion['actividad_empresa'];
                    $sucursal = $informacion['sucursal'];
                    $direccion = $informacion['direccion'];
                    $zona = $informacion['zona'];
                    $telefono = $informacion['telefono'];
                    $departamento_ciudad = $informacion['departamento_ciudad'];
                    $pais = $informacion['pais'];
                    $contador = $contador + 1;
                    ?>
                    <tr>
                    <td><center><?php echo $contador;?></center></td>
                        <td><?php echo $nombre_parqueo;?></td>
                        <td><?php echo $actividad_empresa;?></td>
                        <td><?php echo $sucursal;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $zona;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $departamento_ciudad;?></td>
                        <td><?php echo $pais;?></td>
                        <td>
                        <center>
                                <a href="update_configuraciones.php?id=<?php echo $id_informacion; ?>" class="btn btn-success">Editar</a>
                                <a href="delete_configuraciones.php?id=<?php echo $id_informacion; ?>" class="btn btn-danger">Borrar</a>
                            </center>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>


        </div>

    </div>
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_links.php'); ?>
</body>
</html>



                        