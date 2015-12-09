<?php
session_start();
include('connect_mysql.php');

$consulta = 'update puestoestacionamiento set EstadoUbicacion="'.$_POST['estado'].'" where IdUbicacion='.$_GET["id"];
// echo $consulta;


if ($resultado = $conexion->query($consulta)) {
     echo '<script>$(document).ready(function(){setTimeout(function(){$("#respuesta").modal("show");}, 0000);
     	 $(".r").html("<h4>Se cambio el Puesto '.$_GET['id'].'</h4>")

                                            setTimeout(function(){$("#respuesta").modal("hide");}, 2000);});</script>';
}else{
    // echo "<center>No se ha actualizado el Puesto</center>";
    
}

$conexion->close();



?>


