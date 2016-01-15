$(document).ready(function () {
    $(".fecha").datepicker();
    $(".fecha").val(fechaActual());
});
function validacion() {
    var v = /^[A-Za-z\.\s\xF1\xD1]+$/;
    var er = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
    if ($('#contraseña').val().length === 0)
    {
        alert("ponga un password por favor");
    }
    else {
        if ($('#contraseña').val().length < 4)
        {
            alert("el password tiene q tener mas de 4 caracteres")
        }
        else
        {
            if ($('#contraseña').val().length > 8)
            {
                alert("el password tiene q tener menos de 8 caracteres")
            }
        }
    }
    if ((v.test($('#nombre').val())) === true)
    {
        alert("se inserto correctamente");
    }
    else
    {
        alert("porfavor no coloque numeros ni simbolos en los campos nombre, apellidos");
    }

    if ($('#selecdepartamento').selectIndex === "seleccione un departamento")
    {
        alert("porfavor seleccione un departamento")
    }
    if ((er.test($('#correo').val())) === false)
    {

        alert("por favor corrija su correo electronico")
    }
}
function validar1()
{
    var nombres = $("input[name=nombre]").val().trim();

    var cuenta = $("input[name=cuenta]").val().trim();
    var direccion = $("input[name=direccion]").val().trim();
    var email=$("input[name=correo]").val().trim();
    var text="";
    if(!validar("vacio", nombres))
    {
         text += "<p>el campo nombre completo no puede estar vacio</p>";
    }
    if (!validar("texto", nombres))
    {
        text += "<p>por favor instrodusca su nombre correctamente</p>";
    }
       if(!validar("vacio", email))
    {
                 text += "<p>el correo electronico no puede estar vacio</p>";
    }
       if (!validar("email", email))
    {
        text += "<p>por favor instroduzca su correo electronico correctamente, no estan permitidos los carateres especiales</p>";
    }
    if(!validar("vacio", cuenta))
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

    if (text.length > 0)
        $("body").msmOK(text);


}

