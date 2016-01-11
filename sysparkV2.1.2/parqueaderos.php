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

        	


	
	<section id="getApp">
        <br>
        <br>
        <br>
        <div class="container-fluid" id='' >
            <?php  $consulta="select * from parqueadero where IdParqueadero=".$_GET['IdParqueadero'].";";
            $resultado=$conexion->query($consulta);
            while ($fila=$resultado->fetch_assoc()) {   
                ?>
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <h1><?php echo $fila['NombreParqueadero'] ?></h1>
                    <div class="divider"></div>
                    <h2><?php echo $fila['DireccionParqueadero'] ?></h2>
                    <p>Seguridad, Confianza y Amabilidad </p>

                    <div class="section-heading1">
                        <p class='col-md-8 col-md-offset-2'>Permite estacionar hasta todo el dia, pre pagando USD <?php echo $fila['SimpleParqueadero'] ?> 
                            por una puesto Simple y USD <?php echo $fila['CubiertoParqueadero'] ?> por un puesto con Cubierta. por cada hora o fracción, en cualquiera de sus plazas disponibles en nuestra ciudad.</p>
                        </div>	
                    </div>


                <div class="row">
                    <div class="col-xs-6 col-md-4">
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


                    <div class="col-xs-6 col-md-4 ">
                        <div class="section-heading inverse scrollpoint sp-effect3">
                            <p>Mapa</p> 
                            <div class="divider"></div>                    	                   		
                            <div id="map-canvas"></div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-4">
                        <div class="section-heading inverse scrollpoint sp-effect3">
                            <p>Foto</p>
                            <div class="divider"></div>                 
                            <img class='img-responsive'src="<?php echo $fila['imagen']; ?>" alt="" height='300px'>
                        </div>
                    </div>                


                </div>
                    <?php } ?>
                </section>
                <?php include('modals.php'); ?>

                <footer>
                    <?php include('static/footer.php') ?>
                </footer>

            </div>
    </section>
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
