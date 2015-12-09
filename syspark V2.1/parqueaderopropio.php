<?php 
session_start();
if (isset($_SESSION['CedulaAdmin'])) {
    include('connect_mysql.php');
    
    $consulta="select * from parqueadero where CedulaAdmin=".$_SESSION['CedulaAdmin'];
    $resultado=$conexion->query($consulta);
    while ($fila=$resultado->fetchArray()) {
        $_SESSION["IdParqueadero"] = $fila['IdParqueadero'];
    }   
    

 ?>

<!doctype html>

<html lang="es" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>SYSPARK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="css/freeze.css">

    <link rel="stylesheet" type="text/css" href="css/estilos.css">

    <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>

    
    
</head>

<body onload="viewdata()">

    <div class="pre-loader">
        <div class="load-con">
            <img src="img/freeze/logo1.png" class="animated fadeInDown" alt="">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <header> 
                              

    </header>
    

        <section id="demo">

        	 <?php if (isset($_SESSION['CedulaAdmin'])){
            include('static/menuLog.php');
        } else{
            include('static/menu.php');            
        }  
        ?>


            <!-- Small modal -->
            

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <center><h3>Login</h3>
                  <hr>
                    <form role="form" method="POST" action="return false" onsubmit="return false">
                                    <div class="form-group">
                                        <div id="resultado"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="CedulaAdmin" id="CedulaAdmin" value="" placeholder="Ingrese su Cédula">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="ClaveAdmin" id="ClaveAdmin" value=""  placeholder="Ingrese la Clave">
                                    </div>                                    
                                    <button onclick="Validar(document.getElementById('CedulaAdmin').value, document.getElementById('ClaveAdmin').value);" class="btn btn-primary btn-lg">Enviar</button>
                    </form>
                    <hr>
                    <h5>Si no tienes la clave <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Registrate</button></h5>
                    </center>

                    
                </div>
              </div>
            </div>

                    <!-- Large modal -->
       
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <center><h3>Ingresa tus datos y registrate...</h3>
                    <form role="form-horizontal" method="POST" action="return false" onsubmit="return false">
                        <div class="form-group">
                            <div id="resp"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Cedula</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="CedulaA" id="CedulaA" required />                                
                            </div>
                        </div>
                        .
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NombreAdmin" id="NombreAdmin" value="" required />
                            </div>
                        </div>
                        .
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ApellidoAdmin" id="ApellidoAdmin" value="" required />
                            </div>
                        </div>
                        .
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"  name="CorreoAdmin" id="CorreoAdmin" value="" required />
                            </div>
                        </div>
                        .
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="TelefonoAdmin" id="TelefonoAdmin" value="" required />
                            </div>
                        </div>
                        .
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Clave</label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" name="ClaveA" id="ClaveA" value="" required />
                            </div>
                        </div>
                        . 
                        <div class="form-group">
                        </div>

                        <button type='submit' onclick="registrar(document.getElementById('CedulaA').value, 
                                                    document.getElementById('NombreAdmin').value, 
                                                    document.getElementById('ApellidoAdmin').value, 
                                                    document.getElementById('CorreoAdmin').value,
                                                    document.getElementById('TelefonoAdmin').value, 
                                                    document.getElementById('ClaveA').value);" class="btn btn-primary btn-lg">Registrarse</button>
                    </form>
                    <hr>                   
                    </center>
                                                                           
            </div>
          </div>
        </div>


        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id='puesto'>
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <center><h3>Añadir Puesto</h3>
                        <div class="form-group">
                            <div id="rp"></div>
                        </div>
                    <form role="form-horizontal" method="POST" action="return false" onsubmit="return false">
                        <div class="form-group">
                            <input type = "radio" name = "puesto"  id = "simple" value = "simple" />
                            <label for = "simple">Simple</label>
                            <input type = "radio" name = "puesto"  id = "cubierto" value = "cubierto" />
                            <label for = "cubierto">Cubierto</label>
                        </div>               
                        <button type="button" id="save" class="btn btn-primary">Guardar</button>
                        
                    </form>
                    <hr>                   
                </center>
                                                                           
            </div>
          </div>
        </div>


	
	<section id="getApp">
            <div class="container-fluid">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <div class="tp-caption large_white_light sft" data-x="center" data-y="250" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1400" data-easing="Power4.easeOut">
                        Panel de Administrador <!--<i class="fa fa-heart"></i>-->
                        </div>
                        <div class="divider"></div>
                         <h1>Parqueadero Bolivar</h1>
                        <p>Seguridad, Confianza y Amabilidad </p>

                        <div class="section-heading1">
                        	<p>Parqueaderos</p>
                        </div>

                         <hr>   

                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#puesto">Agregar</button>
                                               

                        <!-- GENERACION DE  LOS PUESTOS  -->
                        

                        <div id="info"></div>                        
                        <br/>
                        <div id="viewdata" ></div>


                        <!--  -->

                       
                           </div>

                </div>

                <hr>
               


                <hr>
                

                

            </div>
        </section>

        <div class="modal fade logout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <center><h3>Cerrando Sesion...</h3>
                     
                    </center>
                                                                           
            </div>
          </div>
        </div>
        <hr>


        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id='respuesta'>
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <center><h3>Estado</h3>
                    <div class="r"></div>
                </center>
                                                                           
            </div>
          </div>
        </div>



    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/placeholdem.min.js"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            appMaster.preLoader();
        });
    </script>

    <script>
        function Validar(CedulaAdmin, ClaveAdmin)
        {
            $.ajax({
                url: "static/validar.php",
                type: "POST",
                data: "CedulaAdmin="+CedulaAdmin+"&ClaveAdmin="+ClaveAdmin,
                success: function(resp){
                    $('#resultado').html(resp)
                }        
            });
        }

         function registrar(CedulaAdmin, NombreAdmin, ApellidoAdmin, CorreoAdmin, TelefonoAdmin, ClaveAdmin)
                    {
                        $.ajax({
                            url: "static/registrar.php",
                            type: "POST",
                            data: "CedulaA="+CedulaAdmin+"&NombreAdmin="+NombreAdmin+
                                  "&ApellidoAdmin="+ApellidoAdmin+"&CorreoAdmin="+CorreoAdmin+
                                  "&TelefonoAdmin="+TelefonoAdmin+"&ClaveA="+ClaveAdmin,
                            success: function(resp){
                                $('#resp').html(resp)
                            }        
                        });
                    }
        </script>

        <script>
        function viewdata(){
           $.ajax({
           type: "GET",
           url: "puesto.php"
          }).done(function( data ) {
          $('#viewdata').html(data);
          });
        }


        $('#save').click(function(){
            var puesto=$('input:radio[name=puesto]:checked').val();         
            var datas = 'puesto='+puesto;
            $.ajax({
               type: "POST",
               url: "newPuesto.php",
               data: datas
            }).done(function( data ) {
              $('#info').html(data);
              viewdata();
            });
        });


        function update(str){

        var id = str;
        var es = $('input:radio[name=puesto'+str+']:checked').val();
        var idLabel = "#"+es.substring(0,2)+id;
        $('#li'+id).removeClass('active');
        $('#oc'+id).removeClass('active');
        $(idLabel).addClass("active");
       
     
        console.log(es);
        
        var datas ='estado='+es;
          
        $.ajax({
           type: "POST",
           url: "updatePuesto.php?id="+id,
           data: datas
        }).done(function( data ) {
          $('#info').html(data);
          viewdata();
        });
        }


        function deleteP(str){
        
        var IdUbicacion = str;
          
        $.ajax({
           type: "GET",
           url: "deletePuesto.php?IdUbicacion="+IdUbicacion
        }).done(function( data ) {
          $('#info').html(data);
          viewdata();
        });
        }
    </script>

</body>

</html>
<?php }else{
    echo '<script>location.href = "index.php";</script>';
} ?>