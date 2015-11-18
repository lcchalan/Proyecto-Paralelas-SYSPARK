<?php
session_start();

error_reporting(0);
include('connect_mysql.php');


$consulta = 'update parqueadero set NombreParqueadero="'.$_POST['NombreParqueadero'].'", DireccionParqueadero="'.$_POST['DireccionParqueadero'].
                                    '", TelefonoParqueadero='.$_POST['TelefonoParqueadero'].
                                    ', SimpleParqueadero='.$_POST['SimpleParqueadero'].
                                    ', CubiertoParqueadero='.$_POST['CubiertoParqueadero'].' where CedulaAdmin='.$_SESSION["CedulaAdmin"];


if ($resultado = $conexion->query($consulta)) {
    echo "Se ha Actualizado el parqueadero";
    echo '<script>location.href = "index.php"</script>';
}else{
    echo "No se ha actualizado";
    echo '<script>location.href = "#res"</script>';
}

$conexion->close();



?>