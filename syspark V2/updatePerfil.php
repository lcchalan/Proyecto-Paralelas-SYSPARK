<?php
session_start();

error_reporting(0);
include('connect_mysql.php');



$consulta = 'update administrador set NombreAdmin="'.$_POST['NombreAdmin'].
                                    '", ApellidoAdmin="'.$_POST['ApellidoAdmin'].
                                    '", TelefonoAdmin='.$_POST['TelefonoAdmin'].
                                    ', CorreoAdmin="'.$_POST['CorreoAdmin'].
                                    '", ClaveAdmin="'.$_POST['ClaveAdmin'].
                                    '" where CedulaAdmin='.$_SESSION["CedulaAdmin"];
// echo '<center>'.$consulta.'</center>';


if ($resultado = $conexion->query($consulta)) {
    echo "<center>Se ha Actualizado el parqueadero</center>";
    echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "perfil.php";}, 2000);});</script>';
}else{
    echo "<center>No se ha actualizado</center>";
    echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "perfil.php";}, 2000);});</script>';
}

$conexion->close();



?>