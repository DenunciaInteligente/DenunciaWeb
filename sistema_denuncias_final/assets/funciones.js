

function bombero_agregar()
{
    var rut             = document.getElementById("rut-bombero").value;
    var prinom          = document.getElementById("prinom-bombero").value;
    var segnom          = document.getElementById("segnom-bombero").value;
    var appat           = document.getElementById("appat-bombero").value;
    var apmat           = document.getElementById("apmat-bombero").value;
    var direccion       = document.getElementById("direc-bombero").value;
    var cargo           = document.getElementById("cargo-bombero").value;
    var fono            = document.getElementById("fono-bombero").value;
    var fecnacim        = document.getElementById("fecnacim-bombero").value;

    var parametros = {
        "rut"           : rut,
        "prinom"        : prinom,
        "segnom"        : segnom,
        "appat"         : appat,
        "apmat"         : apmat,
        "direccion"     : direccion,
        "cargo"         : cargo,
        "fono"          : fono,
        "fecnacim"      : fecnacim,
        "tarea"         : "agregar"
    }

    $.ajax(
    {
        data:  parametros,
        url:   '../CapaNegocios/bomberos.php/',
        type:  'post',
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
        respuesta = response.trim();
        if(respuesta == "si")
        {
            alert("los datos han sido registrados exitosamente");
        }else
        {
            alert("los datos no han sido registrados");
        }

    }})
}

function bombero_editar()
{
    var id_bombero      = document.getElementById("id-bombero").value;
    var rut             = document.getElementById("rut-bombero").value;
    var prinom          = document.getElementById("prinom-bombero").value;
    var segnom          = document.getElementById("segnom-bombero").value;
    var appat           = document.getElementById("appat-bombero").value;
    var apmat           = document.getElementById("apmat-bombero").value;
    var direccion       = document.getElementById("direc-bombero").value;
    var cargo           = document.getElementById("cargo-bombero").value;
    var fono            = document.getElementById("fono-bombero").value;
    var fecnacim        = document.getElementById("fecnacim-bombero").value;


    var parametros = {
        "id"            : id_bombero,
        "rut"           : rut,
        "prinom"        : prinom,
        "segnom"        : segnom,
        "appat"         : appat,
        "apmat"         : apmat,
        "direccion"     : direccion,
        "cargo"         : cargo,
        "fono"          : fono,
        "fecnacim"      : fecnacim,
        "tarea"         : "editar"
    }
    $.ajax(
    {
        data:  parametros,
        url:   '../CapaNegocios/bomberos.php/',
        type:  'post',
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
            alert(response);
        respuesta = response.trim();
        if(respuesta == "si")
        {
            alert("los datos han sido editados exitosamente");
        }else
        {
            alert("los datos no han sido editados");
        }

    }})
}


function bombero_eliminar(id)
{
    var id_bombero             = id;

    var parametros = {
        "id"           : id_bombero,
        "tarea"         : "eliminar"
    }

    $.ajax(
    {
        data:  parametros,
        url:   '../CapaNegocios/bomberos.php/',
        type:  'post',
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
        respuesta = response.trim();
        if(respuesta == "si")
        {
            alert("los datos han sido eliminados exitosamente");
        }else
        {
            alert("los datos no han sido eliminados");
        }

    }})
}
