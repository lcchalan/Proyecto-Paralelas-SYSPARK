<?php 
session_start();
include('connect_mysql.php');

$consulta = 'delete from puestoestacionamiento where IdUbicacion='.$_GET["IdUbicacion"];
// echo $consulta;


if ($resultado = $conexion->query($consulta)) {
     echo '<script>$(document).ready(function(){setTimeout(function(){$("#respuesta").modal("show");}, 0000);
     	 $(".r").html("<h4>Se elimino un Puesto</h4>")

                                            setTimeout(function(){$("#respuesta").modal("hide");}, 2000);});</script>';
}else{
    // echo "<center>No se ha actualizado el Puesto</center>";
    
}

$conexion->close();