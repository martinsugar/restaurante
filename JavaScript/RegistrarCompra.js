var url = "../Controlador/RegistrarCompra_Controlador.php";
var padreSession = window.parent.$("#cerrarSession");
$(document).ready(function(){
   $(".fecha").datepicker();
   $(".fecha").val(fechaActual());
    cargando(true);
    $.post(url, {proceso: 'iniciar'}, function (response) {
        cargando(false);
        var json = $.parseJSON(response);
        if (json.error.length > 0) {
            if ("Error Session" === json.error) {
                padreSession.click();
            }
            $("body").msmOK(json.error);
        } else {
            
        }
    });
});



 