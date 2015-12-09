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
                    
        }else{            
            echo "No se ha creado el puesto";            

        }

?>