 
 
var url="../Controlador/Logeo_Controlador.php";
function entrar(e){
    if(e!=='' && e.keyCode!==13)
    {
        return;
    }
    var cuenta=$("input[name=cuentaLogeo]").val();
    var password=$("input[name=contrasenaLogeo]").val();
    

    $("#cargando").visible();
    $.post(url, {proceso: 'verificarLogeo', contrasena:password,cuenta:cuenta}, function (response) {
        $("#cargando").ocultar();
        var json=$.parseJSON(response);
        if (json.error !== "") {
            $("body").msmOK(json.error);
        } else {
            
        }
    });
        }
        
        
        
 