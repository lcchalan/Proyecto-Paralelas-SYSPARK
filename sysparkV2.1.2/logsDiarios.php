<?php 
session_start();  
include('connect_mysql.php');
  
  $consulta="SELECT `registrodeingresos`.*,`puestoestacionamiento`.`IdUbicacion`,`puestoestacionamiento`.`IdParqueadero`,`parqueadero`.`IdParqueadero` 
  FROM registrodeingresos LEFT JOIN `syspark2`.`puestoestacionamiento` ON `registrodeingresos`.`IdUbicacion` = `puestoestacionamiento`.`IdUbicacion` 
  LEFT JOIN `syspark2`.`parqueadero` ON `puestoestacionamiento`.`IdParqueadero` = `parqueadero`.`IdParqueadero` 
  where `parqueadero`.`IdParqueadero`=".$_SESSION["IdParqueadero"]." and `registrodeingresos`.`HoraFin` BETWEEN '".$_POST['fecha']." 00:00:00' AND '".$_POST['fecha']." 23:59:59'";
  // echo $consulta;
  $resultado=$conexion->query($consulta);
  
?>



<?php 

while ($fila=$resultado->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$fila['IdUbicacion']."</td>";
    echo "<td>".$fila['HoraInicio']."</td>";
    echo "<td>".$fila['HoraFin']."</td>";
    echo "<td>".$fila['CostoTotal']."</td>";
    // echo "<td>".$consulta."</td>";
    echo "</tr>";

 } ?>



