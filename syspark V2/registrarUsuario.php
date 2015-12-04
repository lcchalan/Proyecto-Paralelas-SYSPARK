<?php

$contador=0;

error_reporting(0);
include('connect_mysql.php');

$consulta= 'select * from administrador';
$resultado=$conexion->query($consulta);


$CedulaA=$_POST['CedulaA']; 

while ($fila=$resultado->fetchArray()) {
    if ($fila['CedulaAdmin']==$CedulaA) {
        $contador++;
    }else{

    }
}
if ($contador == 0) {
    
    
   
    $consulta = 'insert into administrador values('.$_POST['CedulaA']
                                                .',"'.$_POST['NombreAdmin']
                                                .'","'.$_POST['ApellidoAdmin']
                                                .'",'.$_POST['TelefonoAdmin']
                                                .',"'.$_POST['CorreoAdmin']                                                
                                                .'","'.$_POST['ClaveA'].'")';
    
    
    #echo $consulta.'<br/>';

    if ($conexion->query($consulta)) {
        echo 'Se ha Registrado un Nuevo Usuario';


        $consulta = 'insert into parqueadero (CedulaAdmin, NombreParqueadero) values('.$_POST['CedulaA']
                                                .',"Parqueadero '.$_POST['NombreAdmin'].' '.$_POST['ApellidoAdmin'].'")';

        if ($conexion->query($consulta)) {
            echo "<br>Se ha creado nuevo parqueadero"; 
            echo '<script>$(document).ready(function(){setTimeout(function(){$("#registro").modal("hide");}, 4000);
                                            setTimeout(function(){$("#login").modal("show");}, 4100);});</script>';
                    
        }else{
            $consulta='delete administrador where CedulaAdmin='.$_POST['CedulaA'];
            echo "No se ha creado el parqueadero";            

        }

        #echo "<script>alert('Se ha registrado un nuevo usuario');</script>";
    }else{
        echo 'No se ha podido registrar ';
        #echo "<script>alert('No se ha podido registrar ".mysql_error()."');</script>";
    }

    $conexion->close();;

   /* echo ' 
        <html>
            <head>
                <meta http-equiv="REFRESH" content="10; url=./index.php">
            </head>
        </html>
    ';*/
}else{
    echo 'El Usuario ya existe elija otro';
}


?>