<?php 
session_start();
include('connect_mysql.php');
?>

<!doctype html>
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
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

    <link rel="stylesheet" href="css/freeze.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   
   <script >
        /*para cambiar el tamaÃ±o al mapa debe ser en style.css*/
        function initialize() {
            <?php 
                $consulta="select * from parqueadero where IdParqueadero=".$_GET['IdParqueadero'];
                $resultado=$conexion->query($consulta);
                while ($fila=$resultado->fetch_assoc()) {
                if ($fila["LatitudParqueadero"] != null or $fila["LatitudParqueadero"] != '') {;    
            ?>

          var myLatlng = new google.maps.LatLng('<?php echo $fila["LatitudParqueadero"] ?>', '<?php echo $fila["LogitudParqueadero"] ?>');
          var mapOptions = {
            zoom: 18,
            center: myLatlng
          }
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);         
            

            var marcador = new google.maps.LatLng('<?php echo $fila["LatitudParqueadero"] ?>', '<?php echo $fila["LogitudParqueadero"] ?>');
            var marker = new google.maps.Marker({
                  position: marcador,
                  map: map,
                  title: 'Estacionamiento'
              });
              google.maps.event.addListener(marker, 'click', function(){                   
                    popup = new google.maps.InfoWindow();
                    var note = '<?php echo "<h6>".$fila["NombreParqueadero"]."</h6>";
                                      echo "Costo Puesto con Cubierta: ".$fila["CubiertoParqueadero"]." por hora<br>";
                                      echo "Costo Puesto sin Cubierta: ".$fila["SimpleParqueadero"]." por hora<br>";
                                      echo "Mas informacion: click <a href=\'parqueaderos.php?IdParqueadero=".$fila["IdParqueadero"]."\'>AQUI!</a>"
                        
                     ?>';
                     
                    popup.setContent(note);
                    popup.open(map, this);
              })
        
            <?php } }?>
     
            }
            google.maps.event.addDomListener(window, 'load', initialize);
    </script>


    
</head>

<body>

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
    <?php if (isset($_SESSION['CedulaAdmin'])){
        include('static/menuLog.php');
    } else{
        include('static/menu.php');            
    }  
    ?>                   

    </header>
    

        <section id="demo">

        	

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
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nombre" name="NombreAdmin" id="NombreAdmin" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder=" Apellido" name="ApellidoAdmin" id="ApellidoAdmin" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Correo" name="CorreoAdmin" id="CorreoAdmin" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Telefono" name="TelefonoAdmin" id="TelefonoAdmin" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Clave" name="ClaveA" id="ClaveA" value="" required />
                        </div>                                    
                        <button type='submit'onclick="registrar(document.getElementById('CedulaA').value, 
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


	
	<section id="getApp">
            <div class="container-fluid">
                <?php  $consulta="select * from parqueadero where IdParqueadero=".$_GET['IdParqueadero'].";";
                    $resultado=$conexion->query($consulta);
                    while ($fila=$resultado->fetch_assoc()) {   
                ?>
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <h1>Parqueadero <?php echo $fila['NombreParqueadero'] ?></h1>
                    <div class="divider"></div>
                    <h2><?php echo $fila['DireccionParqueadero'] ?></h2>
                    <p>Seguridad, Confianza y Amabilidad </p>

                    <div class="section-heading1">
                    	<p>Permite estacionar hasta todo el dia, pre pagando USD <?php echo $fila['SimpleParqueadero'] ?> 
                            por una puesto Simple y USD <?php echo $fila['CubiertoParqueadero'] ?> por un puesto con Cubierta. por cada hora o fracción, en cualquiera de sus plazas disponibles en nuestra ciudad.</p>
                    </div>	
                </div>
                
                <div class="row">

                <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <p>Información</p>
                    	<div class="divider"></div>
                    		<p>Dias: Lunes a Viernes </p>
                    		<p>Horario. 08h00 a 18h00 </p>
                            <p>Tarifa por hora</p>
                            <p>Con Cubierta: <?php echo $fila['CubiertoParqueadero'] ?> </p>
                            <p>Simple: <?php echo $fila['SimpleParqueadero'] ?></p>                    		
                    		<p>Tel: <?php echo $fila['TelefonoParqueadero'] ?></p>
                    		
                </div>
				</div>


				<div class="col-md-4 col-sm-4 col-xs-6">
                <div class="section-heading inverse scrollpoint sp-effect3">
                	<p>Mapa</p> 
                    	<div class="divider"></div>                    	                   		
                    		<div id="map-canvas"></div>
                		</div>
				</div>


				<div class="col-md-4 col-sm-4 col-xs-6">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <p>Foto</p>
                    	<div class="divider"></div>                 
                    		<img src="img/freeze/parqueadero.jpg" alt="">
                		</div>
				</div>                
                </div>

                <?php } ?>

                

                

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


        <footer>
           <?php include('static/footer.php') ?>
        </footer>

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

    <script src='js/controladores.js'></script>

</body>

</html>
