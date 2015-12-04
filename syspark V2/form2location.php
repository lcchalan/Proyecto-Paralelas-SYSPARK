<?php 
session_start();
if (isset($_SESSION['CedulaAdmin'])) {
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
    <link rel="stylesheet" href="style.css">


      
    

    <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   
    <script >

    var map = null;
    var infoWindow = null;
 
    function openInfoWindow(marker) {
        var markerLatLng = marker.getPosition();
        var note = (markerLatLng.lat()+' '+markerLatLng.lng());        
        document.getElementById('latitudG').value = markerLatLng.lat();
        document.getElementById('longitudG').value = markerLatLng.lng();
        infoWindow.setContent(note);
        infoWindow.open(map, marker);
    }
     
    function initialize() {
            <?php  
                $consulta="select * from parqueadero where CedulaAdmin=".$_SESSION['CedulaAdmin'].';';
                $resultado=$conexion->query($consulta);
                while ($fila=$resultado->fetchArray()) {    
            ?>
          var latitud;
          var longitud;
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              latitud = '<?php if ($fila["LatitudParqueadero"]==null) { ?>'+position.coords.latitude+
                                '<?php }else{
                                    echo $fila["LatitudParqueadero"];
                                }  ?> ';


              longitud = '<?php if ($fila["LogitudParqueadero"]==null) { ?>'+position.coords.longitude+
                                '<?php }else{
                                    echo $fila["LogitudParqueadero"];
                                }  ?> ';
           
            latitud = Number(latitud) ;
            longitud = Number(longitud) ;

              var myLatlng = new google.maps.LatLng(latitud,longitud);
              var mapOptions = {
                zoom: 13,
                center: myLatlng
              }
                
             
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
             
                infoWindow = new google.maps.InfoWindow();
             
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    draggable: true,
                    map: map,
                    title:'Coordenadas',
                });
             
                google.maps.event.addListener(marker, 'dragend', function(){
                    openInfoWindow(marker);
                });
              });
            }

            <?php } ?> 

    }
     
    $(document).ready(function() {
        initialize();
    });
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
    
        
        <!--RevSlider-->
        <div class="tp-banner-container">            
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl fadeout hidden-xs"
                            data-x="left"
                            data-y="bottom"
                            data-hoffset="30"
                            data-voffset="0"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="img/freeze/Slides/hand-freeze.png" alt="">
                        </div>

                        <div class="tp-caption lfl fadeout visible-xs"
                            data-x="left"
                            data-y="center"
                            data-hoffset="700"
                            data-voffset="0"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="img/freeze/iphone-freeze.png" alt="">
                        </div>

                        <div class="tp-caption large_white_bold sft" data-x="550" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                            Syspark
                        </div>
                        <div class="tp-caption large_white_light sfr" data-x="770" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                            App
                        </div>
                        <div class="tp-caption large_white_light sfb" data-x="550" data-y="center" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                            Parqueadero Loja
                        </div>

                        <div class="tp-caption sfb hidden-xs" data-x="550" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                            <a href="#about" class="btn btn-primary inverse btn-lg">APRENDER MAS</a>
                        </div>
                        <div class="tp-caption sfr hidden-xs" data-x="730" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1500" data-start="1900" data-easing="Power4.easeOut">
                            <a href="#getApp" class="btn btn-default btn-lg">OBTENER APLICACIONES</a>
                        </div>

                    </li>
                    <!-- SLIDE 2 -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfb fadeout hidden-xs"
                            data-x="center"
                            data-y="bottom"
                            data-hoffset="0"
                            data-voffset="0"
                            data-speed="1000"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="img/freeze/Slides/freeze-slide20.png" alt="">
                        </div>

                        
                        <div class="tp-caption large_white_light sft" data-x="center" data-y="250" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1400" data-easing="Power4.easeOut">
                            Somos parte de ti <!--<i class="fa fa-heart"></i>-->
                        </div>
                        
                        
                    </li>

                    <!-- SLIDE 3 -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption customin customout hidden-xs"
                            data-x="right"
                            data-y="center"
                            data-hoffset="0"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-voffset="50"
                            data-speed="1000"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="img/freeze/Slides/parking.jpg" alt="">
                        </div>

                        <div class="tp-caption customin customout visible-xs"
                            data-x="center"
                            data-y="center"
                            data-hoffset="0"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-voffset="0"
                            data-speed="1000"
                            data-start="700"
                            data-easing="Power4.easeOut">
                                <!--img src="img/freeze/Slides/family-freeze.png" alt="">-->
                        </div>

                        <div class="tp-caption lfb visible-xs" data-x="center" data-y="center" data-hoffset="0" data-voffset="400" data-speed="1000" data-start="1200" data-easing="Power4.easeOut">
                            <a href="#" class="btn btn-primary inverse btn-lg">Purchase</a>
                        </div>

                        
                        <div class="tp-caption mediumlarge_light_white sfl hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="-50" data-speed="1000" data-start="1000" data-easing="Power4.easeOut">
                           Sistema de Parqueadero
                        </div>
                        <div class="tp-caption mediumlarge_light_white sft hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1200" data-easing="Power4.easeOut">
                           SYSPARK APP
                        </div>
                        <div class="tp-caption small_light_white sfb hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="80" data-speed="1000" data-start="1600" data-easing="Power4.easeOut">
                           <p>Sistema de parqueadero en Loja <br> Descarga nuestra aplicación y busca lugares disponibles. <br>Solucionamos tu problema desde nuestra aplicación movil forma parte de nuestro sistema de ayuda.</p>
                        </div>

                        <div class="tp-caption lfl hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="160" data-speed="1000" data-start="1800" data-easing="Power4.easeOut">
                            <a href="#" class="btn btn-primary inverse btn-lg">Descargar App</a>
                        </div>
                        
                        
                    </li>
                    
                </ul>
            </div>
        </div>




    </header>
    

        <section id="demo">           ->
        <div class="modal fade bs-example-modal-lg" id='registro' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                                <input type="text" class="form-control" name="NombreAdmin" id="NombreAdmin" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ApellidoAdmin" id="ApellidoAdmin" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"  name="CorreoAdmin" id="CorreoAdmin" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="TelefonoAdmin" id="TelefonoAdmin" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Clave</label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" name="ClaveA" id="ClaveA" value="" required />
                            </div>
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

       
        <div class="modal fade logout" tabindex="-1" role="dialog" id='cerrarsesion' aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <center><h3>Cerrando Sesion...</h3>
                     
                    </center>
                                                                           
            </div>
          </div>
        </div>
        <hr>



    </section>


    <section id="support" class="doublediagonal formulario2">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Parqueadero</h1>
                    <div class="divider"></div>
                    <p>Ingresa los datos de tu parqueadero y estaras en la Web</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 scrollpoint sp-effect1">
                                <form role="form" method="POST" action="return false" onsubmit="return false">
                                    <?php 
                                        $consulta="select * from parqueadero where CedulaAdmin=".$_SESSION["CedulaAdmin"];
                                        $resultado=$conexion->query($consulta);
                                        while ($fila=$resultado->fetchArray()) {    
                                    ?>
                                    <div class="form-group">
                                        <div id="res"></div>
                                    </div>
                                    <div class="form-group">
                                        <p>Nombre su parqueadero</p>
                                        <input type="text" class="form-control" name="NombreParqueadero" id="NombreParqueadero" value='<?php echo $fila["NombreParqueadero"] ?>' >
                                    </div>
                                    <div class="form-group">
                                        <p>Direccion de su parqueadero</p>
                                        <input type="text" class="form-control" name="DireccionParqueadero" id="DireccionParqueadero" value='<?php echo $fila["DireccionParqueadero"] ?>'><br>
                                        
                                    </div>
                                    <div class="form-group">
                                        <p>Telefono</p>                                        
                                        <input type="text" class="form-control" name="TelefonoParqueadero" id="TelefonoParqueadero" value='<?php echo $fila["TelefonoParqueadero"] ?>'>
                                    </div>
                                   
                                    <div class="form-group">
                                        <p>Ingrese Valor del parqueadero Simples</p>
                                        <input type="text" class="form-control" name="SimpleParqueadero" id="SimpleParqueadero" value='<?php echo $fila["SimpleParqueadero"] ?>'><br>
                                        <p>Ingrese Valor del parqueadero Cubiertos</p>                                        
                                        <input type="text" class="form-control" name="CubiertoParqueadero" id="CubiertoParqueadero" value='<?php echo $fila["CubiertoParqueadero"] ?>'>
                                    </div>
                                    <input type="text" id="latitud" name='LatitudParqueadero' id='LatitudParqueadero' value='<?php echo $fila["LatitudParqueadero"] ?>'>
                                    <input type="text" id="longitud" name='LogitudParqueadero' id='LogitudParqueadero' value='<?php echo $fila["LogitudParqueadero"] ?>'>                                    
                                    <?php } ?>
                                    
                                    <button type='submit' onclick="updateParqueadero( 
                                                    document.getElementById('NombreParqueadero').value, 
                                                    document.getElementById('DireccionParqueadero').value, 
                                                    document.getElementById('TelefonoParqueadero').value,
                                                    document.getElementById('SimpleParqueadero').value, 
                                                    document.getElementById('CubiertoParqueadero').value);" class="btn btn-primary btn-lg">Enviar</button>
                                </form>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-details scrollpoint sp-effect2">

                                <div class="media">                                   
                                    <div class="media-body">
                                        <h4 class="media-heading">Busca la direccion de tu parqueadero el Mapa</h4>
                                    </div>                                    
                                    <div id="map-canvas"></div>
                                </div>                                
                            </div>
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
       
        function registrar(CedulaAdmin, NombreAdmin, ApellidoAdmin, CorreoAdmin, TelefonoAdmin, ClaveAdmin)
                    {
                        $.ajax({
                            url: "registrarUsuario.php",
                            type: "POST",
                            data: "CedulaA="+CedulaAdmin+"&NombreAdmin="+NombreAdmin+
                                  "&ApellidoAdmin="+ApellidoAdmin+"&CorreoAdmin="+CorreoAdmin+
                                  "&TelefonoAdmin="+TelefonoAdmin+"&ClaveA="+ClaveAdmin,
                            success: function(resp){
                                $('#resp').html(resp)
                            }        
                        });
                    }

        function updateParqueadero(NombreParqueadero, DireccionParqueadero, TelefonoParqueadero, SimpleParqueadero, CubiertoParqueadero){
             $.ajax({
                            url: "updateParqueadero.php",
                            type: "POST",
                            data: "NombreParqueadero="+NombreParqueadero+"&DireccionParqueadero="+DireccionParqueadero+
                                  "&TelefonoParqueadero="+TelefonoParqueadero+"&SimpleParqueadero="+SimpleParqueadero+
                                  "&CubiertoParqueadero="+CubiertoParqueadero,
                            success: function(resp){
                                $('#res').html(resp)
                            }        
             });
        }




       
       
    </script>   

</body>

</html>

<?php 
    
}else {
    echo '<script>alert("primero debes loguearte para ver esta pagina")</script>';
    echo '<script>location.href = "index.php";</script>';
}
?>

