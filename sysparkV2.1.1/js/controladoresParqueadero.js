// llama a puesto.php donde esta el html que muestra cada puesto 

function viewdata(){
    $.ajax({
        type: "GET",
        url: "puesto.php"
    }).done(function( data ) {
        $('#viewdata').html(data);
    });
}

// crea un nuevo puesto y vuelve a llamar la funcion viewdata()
$('#save').click(function(){
    var puesto=$('input:radio[name=puesto]:checked').val();         
    var datas = 'puesto='+puesto;
    $.ajax({
        type: "POST",
        url: "newPuesto.php",
        data: datas
    }).done(function( data ) {
        $('#info').html(data);
        viewdata();
    });
});


function update(str){

    var id = str;
    var es = $('input:radio[name=puesto'+str+']:checked').val();
    var idLabel = "#"+es.substring(0,2)+id;
    $('#li'+id).removeClass('active');
    $('#oc'+id).removeClass('active');
    $(idLabel).addClass("active");


    console.log(es);

    var datas ='estado='+es;

    $.ajax({
        type: "POST",
        url: "updatePuesto.php?id="+id,
        data: datas
    }).done(function( data ) {
        $('#info').html(data);
        viewdata();
    });
}


function deleteP(str){

    var IdUbicacion = str;

    $.ajax({
        type: "GET",
        url: "deletePuesto.php?IdUbicacion="+IdUbicacion
    }).done(function( data ) {
        $('#info').html(data);
        viewdata();
    });
}

// funcion para actualizar el perfil del administrador de parqueadero

function updatePerfil(NombreAdmin, ApellidoAdmin, TelefonoAdmin, CorreoAdmin, ClaveAdmin)
{
    $.ajax({
        url: "updatePerfil.php",
        type: "POST",
        data: "NombreAdmin="+NombreAdmin+
        "&ApellidoAdmin="+ApellidoAdmin+
        "&TelefonoAdmin="+TelefonoAdmin+
        "&CorreoAdmin="+CorreoAdmin+
        "&ClaveAdmin="+ClaveAdmin,
        success: function(resp){
            $('#res').html(resp);
        }        
    });
}

function updateParqueadero(LatitudParqueadero, LogitudParqueadero, NombreParqueadero, DireccionParqueadero, TelefonoParqueadero, SimpleParqueadero, CubiertoParqueadero){
    $.ajax({
        url: "updateParqueadero.php",
        type: "POST",
        data: "LatitudParqueadero="+LatitudParqueadero+"&LogitudParqueadero="+LogitudParqueadero+"&NombreParqueadero="+NombreParqueadero+"&DireccionParqueadero="+DireccionParqueadero+
        "&TelefonoParqueadero="+TelefonoParqueadero+"&SimpleParqueadero="+SimpleParqueadero+
        "&CubiertoParqueadero="+CubiertoParqueadero,
        success: function(resp){
            $('#res').html(resp);
        }        
    });
}