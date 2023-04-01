<?php 
include('app/config.php');
include('layout/admin/datos_usuario_sesion.php');



    //echo "existe sesion";
    ?>
    
<!DOCTYPE html>

<html lang="es">
<head>
        <?php include('layout/admin/head.php');?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('layout/admin/menu.php');?>
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Bienvenido al SISTEMA DE PARQUEO - SISPARK</h2>
            <br>
    <div class="row">
                <div class="col-md-12">

                
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Mapeo actual del parqueo</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display:block;">
               <div class="row">
                <?php
                 $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
                 $query_mapeos->execute();
                 $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                 foreach($mapeos as $mapeo){
                     $id_map = $mapeo['id_map'];
                     $nro_espacio = $mapeo['nro_espacio'];
                     $estado_espacio = $mapeo['estado_espacio'];
                     if($estado_espacio == "LIBRE"){  ?>
                     <div class="col">
                    <center>
                        <h2><?php echo $nro_espacio; ?></h2>
                        <button class="btn btn-success" style="width: 100%;height: 114px"
                            data-toggle="modal" data-target="#modal<?php echo $id_map;?>">
                        <p><?php echo $estado_espacio;?></p>
                    </button>

                     <!-- Modal -->
                     <div class="modal fade" id="modal<?php echo $id_map;?>" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">INGRESO DEL VEHICULO</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             <div class="modal-body">
                                <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-2 col-form-label">Placa:</label>
                                   <div class="col-sm-7">
                                  <input type="text" style="text-transform: uppercase;" class="form-control" id="placa_buscar<?php echo $id_map;?>">
                                 </div>
                                 <div class="col-sm-3">
                                  <BUtton class="btn btn-primary" id="btn_buscar_cliente<?php echo $id_map;?>" type="button">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                                  Buscar
                                  </BUtton>
                                  <script>
                                    $('#btn_buscar_cliente<?php echo $id_map;?>').click(function(){
                                       var placa = $('#placa_buscar<?php echo $id_map;?>').val();
                                        if (placa =="") {
                                       alert ('Debe llenar el campo placa');
                                       $('#placa_buscar<?php echo $id_map;?>').focus();
                                        }else{
                                             var url = 'clientes/controller_buscar_cliente.php';
                                          $.get(url , {placa:placa}, function(datos){
                                            $('#respuesta_buscar_cliente<?php echo $id_map;?>').html(datos);
                                           });
                                         }
                                    });

                                  </script>
                                   

                                 </div>
                               </div>
                               <div id="respuesta_buscar_cliente<?php echo $id_map;?>">
                                
                            </div>
                              
                               <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-4 col-form-label">Fecha de Ingreso:</label>
                                   <div class="col-sm-8">
                                    <?php
                                    date_default_timezone_set("America/Caracas");
                                    $fechaHora = date("Y-m-d h:i:s");
                                    $dia =date('d');
                                    $mes =date('m');
                                    $ano =date('Y');

                                    ?>
                                  <input type="date" class="form-control" id="fecha_ingreso<?php echo $id_map;?>" value="<?php echo $ano."-".$mes."-".$dia;?>">
                                 </div>
                               </div>
                               <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-4 col-form-label">Hora de Ingreso:</label>
                                   <div class="col-sm-8">
                                   <?php
                                    date_default_timezone_set("America/Caracas");
                                    $fechaHora = date("Y-m-d h:i:s");
                                    $hora =date('H');
                                    $minutos =date('i');
                                   

                                    ?>
                                  <input type="time" class="form-control" id="hora_ingreso<?php echo $id_map;?>"  value="<?php echo $hora.":".$minutos; ?>">
                                 </div>
                               </div>

                               <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-4 col-form-label">Cuviculo:</label>
                                   <div class="col-sm-8">
                                  
                                  <input type="text" class="form-control" id="cuviculo<?php echo $id_map;?>" value="<?php echo $nro_espacio ?>">
                                 </div>
                               </div>
                              
                              </div>
                              <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                           <button type="button" class="btn btn-primary" id="btn_registrar_ticket<?php echo $id_map;?>">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                               <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                           <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                          </svg> 
                            Imprimir Tiket

                           </button>
                           
                           <script>
                             $('#btn_registrar_ticket<?php echo $id_map;?>').click(function () {
                              var placa = $('#placa_buscar<?php echo $id_map;?>').val();
                              var nombre_cliente = $('#nombre_cliente<?php echo $id_map;?>').val();
                              var nit_ci = $('#nit_ci<?php echo $id_map;?>').val();
                              var fecha_ingreso = $('#fecha_ingreso<?php echo $id_map;?>').val();
                              var hora_ingreso = $('#hora_ingreso<?php echo $id_map;?>').val();
                              var cuviculo = $('#cuviculo<?php echo $id_map;?>').val();




                             });

                           </script>
                           </div>
                           </div>
                        </div>
                        </div>
                    </center>
                   
                    </div>

                     <?php

                     }
                     if($estado_espacio == "OCUPADO"){  ?>
                        <div class="col">
                    <center>
                        <h2><?php echo $nro_espacio; ?></h2>
                        <button class="btn btn-warning">
                            <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="60px" alt="">
                        </button>
                        <p><?php echo $estado_espacio; ?></p>

                    </center>
                   
                    </div>
   
                        <?php
   
                        }

                     
                    ?>
                     
                    <?php
                 }
                ?>
               
                

               </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          





  
                </div>
</div>
            <hr>
        </div>
    </div>
    <?php include('layout/admin/footer.php');?>
</div>
<?php include('layout/admin/footer_links.php');?>

</body>
</html>







   

  


