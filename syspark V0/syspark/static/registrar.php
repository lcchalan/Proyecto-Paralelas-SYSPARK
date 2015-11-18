<?php

$contador=0;

error_reporting(0);
include('connect_mysql.php');

$consulta= 'select * from administrador';
$resultado=mysql_query($consulta);


$CedulaA=$_POST['CedulaA']; 

while ($fila=mysql_fetch_array($resultado)) {
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

    if (mysql_query($consulta)) {
        echo 'Se ha Registrado un Nuevo Usuario';
        #echo "<script>alert('Se ha registrado un nuevo usuario');</script>";
    }else{
        echo 'No se ha podido registrar ';
        #echo "<script>alert('No se ha podido registrar ".mysql_error()."');</script>";
    }

    mysql_close($conexion);

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