
 <section id="support" class="doublediagonal formulario2">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Parqueadero</h1>
                    <div class="divider"></div>
                    <p>Ingresa los datos de tu parqueadero y estaras en la Web</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 scrollpoint sp-effect1">
                                <form role="form" method="POST" action="return false" onsubmit="return false">
                                    <?php 
                                        $consulta="select * from parqueadero where CedulaAdmin=".$_SESSION["CedulaAdmin"];
                                        $resultado=$conexion->query($consulta);
                                        while ($fila=$resultado->fetchArray()) {    
                                    ?>
                                    <div class="form-group">
                                        <div id="res"></div>
                                    </div>
                                    <div class="form-group">
                                        <p>Nombre su parqueadero</p>
                                        <input type="text" class="form-control" name="NombreParqueadero" id="NombreParqueadero" value='<?php echo $fila["NombreParqueadero"] ?>' >
                                    </div>
                                    <div class="form-group">
                                        <p>Direccion de su parqueadero</p>
                                        <input type="text" class="form-control" name="DireccionParqueadero" id="DireccionParqueadero" value='<?php echo $fila["DireccionParqueadero"] ?>'><br>
                                        
                                    </div>
                                    <div class="form-group">
                                        <p>Telefono</p>                                        
                                        <input type="text" class="form-control" name="TelefonoParqueadero" id="TelefonoParqueadero" value='<?php echo $fila["TelefonoParqueadero"] ?>'>
                                    </div>
                                   
                                    <div class="form-group">
                                        <p>Ingrese Valor del parqueadero Simples</p>
                                        <input type="text" class="form-control" name="SimpleParqueadero" id="SimpleParqueadero" value='<?php echo $fila["SimpleParqueadero"] ?>'><br>
                                        <p>Ingrese Valor del parqueadero Cubiertos</p>                                        
                                        <input type="text" class="form-control" name="CubiertoParqueadero" id="CubiertoParqueadero" value='<?php echo $fila["CubiertoParqueadero"] ?>'>
                                    </div>
                                    <?php } ?>
                                    
                                    <button type='submit' onclick="updateParqueadero( 
                                                    document.getElementById('NombreParqueadero').value, 
                                                    document.getElementById('DireccionParqueadero').value, 
                                                    document.getElementById('TelefonoParqueadero').value,
                                                    document.getElementById('SimpleParqueadero').value, 
                                                    document.getElementById('CubiertoParqueadero').value);" class="btn btn-primary btn-lg">Enviar</button>
                                </form>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-details scrollpoint sp-effect2">

                                <div class="media">                                   
                                    <div class="media-body">
                                        <h4 class="media-heading">Busca la direccion de tu parqueadero el Mapa</h4>
                                    </div>
                                     <a class="pull-left" href="#demo" >
                                        <i class="fa fa-map-marker fa-2x"></i>
                                    </a>                                    
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>