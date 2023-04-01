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
        
            <h2>Creacion de Nuevos Roles</h2>
            
            <br>
            <div class="container"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="border:1px solid #606060;">
                            <div class="card-header" style="background-color: #007bff; color:#ffff;">
                            <h3> Nuevo Rol </h3>
                            </div>
                            <div class="card-body">

                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" class="form-control" id="nombre">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" id="btn_guardar"> Guardar </button>
                                <a href="<?php echo $URL;?>/roles/"  class="btn btn-default">Cancelar</a>
                            </div>

                            <div id="respuesta">
                            </div>
                            
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-6"></div>
                </div>  
            </div>


    
        </div>
  </div>
  <?php include('../layout/admin/footer.php');?>
  <?php include('../layout/admin/footer_links.php');?>


</div>

</body>
</html>

<script>
    $('#btn_guardar').click(function () {
        var nombre = $('#nombre').val();
        if(nombre == ""){
            alert('Debe de llenar el campo nombre');
            $('#nombre').focus();
        }else{
            var url = 'controller_create.php';
            $.get(url,{nombre:nombre},function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>
