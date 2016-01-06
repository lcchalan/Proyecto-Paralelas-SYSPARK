<?php

error_reporting(0);
session_start();
include('connect_mysql.php');

if ($_POST['CedulaAdmin'] == null || $_POST['ClaveAdmin'] == null)
{
    echo '<span>Por favor complete todos los campos.</span>';
}
else
{
    $CedulaAdmin = $_POST['CedulaAdmin']; 
    $ClaveAdmin = $_POST['ClaveAdmin'];

    $consulta ='select NombreAdmin, ApellidoAdmin, CedulaAdmin, ClaveAdmin from administrador where CedulaAdmin='.$CedulaAdmin.' and ClaveAdmin="'.$ClaveAdmin.'"';
    $resultado=$conexion->query($consulta);
    
    if ($fila=$resultado->fetch_assoc())
    {
        
        $_SESSION["CedulaAdmin"] = $fila["CedulaAdmin"];
        $_SESSION["ApellidoAdmin"] = $fila["ApellidoAdmin"];
        $_SESSION['NombreAdmin']= $fila["NombreAdmin"];        
        echo "Iniciando Sesion...";
        echo '<script>location.href = "index.php"</script>';
    }
    else
    {
        echo '<span>El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
    }
}
$conexion->close();
?>