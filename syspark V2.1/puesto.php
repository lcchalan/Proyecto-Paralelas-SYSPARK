<?php 
session_start();  
include('connect_mysql.php');
  $consulta="select * from puestoestacionamiento where IdParqueadero=".$_SESSION['IdParqueadero']." and NombreUbicacion='cubierto'";
  
  $resultado=$conexion->query($consulta);
  $cont=1;
?>

<h3>Puestos con Cubierta</h3>
<div class='row'>
<?php 

  while ($fila=$resultado->fetchArray()) {
                
?>
 

<div class="col-md-3 btn-group" >
  <div>
  <img src="img/freeze/park.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                        
  <button class='vbottom' onClick="deleteP(<?php echo $fila['IdUbicacion'];?>)" ><i class="fa fa-times"></i></button>

  </div>
  <div class="section-heading1">
  <p>Parq. <?php echo $cont; $cont++; ?></p>
  </div>
  <label  id='li<?php echo $fila['IdUbicacion']; ?>'class="btn btn-info <?php if($fila['EstadoUbicacion']=='libre') {echo 'active'; }?>" 
    for="libre<?php echo $fila['IdUbicacion']; ?>">
        <input onclick="update(<?php echo $fila['IdUbicacion']; ?>)" id="libre<?php echo $fila['IdUbicacion']; ?>" value="libre" type="radio" 
         name="puesto<?php echo $fila['IdUbicacion']; ?>" <?php if($fila['EstadoUbicacion']=='libre') {echo 'checked = "checked"';}?> > Libre
  </label>
  <label  id='oc <?php echo $fila['IdUbicacion']; ?>' class="btn btn-info btn_red <?php if($fila['EstadoUbicacion']=='ocupado') {echo 'active';}?>" 
    for="ocupado<?php echo $fila['IdUbicacion']; ?>">
        <input onclick="update(<?php echo $fila['IdUbicacion']; ?>)" name="puesto<?php echo $fila['IdUbicacion']; ?>" id="ocupado<?php echo $fila['IdUbicacion']; ?>" 
        value="ocupado" type="radio" <?php if($fila['EstadoUbicacion']=='ocupado') {echo 'checked = "checked"';}?> > Ocupado
  </label>
  <br>
  <br>
  <br>
</div>




<?php } 

$consulta="select * from puestoestacionamiento where IdParqueadero=".$_SESSION['IdParqueadero']." and NombreUbicacion='simple'";
  
  $resultado=$conexion->query($consulta);
  
?>
</div>
<br><br>

<h3>Puestos Simples</h3>

<div class='row'>
<?php 

  while ($fila=$resultado->fetchArray()) {
                
?>
 

<div class="col-md-3 btn-group" class="vbottom">
  <div>
    <img src="img/freeze/park.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                        
    <button class="vbottom" onClick="deleteP(<?php echo $fila['IdUbicacion'];?>)"><i class="fa fa-times"></i></button>
  </div>
  <div class="section-heading1">
  <p>Parq. <?php echo $cont; $cont++; ?></p>
  </div>
  <label  id='li<?php echo $fila['IdUbicacion']; ?>'class="btn btn-info <?php if($fila['EstadoUbicacion']=='libre') {echo 'active'; }?>" 
    for="libre<?php echo $fila['IdUbicacion']; ?>">
        <input  onclick="update(<?php echo $fila['IdUbicacion']; ?>)" id="libre<?php echo $fila['IdUbicacion']; ?>" value="libre" type="radio" 
         name="puesto<?php echo $fila['IdUbicacion']; ?>" <?php if($fila['EstadoUbicacion']=='libre') {echo 'checked = "checked"';}?> > Libre
  </label>
  <label  id='oc <?php echo $fila['IdUbicacion']; ?>' class="btn btn-info btn_red <?php if($fila['EstadoUbicacion']=='ocupado') {echo 'active';}?>" 
    for="ocupado<?php echo $fila['IdUbicacion']; ?>">
        <input  onclick="update(<?php echo $fila['IdUbicacion']; ?>)" name="puesto<?php echo $fila['IdUbicacion']; ?>" id="ocupado<?php echo $fila['IdUbicacion']; ?>" 
        value="ocupado" type="radio" <?php if($fila['EstadoUbicacion']=='ocupado') {echo 'checked = "checked"';}?> > Ocupado
  </label>
  <br>
  <br>
  <br>
</div>
<?php }



?>



