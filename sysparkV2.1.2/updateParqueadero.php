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
    echo "<center><h3>Se ha Actualizado el parqueadero</h3></center>";

    // subir imagen del parqueadero
    if (isset($_FILES["imagen"])) {
        $imagen='';
        $consulta5 = 'select imagen from parqueadero where CedulaAdmin='.$_SESSION["CedulaAdmin"];
        $resultado5=$conexion->query($consulta5);
        while ( $fila5=$resultado5->fetch_assoc()) {
           $imagen=$fila5['imagen'];
        }

        if ($imagen=='') {
            $rutaEnServidor='img/parqueadero';
            $rutaTemporal=$_FILES['imagen']['tmp_name'];
            $nombreImagen=$_FILES['imagen']['name'];
            $rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
            move_uploaded_file($rutaTemporal,$rutaDestino);

            $consulta4 = 'update parqueadero set imagen="'.$rutaDestino.                                    
                                    '" where CedulaAdmin='.$_SESSION["CedulaAdmin"];
            // echo $consulta;

            if ($resultado4 = $conexion->query($consulta4)) {
                echo "<center><h3>Se ha subido la imagen</h3></center>";
            }else{
                echo 'no se ha subido';
            }
        }else{
            unlink($imagen);
            $rutaEnServidor='img/parqueadero';
            $rutaTemporal=$_FILES['imagen']['tmp_name'];
            $nombreImagen=$_FILES['imagen']['name'];
            $rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
            move_uploaded_file($rutaTemporal,$rutaDestino);

            $consulta4 = 'update parqueadero set imagen="'.$rutaDestino.                                    
                                    '" where CedulaAdmin='.$_SESSION["CedulaAdmin"];
            // echo $consulta;

            if ($resultado4 = $conexion->query($consulta4)) {

                echo "<center><h3>Se ha subido la imagen</h3></center>";
            }else{
                echo 'no se ha subido';
            }
        }
       

    }

    //para crear los puestos si el parqueadero no cuenta con ninguno
    $consulta2='select * from puestoestacionamiento where IdParqueadero='.$_SESSION['IdParqueadero'];
    $resultado2=$conexion->query($consulta2);
    $contador=0;

    while ($fila=$resultado2->fetch_assoc()) {
        if ($fila['IdParqueadero']==$_SESSION['IdParqueadero']) {
            $contador++;
        }
    }
    
    if ($contador==0) {

        //si no existe registros en puestoestacionamiento actualizara el campo NumeroPlazas parqueadero

        $consulta3 = 'update parqueadero set NumeroPlazas='.($_POST['numeroCubiertos']+$_POST['numeroSimples']).                                    
                                    ' where CedulaAdmin='.$_SESSION["CedulaAdmin"];
        // echo $consulta;
        if ($conexion->query($consulta3)) {
             # code...
         } else{
            echo "No se ha actualizado el numero de plazas";
         }

        // insert puestos simples
        for ($i=0; $i < $_POST['numeroSimples']; $i++) { 
            $consulta='insert into puestoestacionamiento (NombreUbicacion, EstadoUbicacion, IdParqueadero) values ("simple"'
                                                .', "libre",'.$_SESSION['IdParqueadero'].')';
            if ($conexion->query($consulta)) {
                // echo "se ha creado el puesto";
            }else{            
                echo "No se ha creado los puestos ".mysqli_error();            
            }    
        }
        // echo '<script>$(document).ready(function(){
        //      $("#rp").append("<h4>Se ha Agragado '.$_POST['numeroSimples'].' puestos simples</h4>");';
        


        // inset puestos cubiertos
        for ($i=0; $i < $_POST['numeroCubiertos']; $i++) { 
            $consulta='insert into puestoestacionamiento (NombreUbicacion, EstadoUbicacion, IdParqueadero) values ("cubierto"'
                                                .', "libre",'.$_SESSION['IdParqueadero'].')';
            if ($conexion->query($consulta)) {
                // echo "se ha creado el puesto cubierto";
            }else{            
                echo "No se ha creado el puesto ".mysqli_error();            
            }    
        }
        // echo '<script>$(document).ready(function(){
        //      $("#rp").append("<h4>Se ha Agragado '.$_POST['numeroCubiertos'].' puestos cubiertos</h4>");';     
        
    
    }
    echo "<script>$(document).ready(function(){
            setTimeout(function(){
                location.href = 'parqueaderos.php?IdParqueadero=".$_SESSION['IdParqueadero']."';
            }, 1500);
        });</script>";

}else{
    echo "<center>No se ha actualizado".mysqli_error()."</center>";

    // echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "formparqueadero.php";}, 2000);});</script>';
}

$conexion->close();

