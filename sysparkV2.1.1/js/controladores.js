// funcion para validar el logeo al sistema

function Validar(CedulaAdmin, ClaveAdmin)
{
    $.ajax({
        url: "validarUsuario.php",
        type: "POST",
        data: "CedulaAdmin="+CedulaAdmin+"&ClaveAdmin="+ClaveAdmin,
        success: function(resp){
            $('#resultado').html(resp);
        },
    });
}

// funcion para registrar nuevo usuario

function registrar(CedulaAdmin, NombreAdmin, ApellidoAdmin, CorreoAdmin, TelefonoAdmin, ClaveAdmin)
{
    $.ajax({
        url: "registrarUsuario.php",
        type: "POST",
        data: "CedulaA="+CedulaAdmin+"&NombreAdmin="+NombreAdmin+
        "&ApellidoAdmin="+ApellidoAdmin+"&CorreoAdmin="+CorreoAdmin+
        "&TelefonoAdmin="+TelefonoAdmin+"&ClaveA="+ClaveAdmin,
        success: function(resp){
            $('#resp').html(resp);
        },      
    });
}

