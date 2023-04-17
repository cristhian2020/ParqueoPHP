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
    
      <h2>Listado de Solicitudes</h2>
    
      <br>
      <table class="table table-bordered table-sm ">
           

          <th><center>Nro</center> </th>
          <th><center>Nombre </center> </th>
          <th><center>Email</center> </th> 
          <th><center>Descripcion</center> </th>
      <?php
          $contador = 0;
          $query_solicitud = $pdo->prepare("SELECT * FROM tb_solicitudes WHERE estado = '1 ' ");
          $query_solicitud->execute();
          $solicitudes = $query_solicitud->fetchAll(PDO::FETCH_ASSOC);
          
            foreach($solicitudes as $solicitud){
               $id_solicitud = $solicitud['id_solicitud'];
               $nombres = $solicitud['nombres'];
               $email = $solicitud['email'];
               $descripcion = $solicitud['descripcion'];
               $contador = $contador + 1;
              
       ?>
              <tr>
              <td> <center><?php echo $contador;?> </center> </td>
              <td> <center><?php echo $nombres;?></center></td>
              <td> <center><?php echo $email;?> </center></td>
              <td> <center><?php echo $descripcion;?> </center></td>
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