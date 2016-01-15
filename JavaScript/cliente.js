var url="../Controlador/Cliente_Controlador.php";
$(document).ready(function () {
    $(".fecha").datepicker();
    $(".fecha").val(fechaActual());
});
function crearCliente()
{
    var nombres = $("input[name=nombre]").val().trim();
    var cuenta = $("input[name=cuenta]").val().trim();
    var direccion = $("input[name=direccion]").val().trim();
    var email = $("input[name=correo]").val().trim();
    var text = "";
    if (!validar("vacio", nombres))
    {
        text += "<p>el campo nombre completo no puede estar vacio</p>";
    }
    if (!validar("texto", nombres))
    {
        text += "<p>por favor instrodusca su nombre correctamente</p>";
    }
    if (!validar("vacio", email))
    {
        text += "<p>el correo electronico no puede estar vacio</p>";
    }
    /*if (!validar("email", email))
    {
        text += "<p>por favor instroduzca su correo electronico correctamente, no estan permitidos los carateres especiales</p>";
    }*/
    if (!validar("vacio", cuenta))
    {
        text += "<p>el campo cuenta tiene que tener mayor a 4  y menor a 8 caracteres</p>";
    }
    if (!validar("texto y entero", direccion))
    {
        text += "<p>por favor instroduzca su direccion correctamente, no estan permitidos los carateres especiales</p>";
    }
    if (!validar("texto y entero", cuenta))
    {
        text += "<p>no estan permitidos los caracteres especiales en el campo cuenta</p>";
    }
    if ($('#contraseña').val().length < 4 || $('#contraseña').val().length > 8)
    {
        text += "<p>el password tiene que tener mayor a 4  y menor a 8 caracteres</p>";
    }
    if (text.length > 0){
        $("body").msmOK(text);
        return;
    }
    $("#cargando").visible();
    $.post(url, {proceso: 'insertarCliente', nombre: nombres,direccion:direccion,fecha:$("input[name=edad]").val()
        ,correo:email}, function (response) {
        $("#cargando").ocultar();
        var json=$.parseJSON(response);
        if (json.error !== "") {
            $("body").msmOK(json.error);
        } else {
            
        }
    });
}

