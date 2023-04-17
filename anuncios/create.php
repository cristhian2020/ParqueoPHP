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
        
            <h2>Colocar un Anuncio</h2>
            
            <br>
            <div class="container"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="border:1px solid #606060;">
                            <div class="card-header" style="background-color: #007bff; color:#ffff;">
                            <h3> Nuevo Anuncio </h3>
                            </div>
                            <div class="card-body">

                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" class="form-control" id="titulo">
                            </div>

                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion">
                            </div>

                    
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" class="form-control" id="imagen">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" id="btn_publicar"> Guardar </button>
                                <a href="<?php echo $URL;?>/anuncios/"  class="btn btn-default">Cancelar</a>
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
    $('#btn_publicar').click(function(){
        var titulo = $ ('#titulo').val();
        var descripcion = $ ('#descripcion').val();
        var imagen = $ ('#imagen').val();


      if (titulo =="") {
              alert ('Debe llenar el campo titulo');
              $('#titulo').focus();
      }else if (descripcion ==""){
              alert ('Debe llenar el campo descripcion');
              $('#descripcion').focus();
      }else if (imagen ==""){
              alert ('Debe subir una imagen');
              $('#imagen').focus();
      }
      else{
              var url = 'controller_create.php';
              $.get(url , {titulo:titulo , descripcion:descripcion , imagen:imagen}, function(datos){
                    $('#respuesta').html(datos);
        });
      }
    });
</script>