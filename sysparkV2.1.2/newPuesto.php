<?php
session_start();
include('connect_mysql.php');


$consulta='insert into puestoestacionamiento (NombreUbicacion, EstadoUbicacion, IdParqueadero) values ("'.$_POST['puesto']
                                                .'","libre",'.$_SESSION['IdParqueadero'].')';

// echo $consulta;
if ($conexion->query($consulta)) {
         echo '<script>$(document).ready(function(){
     	 $("#rp").html("<h4>Se ha Agragado un nuevo Puesto '.$_POST['puesto'].'</h4>");

                                            setTimeout(function(){$("#puesto").modal("hide");}, 2000);});</script>';      

 
	
	$consulta2="select * from parqueadero where CedulaAdmin=".$_SESSION['CedulaAdmin'];
    $resultado=$conexion->query($consulta2);
    while ($fila=$resultado->fetch_assoc()) {        
        $NumeroPlazas=$fila['NumeroPlazas'];
    }   

 	$consulta2 = 'update parqueadero set NumeroPlazas='.($NumeroPlazas+1).                                    
                                    ' where CedulaAdmin='.$_SESSION["CedulaAdmin"];
        // echo $consulta;
    if ($conexion->query($consulta2)) {
         # code...
     } else{
        echo "No se ha actualizado el numero de plazas";
     }
                
}else{            
    echo "No se ha creado el puesto ".mysqli_error();            

}



?>