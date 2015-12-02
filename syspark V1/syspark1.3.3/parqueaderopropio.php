<?php 
session_start();
//include('static/connect_mysql.php');
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

    <link rel="stylesheet" type="text/css" href="css/estilos.css">

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
                $sql='select * from parqueadero';
                $consulta=mysql_query($sql);
                while ($fila=mysql_fetch_array($consulta)) {    
            ?>

            var marcador = new google.maps.LatLng('<?php echo $fila["LatitudParqueadero"] ?>', '<?php echo $fila["LogitudParqueadero"] ?>');
            var marker = new google.maps.Marker({
                  position: marcador,
                  map: map,
                  title: 'Estacionamiento'
              });
              google.maps.event.addListener(marker, 'click', function(){
                    var popup = new google.maps.InfoWindow();
                    var note = '<?php echo $fila["NombreParqueadero"] ?>';
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
                              

    </header>
    

        <section id="demo">

        	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">

                    <?php if (isset($_SESSION['NombreAdmin'])){
                        echo $_SESSION['NombreAdmin']." ".$_SESSION['ApellidoAdmin'];
                    }  ?>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="fa fa-bars fa-lg"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="img/freeze/logo2.png" alt="" class="logo">
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
                            <li><a href="#" data-toggle="modal" <?php if (isset($_SESSION['CedulaAdmin'])){} else{}  ?> data-target=".bs-example-modal-sm">Iniciar Sesión</a>   
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

                    <div class="col-xs-12">

                     
                    <div class="col-sm-3 btn-group" data-toggle="buttons">
                        <img src="img/freeze/park.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                        
                        <div class="section-heading1">
                            <p>Parq. 1</p>
                        </div>
                    <label class="btn btn-info">
                        <input checked="checked" name="media_release" value="1" type="radio"> Libre
                    </label>
                    <label class="btn btn-info btn_red">
                        <input name="media_release" value="0" type="radio"> Ocupado
                    </label>
                    </div>

                    <div class="col-sm-3 btn-group" data-toggle="buttons">
                        <img src="img/freeze/park.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                        
                        <div class="section-heading1">
                            <p>Parq. 2</p>
                        </div>
                    <label class="btn btn-info">
                        <input checked="checked" name="media_release" value="1" type="radio"> Libre
                    </label>
                    <label class="btn btn-info btn_red">
                        <input name="media_release" value="0" type="radio"> Ocupado
                    </label>
                    </div>  

                     <div class="col-sm-3 btn-group" data-toggle="buttons">
                        <img src="img/freeze/park.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                        
                        <div class="section-heading1">
                            <p>Parq. 3</p>
                        </div>
                    <label class="btn btn-info">
                        <input checked="checked" name="media_release" value="1" type="radio"> Libre
                    </label>
                    <label class="btn btn-info btn_red">
                        <input name="media_release" value="0" type="radio"> Ocupado
                    </label>
                    </div>  

                    
                    <div class="col-sm-3 btn-group" data-toggle="buttons">
                        <div class="section-heading1">
                            <img src="img/freeze/park.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                       
                            <p>Parq. 4</p>
                        </div>
                    <label class="btn btn-info">
                        <input checked="checked" name="media_release" value="1" type="radio"> Libre
                    </label>
                    <label class="btn btn-info btn_red">
                        <input name="media_release" value="0" type="radio"> Ocupado
                    </label>
                    </div>  




                </div>




                </div>

                <hr>



                
                <div class="row">                 
                </div>


                <hr>
                

                

            </div>
        </section>










<!--

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


-->

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

</body>

</html>
