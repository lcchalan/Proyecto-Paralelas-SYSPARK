<?php 
session_start();
include('connect_mysql.php');

$consulta = 'delete from puestoestacionamiento where IdUbicacion='.$_GET["IdUbicacion"];
// echo $consulta;


if ($resultado = $conexion->query($consulta)) {
     echo '<script>$(document).ready(function(){setTimeout(function(){$("#respuesta").modal("show");}, 0000);
     	 $(".r").html("<h4>Se elimino un Puesto</h4>")

                                            setTimeout(function(){$("#respuesta").modal("hide");}, 2000);});</script>';

	// se obtiene le numero de plazas en parqueadero
	$consulta2="select * from parqueadero where CedulaAdmin=".$_SESSION['CedulaAdmin'];
    $resultado=$conexion->query($consulta2);
    while ($fila=$resultado->fetch_assoc()) {        
        $NumeroPlazas=$fila['NumeroPlazas'];
    }   

    // se actualiza el numero de plazas en parqueadero
 	$consulta2 = 'update parqueadero set NumeroPlazas='.($NumeroPlazas-1).                                    
                                    ' where CedulaAdmin='.$_SESSION["CedulaAdmin"];
        // echo $consulta;
    if ($conexion->query($consulta2)) {
         # code...
     } else{
        echo "No se ha actualizado el numero de plazas";
     }

}else{
     echo "<center>No se ha actualizado el Puesto</center>";
    
}

$conexion->close();