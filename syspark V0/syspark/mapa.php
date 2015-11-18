<?php 
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css">

    <link rel="stylesheet" href="css/freeze.css">


    <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script >
        /*para cambiar el tamaño al mapa debe ser en style.css*/
            function initialize() {
          var myLatlng = new google.maps.LatLng(-3.997328, -79.20586);
          var mapOptions = {
            zoom: 13,
            center: myLatlng
          }
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);         
            <?php 
                $sql='select * from mapas';
                $consulta=mysql_query($sql);
                while ($fila=mysql_fetch_array($consulta)) {    
            ?>

            var marcador = new google.maps.LatLng('<?php echo $fila["latitud"] ?>', '<?php echo $fila["longitud"] ?>');
            var marker = new google.maps.Marker({
                  position: marcador,
                  map: map,
                  title: 'Estacionamiento'
              });
              google.maps.event.addListener(marker, 'click', function(){
                    var popup = new google.maps.InfoWindow();
                    var note = '<?php echo $fila["descripcion"] ?>';
                    popup.setContent(note);
                    popup.open(map, this);
              })
        
            <?php } ?>
     
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
        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="fa fa-bars fa-lg"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="img/freeze/logo1.png" alt="" class="logo">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            <!--<li><a href="#about">about</a>
                            </li>
                            <li><a href="#features">features</a>
                            </li>
                            <li><a href="#reviews">reviews</a> -->
                            </li>
                            <li><a href="#demo">Parqueaderos</a>   
                            </li>
                            <li><a href="#">Iniciar Sesión</a>
                            </li>
                            <li><a class="getApp" href="#getApp">Obtener Aplicación</a>
                            </li>
                            <li><a href="#">Información</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-->
        </nav>
        <br>    
        <br>    
        <br> 
        <br>    
        <br>    
           


    </header>
    

        <section id="demo">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Parqueaderos</h1>
                    <div class="divider"></div>
                    <p>Aca encontraras todos los parqueaderos de la ciudad de Loja</p>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 scrollpoint sp-effect2">
                        <div class="video-container" >
                            <!--<iframe src="http://player.vimeo.com/video/70984663"></iframe>   -->
                            <section id="map-canvas"></section>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <footer>
            <div class="container">
                <a href="#" class="scrollpoint sp-effect3">
                    <img src="img/freeze/logo.png" alt="" class="logo">
                </a>
                <div class="social">
                    <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-twitter fa-lg"></i></a>
                    <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-google-plus fa-lg"></i></a>
                    <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-facebook fa-lg"></i></a>
                </div>
                <div class="rights">
                    <p>Copyright &copy; 2014</p>
                    <p>Template by <a href="http://www.scoopthemes.com" target="_blank">ScoopThemes</a></p>
                </div>
            </div>
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

</body>

</html>
