<?php 
session_start();
if (isset($_SESSION['CedulaAdmin'])) {
    include('connect_mysql.php');

    $consulta="select * from parqueadero where CedulaAdmin=".$_SESSION['CedulaAdmin'];
    $resultado=$conexion->query($consulta);
    while ($fila=$resultado->fetch_assoc()) {        
        $nombre_parqueadero=$fila['NombreParqueadero'];
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
        <?php if (isset($_SESSION['CedulaAdmin'])){
            include('static/menuLog.php');
        } else{
            include('static/menu.php');            
        }  
        ?>

        </header>


        <section id="demo">

          <?php include('modals.php') ?>


            <!-- modal para seleccionar tipo del puesto -->

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
                        
                        <h1><?php echo $nombre_parqueadero ?></h1>
                        <p>Seguridad, Confianza y Amabilidad </p>
                        <div class="section-heading1">
                            <p>Parqueaderos</p>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#puesto">Agregar</button>
                        <div id="info"></div>
                        <br/>
                        <div id="viewdata" ></div>
                    </div>
                </div>
            </div>
        </section>


        <!-- modal que informa el estado de un puesto -->

        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id='respuesta'>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <center><h3>Estado</h3>
                        <div class="r"></div>
                    </center>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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

    <!-- script para logear y registrar usuario -->
    <script src='js/controladores.js'></script>

    <!-- llama a puesto.php donde esta el html que muestra cada puesto -->
    <script src='js/controladoresParqueadero.js'></script>

</body>

</html>
<?php }else{
    echo '<script>location.href = "index.php";</script>';
} ?>