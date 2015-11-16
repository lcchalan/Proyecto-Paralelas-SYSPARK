 <!DOCTYPE html>
 <html lang="es">
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
         <form role="form" method="POST" action="return false" onsubmit="return false">
                        <div class="form-group">
                            <div id="resp"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cédula" name="CedulaAdmin" id="CedulaAdmin" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre" name="NombreAdmin" id="NombreAdmin" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder=" Apellido" name="ApellidoAdmin" id="ApellidoAdmin" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Correo" name="CorreoAdmin" id="CorreoAdmin" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Telefono" name="TelefonoAdmin" id="TelefonoAdmin" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Clave" name="ClaveAdmin" id="ClaveAdmin" value="">
                        </div>                                    
                        <button onclick="registrar(document.getElementById('CedulaAdmin').value, 
                                                    document.getElementById('NombreAdmin').value, 
                                                    document.getElementById('ApellidoAdmin').value, 
                                                    document.getElementById('CorreoAdmin').value,
                                                    document.getElementById('TelefonoAdmin').value, 
                                                    document.getElementById('ClaveAdmin').value);" class="btn btn-primary btn-lg">Registrarse</button>
     </body>
     <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/placeholdem.min.js"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/scripts.js"></script>

     <script>
        function Validar(CedulaAdmin, ClaveAdmin)
        {
            $.ajax({
                url: "static/validar.php",
                type: "POST",
                data: "CedulaAdmin="+CedulaAdmin+"&ClaveAdmin="+ClaveAdmin,
                success: function(resp){
                    $('#resultado').html(resp)
                }        
            });
        }

         function registrar(CedulaAdmin, NombreAdmin, ApellidoAdmin, CorreoAdmin, TelefonoAdmin, ClaveAdmin)
                    {
                        $.ajax({
                            url: "static/registrar.php",
                            type: "POST",
                            data: "CedulaAdmin="+CedulaAdmin+"&NombreAdmin="+NombreAdmin+
                                  "&ApellidoAdmin="+ApellidoAdmin+"&CorreoAdmin="+CorreoAdmin+
                                  "&TelefonoAdmin="+TelefonoAdmin+"&ClaveAdmin="+ClaveAdmin,
                            success: function(resp){
                                $('#resp').html(resp)
                            }        
                        });
                    }
        </script>
 </html>