<?php
session_start();
include('connect_mysql.php');



$consulta = 'update parqueadero set NombreParqueadero="'.$_POST['NombreParqueadero'].'", DireccionParqueadero="'.$_POST['DireccionParqueadero'].
                                    '", TelefonoParqueadero='.$_POST['TelefonoParqueadero'].
                                    ', SimpleParqueadero='.$_POST['SimpleParqueadero'].
                                    ', CubiertoParqueadero='.$_POST['CubiertoParqueadero'].
                                    ', LatitudParqueadero="'.$_POST['LatitudParqueadero'].
                                    '", LogitudParqueadero="'.$_POST['LogitudParqueadero'].                                    
                                    '" where CedulaAdmin='.$_SESSION["CedulaAdmin"];
// echo $consulta;

if ($resultado = $conexion->query($consulta)) {
    echo "<center>Se ha Actualizado el parqueadero</center>";
    echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "formparqueadero.php";}, 2000);});</script>';
}else{
    echo "<center>No se ha actualizado".mysqli_error()."</center>";

    // echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "formparqueadero.php";}, 2000);});</script>';
}

$conexion->close();



?>